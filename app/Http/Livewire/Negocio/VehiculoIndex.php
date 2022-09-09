<?php

namespace App\Http\Livewire\Negocio;

use Livewire\Component;
use App\Models\Vehiculo;
use App\Models\User;

class VehiculoIndex extends Component
{
    
    public Vehiculo $vehiculo;

    public $toEdit;

    public $isEmpleado;

    public $isPropio;

    protected $rules = [
        'vehiculo.placa' => 'required | size:6',
        'vehiculo.modelo'=>'required | numeric',
        'vehiculo.estilo'=>'required',
        'vehiculo.marca'=>'required',
        'vehiculo.user_id'=>'required'
    ];

    public function mount(Vehiculo $vehiculo)
    {
        $this->vehiculo = $vehiculo;
        $this->toEdit = false;
        $this->isPropio = true;
        # code...
    }

    public function edit(Vehiculo $vehiculo)
    {
        # code...
        $this->vehiculo = $vehiculo;
        $this->toEdit = true;

    }

    public function remove(Vehiculo $vehiculo)
    {
        # code...
        $this->vehiculo = $vehiculo;

    }

    public function create()
    {
        # code...
        $this->vehiculo = new Vehiculo;
        $this->vehiculo->user_id = auth()->user()->id; 
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

        $this->vehiculo->save();

        session()->flash('success', 'Vehiculo guardado correctamente.');
        
        $this->closeModal();
    }

    public function render()
    {
        $user = auth()->user();
        $vehiculos = null;
        $propietarios = null;
        if($user->hasRole('Tecnico') || $user->hasRole('Administrador'))
        {
            $vehiculos = Vehiculo::get();
            $this->isEmpleado = true;
            $propietarios = User::orderBy('first_name')->get();

            if($this->isPropio)
            {
                $this->vehiculo->user_id = auth()->user()->id;
            }
        }
        else
        {
            $vehiculos = $user->vehiculos;

            $this->isEmpleado = false;
        }   
        return view('livewire.negocio.vehiculos.list', compact('vehiculos','propietarios'));
    }

    public function destroy()
    {
        # code...
        $this->vehiculo->delete();

        session()->flash('success', 'Vehiculo eliminado correctamente.');

        $this->closeModal();
    }
}
