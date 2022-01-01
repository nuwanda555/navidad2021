<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EspecialidadController;

Route::get('/send-email-confirmacion/{cita_id}', [MailController::class, 'sendEmailConfirmacion'])->name('send-email-confirmacion');
Route::get('confirmar-cita/{codigo}', [CitaController::class, 'confirmarCita'])->name('confirmar-cita');

Route::get('/especialidades/{especialidad_id}/doctores', [EspecialidadController::class, 'doctores'])->name('especialidades.doctores');

Route::get('/especialidades/grafica', [EspecialidadController::class, 'grafica'])->name('especialidades.grafica')->middleware('doctor');

Route::get('/calendario/{doctor_id}', [CitaController::class, 'calendario'])->name('citas.calendario');
Route::resource('/citas', CitaController::class);
