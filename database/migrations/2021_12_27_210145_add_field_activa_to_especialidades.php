<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldActivaToEspecialidades extends Migration
{
    public function up()
    {
        Schema::table('especialidades', function (Blueprint $table) {
            $table->boolean('activa')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad', function (Blueprint $table) {
            $table->dropColumn('activa');
        });
    }
}
