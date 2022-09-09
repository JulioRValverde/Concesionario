<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Vehiculo;
use App\Models\Sede;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\PuestoTrabajo;

class AgendaCita extends Component
{
    public Vehiculo $vehiculo;
    
    public $sede_id = 0;

    public $area_id = 0;

    public $fecha_inicial ='';

    public $fecha_final = '';

    public $hoy;

    protected $rules = [
        'sede_id'=>'required',
        'fecha_inicial'=>'required |date|after_or_equal:hoy',
        'fecha_final'=>'required |date|after:fecha_inicial',
        'area_id'=>'required'
    ];

    public function mount(Vehiculo $vehiculo)
    {
        # code...
        $this->vehiculo = $vehiculo;

        $this->hoy = (new Carbon('tomorrow'))->format('Y-m-d H:i:s');
    }

    public function render()
    {
        $sedes = Sede::orderby('nombre')->get();

        $areas = array();

        $sede = Sede::find($this->sede_id);
        if($sede)
        {
            $areas = $sede->areas();
        }
        return view('livewire.cliente.citas.create', compact('sedes', 'areas'));
    }

    public function updated($properyName)
    {
        # code...
        $this->validateOnly($properyName);
    }

    public function save()
    {
        # code...
        $this->validate();

        $puestos_trabajo = PuestoTrabajo::where('area_id',$this->area_id)
                                          ->where('sede_id',$this->sede_id)
                                          ->get();
        
        foreach ($puestos_trabajo as $key => $puestoTrabajo) {
            # code...
            $cita_temp = Cita::where('puesto_trabajo_id',$puestoTrabajo->id)
                              ->where(function ($query) {
                                $query->whereBetween('fecha_inicial',[$this->fecha_inicial, $this->fecha_final])
                                ->orWhereBetween('fecha_final',[$this->fecha_inicial, $this->fecha_final]);
                              })->first();
            //SELECT * FROM `citas` WHERE fecha_inicial BETWEEN '2022-09-09 8:00:00' AND '2022-09-09 8:30:00' OR fecha_final BETWEEN '2022-09-09 8:00:00' AND '2022-09-09 8:30:00'
            if ($cita_temp==null) {
                # code...
                $cita = new Cita;
                $cita->puesto_trabajo_id = $puestoTrabajo->id;
                $cita->vehiculo_id = $this->vehiculo->id;
                $cita->fecha_inicial = $this->fecha_inicial;
                $cita->fecha_final = $this->fecha_final;
                $cita->save();

                session()->flash('success', 'Cita creada correctamente.');

                return redirect()->route('citas.ver-detalle',$cita);
            }
        }

        session()->flash('error', 'Error al momento de agendar la cita, por favor valide las fechas.');
    }
}
