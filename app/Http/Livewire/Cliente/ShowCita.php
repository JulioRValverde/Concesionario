<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cita;

class ShowCita extends Component
{
    public Cita $cita;

    public function mount(Cita $cita)
    {
        # code...
        $this->cita = $cita;
    }

    public function render()
    {
        return view('livewire.cliente.citas.show');
    }
}
