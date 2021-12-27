<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha_hora');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('doctor_id')->references('id')->on('doctores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
