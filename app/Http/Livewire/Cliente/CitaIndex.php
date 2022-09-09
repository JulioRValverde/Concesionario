<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cita;

class CitaIndex extends Component
{
    public Cita $cita;

    public function mount(Cita $cita)
    {
        # code...
        $this->cita = $cita;
    }

    public function render()
    {
        $citas = array();

        if(auth()->user()->hasRole('Tecnico') || auth()->user()->hasRole('Administrador'))
        {
            $citas = Cita::orderBy('fecha_inicial')->get();
        }
        else
        {
            $citas = auth()->user()->citas();
        }
        return view('livewire.cliente.citas.list', compact('citas'));
    }

    public function remove(Cita $cita)
    {
        # code...
        $this->cita = $cita;

    }

    public function destroy()
    {
        # code...
        $this->cita->delete();

        session()->flash('success', 'Cita eliminada correctamente.');
        
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
}
