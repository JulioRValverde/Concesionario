<?php

namespace App\Http\Livewire\Negocio;

use Livewire\Component;
use App\Models\Sede;

class SedeIndex extends Component
{
    public Sede $sede;

    public $toEdit;

    protected $rules = [
        'sede.nombre' => 'required',
        'sede.direccion'=>'required',
        'sede.centro_costo'=>'required | size:3 '
    ];

    public function mount(Sede $sede)
    {
        $this->sede = $sede;
        $this->toEdit = false;
        # code...
    }

    public function edit(Sede $sede)
    {
        # code...
        $this->sede = $sede;
        $this->toEdit = true;

    }

    public function remove(Sede $sede)
    {
        # code...
        $this->sede = $sede;

    }
    public function render()
    {
        $sedes = Sede::paginate(10);

        return view('livewire.negocio.sede.list', compact('sedes'));
    }

    public function create()
    {
        # code...
        $this->sede = new Sede;
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

        $this->sede->save();

        session()->flash('success', 'Sede guardada correctamente.');

        $this->closeModal();
    }

    public function handleSubmitForm()
    {
        $this->save();
    }

    public function destroy()
    {
        # code...
        $this->sede->delete();

        session()->flash('success', 'Sede eliminada correctamente.');
        
        $this->closeModal();
    }
}
