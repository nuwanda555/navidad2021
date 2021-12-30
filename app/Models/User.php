<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    //es muy importante poner esta linea, para que cuando accedamos a la tabla de users nos muestre los datos de pacientes o doctores
    protected $with = ['perfil'];

    public function perfil()
    {
        return $this->morphTo();
    }

    public function getEsDoctorAttribute()
    {
        return $this->perfil_type == 'App\Models\Doctor';
    }
    public function getEsPacienteAttribute()
    {
        return $this->perfil_type == 'App\Models\Paciente';
    }
}
