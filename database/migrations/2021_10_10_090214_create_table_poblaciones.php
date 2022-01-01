<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePoblaciones extends Migration
{
    public function up()
    {
        Schema::create('poblaciones', function (Blueprint $table) {
            $table->id();
            $table->string('comunidad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('poblacion')->nullable();
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->double('altitud')->nullable();
            $table->integer('habitantes')->nullable();
            $table->integer('hombres')->nullable();
            $table->integer('mujeres')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poblaciones');
    }
}
