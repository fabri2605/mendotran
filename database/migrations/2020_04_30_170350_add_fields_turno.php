<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsTurno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->string('nombre')->nullable(true);
            $table->string('apellido')->nullable(true);
            $table->string('tipo_documento')->nullable(true);
            $table->string('documento')->nullable(true);
            $table->string('calle')->nullable(true);
            $table->string('nro')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('telefono')->nullable(true);
            $table->integer('tipo_tramite_id');
            $table->date('fecha_turno');
            $table->time('hora_turno');
            $table->string('estado');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turnos', function (Blueprint $table) {
            //
        });
    }
}
