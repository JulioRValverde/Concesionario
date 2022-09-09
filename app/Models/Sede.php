<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    public function puestos_trabajo()
    {
        # code...
        return $this->hasMany(PuestoTrabajo::class);
    }

    public function areas()
    {
        # code...
        return Area::whereHas('puestos_trabajo', function ($query) {
            $query->whereIn('id',$this->puestos_trabajo()->select('id')->get());
        })->get();
    }
}
