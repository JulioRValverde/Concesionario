<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','area_id','estado'];

    public function area()
    {
        # code...
        return $this->belongsTo(Area::class);
    }
}
