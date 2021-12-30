<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->longText('motivo')->nullable();
            $table->longText('sintomas')->nullable();
            $table->longText('diagnostico')->nullable();
            $table->longText('tratamiento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn('motivo');
            $table->dropColumn('sintomas');
            $table->dropColumn('diagnostico');
            $table->dropColumn('tratamiento');
        });
    }
}
