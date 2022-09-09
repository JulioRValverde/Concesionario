<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create([
            'name'=>'Administrador',
            'guard_name'=>'web'
        ]);

        Role::create([
            'name'=>'Propietario',
            'guard_name'=>'web'
        ]);

        Role::create([
            'name'=>'Tecnico',
            'guard_name'=>'web'
        ]);


        $user = User::create([
            'email' =>'administrador@gmail.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('Administrador');

    }
}
