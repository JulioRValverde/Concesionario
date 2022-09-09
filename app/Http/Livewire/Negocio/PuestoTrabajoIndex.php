<?php

namespace App\Http\Livewire\Negocio;

use Livewire\Component;
use App\Models\PuestoTrabajo;
use App\Models\Area;
use App\Models\Sede;
use App\Models\User;

class PuestoTrabajoIndex extends Component
{

    public PuestoTrabajo $puestoTrabajo;

    public $toEdit;

    protected $rules = [
        'puestoTrabajo.numero' => 'required',
        'puestoTrabajo.sede_id'=>'required',
        'puestoTrabajo.area_id'=>'required',
        'puestoTrabajo.user_id'=>''
    ];

    public function mount(PuestoTrabajo $puestoTrabajo)
    {
        $this->puestoTrabajo = $puestoTrabajo;
        $this->toEdit = false;
        # code...
    }

    public function edit(PuestoTrabajo $puestoTrabajo)
    {
        # code...
        $this->puestoTrabajo = $puestoTrabajo;
        $this->toEdit = true;

    }

    public function remove(PuestoTrabajo $puestoTrabajo)
    {
        # code...
        $this->puestoTrabajo = $puestoTrabajo;

    }

    public function create()
    {
        # code...
        $this->puestoTrabajo = new PuestoTrabajo;
        $this->toEdit = false;
    }

    public function updated($properyName)
    {
        # code...
        $this->validateOnly($properyName);
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }

    public function save()
    {
        # code...
        $this->validate();

        $this->puestoTrabajo->save();

        session()->flash('success', 'Puesto de trabajo guardado correctamente.');

        $this->closeModal();
    }

    public function render()
    {
        $puestos = PuestoTrabajo::get();

        $areas = Area::orderBy('nombre')->get();

        $sedes = Sede::orderBy('nombre')->get();

        $tecnicos = User::role('Tecnico')->whereHas('tecnico', function ($query) {
            $query->where('area_id',$this->puestoTrabajo->area_id)
                  ->where('estado',1);
        })->get();

        return view('livewire.negocio.puesto-trabajo.list', 
        compact('puestos','areas','sedes','tecnicos'));
    }

    public function destroy()
    {
        # code...
        $this->puestoTrabajo->delete();

        session()->flash('success', 'Puesto de trabajo eliminado correctamente.');

        $this->closeModal();
    }
}
