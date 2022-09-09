<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sede;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create([
            'nombre' => 'Sector Belmonte',
            'direccion'=>'Av. 30 de agosto No 94-165',
            'centro_costo'=>'001'
        ]);

        Sede::create([
            'nombre' => 'Cc Parque Arboleda',
            'direccion'=>'Cra 14 #5-20',
            'centro_costo'=>'002'
        ]);
    }
}
