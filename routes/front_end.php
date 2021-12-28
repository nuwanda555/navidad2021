<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadController;


Route::get('/especialidades/{especialidad_id}/doctores', [EspecialidadController::class, 'doctores'])->name('especialidades.doctores');

Route::get('/especialidades/grafica', [EspecialidadController::class, 'grafica'])->name('especialidades.grafica');


