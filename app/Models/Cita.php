<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public function vehiculo()
    {
        # code...
        return $this->belongsTo(Vehiculo::class);
    }

    public function puesto_trabajo()
    {
        # code...
        return $this->belongsTo(PuestoTrabajo::class);
    }
}
