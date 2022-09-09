<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public $showSavedAlert = false;
    public $showDemoNotification = false;

    public function rules() {

    return [
        'user.first_name' => 'required | max:15',
        'user.last_name' => 'required |max:20',
        'user.id_number'=>'required | numeric',
        'user.email' => 'required | email',
        'user.gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
        'user.address' => 'required |max:40',
        'user.number' => 'required |numeric',
    ];
}

    public function mount() {
         $this->user = auth()->user(); 
    }

    public function save()
    {
        
        $this->validate();

        $this->user->save();

        $this->showSavedAlert = true;   
        
    }
    public function updated($properyName)
    {
        # code...
        $this->validateOnly($properyName);
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
