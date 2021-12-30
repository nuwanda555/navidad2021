<?php
if (! function_exists('randomColor')) {
    function randomColor(){
        $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        return "'$color'";
    }
}

//funcion que recibe 3  parametros hora inicial, hora final y duracion  y devuelve una hora aleatoria entre esas dos horas redondeada a duración
if (! function_exists('randomHora')) {
    function randomHora($horaInicio, $horaFin, $duracionCita){
        $horaInicio=strtotime($horaInicio);
        $horaFin=strtotime($horaFin);
        $duracionCita=$duracionCita*60;
        $horaAleatoria=rand($horaInicio, $horaFin);
        $horaAleatoria=round($horaAleatoria/$duracionCita)*$duracionCita;
        $horaAleatoria=date('H:i:00', $horaAleatoria);
        return $horaAleatoria;
    }
}

