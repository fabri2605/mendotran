<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorarioPart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipo_tramite_agenda_detalles', function (Blueprint $table) {
            $table->time('hora_inicio_tarde')->nullable(true);
            $table->time('hora_fin_tarde')->nullable(true);
            $table->integer('cantidad_turnos_tarde')->default(0);
            $table->integer('tiempo_minutos_tarde')->default(0);
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
