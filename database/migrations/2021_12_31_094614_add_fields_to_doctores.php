<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDoctores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctores', function (Blueprint $table) {
            $table->unsignedBigInteger('poblacion_id')->nullable();
            $table->foreign('poblacion_id')->references('id')->on('poblaciones');
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctores', function (Blueprint $table) {
            $table->dropForeign(['poblacion_id']);
            $table->dropColumn('poblacion_id');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
        });
    }
}
