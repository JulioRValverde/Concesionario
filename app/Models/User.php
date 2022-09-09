<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 /*    protected $fillable = [
        'name',
        'email',
        'password',
    ]; */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vehiculos()
    {
        # code...
        return $this->hasMany(Vehiculo::class);
    }

    public function tecnico()
    {
        # code...
        return $this->hasOne(Tecnico::class);
    }

    public function citas()
    {
        # code...
        return Cita::whereHas('vehiculo', function ($query) {
            $query->whereIn('id',$this->vehiculos()->select('id')->get());
        })->orderBy('fecha_inicial')->get();
    }
}
