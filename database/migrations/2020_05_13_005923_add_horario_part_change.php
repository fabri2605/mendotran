<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorarioPartChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipo_tramite_agenda_detalles', function (Blueprint $table) {
            $table->integer('cantidad_turnos')->default(0)->nullable(true)->change();
            $table->integer('tiempo_minutos')->default(0)->default(0)->nullable(true)->change();
            $table->integer('cantidad_turnos_tarde')->default(0)->default(0)->nullable(true)->change();
            $table->integer('tiempo_minutos_tarde')->default(0)->default(0)->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipo_tramite_agenda_detalles', function (Blueprint $table) {
            //
        });
    }
}
