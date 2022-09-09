<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Area::create([
            'nombre'=>'Mantenimiento preventivo',
            'color'=>'success'
        ]);

        Area::create([
            'nombre'=>'Garantía',
            'color'=>'info'
        ]);

        Area::create([
            'nombre'=>'Revisión kilometraje',
            'color'=>'primary'
        ]);


        Area::create([
            'nombre'=>'Mantenimiento correctivo',
            'color'=>'warning'
        ]);


        Area::create([
            'nombre'=>'Reparación de choques',
            'color'=>'danger'
        ]);
    }
}
