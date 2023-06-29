<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFields extends Migration
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
            $table->integer('tiempo_minutos')->default(0)->nullable(true)->change();
            $table->integer('dia_semana')->default(1)->nullable(true)->change();
            $table->integer('llegada')->default(0)->nullable(true)->change();
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
