<?php

namespace App\Http\Livewire\Negocio;

use Livewire\Component;
use App\Models\Area;

class AreaIndex extends Component
{
    public Area $area;

    public $toEdit;

    protected $rules = [
        'area.nombre' => 'required',
        'area.color'=>'required'
    ];

    public function mount(Area $area)
    {
        $this->area = $area;
        $this->toEdit = false;
        # code...
    }

    public function edit(Area $area)
    {
        # code...
        $this->area = $area;
        $this->toEdit = true;

    }

    public function remove(Area $area)
    {
        # code...
        $this->area = $area;
    }

    public function render()
    {
        $areas = Area::get();
        
        return view('livewire.negocio.area.list', compact('areas'));
    }

    public function create()
    {
        # code...
        $this->area = new Area;
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

        $this->area->save();

        session()->flash('success', 'Area guardada correctamente.');

        $this->closeModal();
    }

    public function destroy()
    {
        # code...
        $this->area->delete();

        session()->flash('success', 'Area eliminada correctamente.');

        $this->closeModal();
    }
}
