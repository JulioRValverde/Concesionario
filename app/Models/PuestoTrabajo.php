<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestoTrabajo extends Model
{
    use HasFactory;


    public function sede()
    {
        # code...
        return $this->belongsTo(Sede::class);
    }

    public function area()
    {
        # code...
        return $this->belongsTo(Area::class);
    }
}
