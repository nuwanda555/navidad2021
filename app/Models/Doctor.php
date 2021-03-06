<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctores";
    protected $guarded = [];

    

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function user()
    {
        return $this->morphOne('App\Models\User', 'perfil');
    }

    public function poblacion()
    {
        return $this->belongsTo(Poblacion::class);
    }
}
