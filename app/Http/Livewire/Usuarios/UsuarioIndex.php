<?php

namespace App\Http\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Tecnico;
use App\Models\Area;


class UsuarioIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $buscar = '';

    public $filtrarTecnicos;

    public User $usuario;

    public $area_id;

    protected $rules = [
        'area_id'=>'required'
    ];

    public function mount()
    {
        # code...
        $this->filtrarTecnicos = false;

        $this->usuario = new User;
    }
    public function render()
    {
        
        $usuarios = null;

        if ($this->filtrarTecnicos) {

            $usuarios = User::role('tecnico')
            ->where(function($query) {
                $query->where('first_name','like', '%'.$this->buscar.'%')
                ->orWhere('last_name','like', '%'.$this->buscar.'%')
                ->orWhere('id_number','like', '%'.$this->buscar.'%');
            })->paginate(10);
            
        }
        else
        {
            $usuarios = User::where('first_name','like', '%'.$this->buscar.'%')
            ->orWhere('last_name','like', '%'.$this->buscar.'%')
            ->orWhere('id_number','like', '%'.$this->buscar.'%')
            ->paginate(10);
        }
        
        $areas = Area::orderBy('nombre')->get();
        return view('livewire.usuarios.list', compact('usuarios','areas'));
    }

    public function prepararAsignacion(User $user)
    {
        # code...
        $this->usuario = $user;

    }
    public function asignarTecnico()
    {
        $this->validate();

        $tecnico = $this->usuario->tecnico;

        if($tecnico)
        {
            $tecnico->estado = 1;
            $tecnico->area_id = $this->area_id;
            $tecnico->save();
        }
        else
        {
            Tecnico::create([
                'user_id'=>$this->usuario->id,
                'area_id'=>$this->area_id,
            ]);
        }
        # code...
        $this->usuario->assignRole('Tecnico');

        session()->flash('success', 'Rol asignado correctamente.');

        $this->closeModal();
    }

    public function quitarTecnico(User $user)
    {
        $tecnico = $user->tecnico;

        $tecnico->estado = 2;
        # code...
        session()->flash('success', 'Rol quitado correctamente.');

        $user->removeRole('Tecnico');
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


}
