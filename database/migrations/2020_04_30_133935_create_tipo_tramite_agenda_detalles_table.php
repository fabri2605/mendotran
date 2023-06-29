<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTramiteAgendaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_tramite_agenda_detalles', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio')->nullable(true);
            $table->date('fecha_fin')->nullable(true);
            $table->integer('llegada')->default(0);
            $table->integer('dia_semana')->default(1);
            $table->time('hora_inicio')->nullable(true);
            $table->time('hora_fin')->nullable(true);
            $table->integer('cantidad_turnos')->default(0);
            $table->integer('tiempo_minutos')->default(0);
            $table->integer('tipo_tramite_agenda_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_tramite_agenda_detalles');
    }
}
