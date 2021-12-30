<?php

namespace App\Http\Controllers;

use App\Models\Cita;


use App\Mail\EmailCita;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendEmailConfirmacion($id)
    {
        $cita = Cita::find($id);
        $paciente = Paciente::find($cita->paciente_id);
        $codigo = $cita->codigo;

        $email = $paciente->email;

        $mailData = [
            'title' => "Confirmación de la cita con el doctor {$cita->doctor->nombre} {$cita->doctor->apellidos} ({$cita->doctor->especialidad->especialidad})",
            'url' => config("app.url") . "/confirmar-cita/{$codigo}",
        ];

        Mail::to($email)->send(new EmailCita($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
