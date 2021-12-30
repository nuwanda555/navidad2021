<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function user()
    {
      return $this->morphOne('App\Models\User', 'perfil');
    }
}
