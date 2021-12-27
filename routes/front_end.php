<?php

use Illuminate\Support\Facades\Route;


Route::get('/especialidades/list', [EspecialidadController::class, 'list'])->name('especialidades.list');

