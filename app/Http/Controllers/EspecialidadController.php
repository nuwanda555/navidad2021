<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{

    public function doctores($especialidad_id){
        $doctores=Doctor::where('especialidad_id',$especialidad_id)->orderBy("apellidos")->get(['nombre','apellidos','id','foto']);
        return $doctores;
    }

    public function grafica(){
        $cantidad=Especialidad::count();
        $nombreEspecialidades=Especialidad::orderBy("especialidad")->pluck('especialidad')->join("','");    //para que queden separados por coma
        $cantidadDoctores=Doctor::selectRaw('especialidad_id, count(*) as cantidad')->groupBy('especialidad_id')->pluck('cantidad')->join(',');

        //string  de colores al azar con tantos elementos como elementos tenga la variable $nombreEspecialidades
        $colores=join(",",array_map('randomColor',range(0,$cantidad-1)));

        return view('especialidades.grafica',compact('nombreEspecialidades','cantidadDoctores','colores'));
    }

 
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidad $especialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidad $especialidad)
    {
        //
    }
}
