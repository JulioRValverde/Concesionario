<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PuestoTrabajo;

class PuestoTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PuestoTrabajo::create([
            'numero'=>'01',
            'sede_id'=>1,
            'area_id'=>1
        ]);

        PuestoTrabajo::create([
            'numero'=>'02',
            'sede_id'=>1,
            'area_id'=>2
        ]);

        PuestoTrabajo::create([
            'numero'=>'03',
            'sede_id'=>1,
            'area_id'=>3
        ]);


        PuestoTrabajo::create([
            'numero'=>'04',
            'sede_id'=>1,
            'area_id'=>4
        ]);

        PuestoTrabajo::create([
            'numero'=>'05',
            'sede_id'=>1,
            'area_id'=>5
        ]);

        PuestoTrabajo::create([
            'numero'=>'01',
            'sede_id'=>2,
            'area_id'=>1
        ]);

        PuestoTrabajo::create([
            'numero'=>'02',
            'sede_id'=>2,
            'area_id'=>2
        ]);

        PuestoTrabajo::create([
            'numero'=>'03',
            'sede_id'=>2,
            'area_id'=>3
        ]);


        PuestoTrabajo::create([
            'numero'=>'04',
            'sede_id'=>2,
            'area_id'=>4
        ]);

        PuestoTrabajo::create([
            'numero'=>'05',
            'sede_id'=>2,
            'area_id'=>5
        ]);

    }
}
