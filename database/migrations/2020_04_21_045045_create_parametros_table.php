<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->longText('introduccion')->nullable(true);
            $table->longText('texto_adicional')->nullable(true);
            $table->string('link_boleto_municipal')->nullable(true);
            $table->string('link_boleto_nacional')->nullable(true);
            $table->string('direccion')->nullable(true);
            $table->string('horario')->nullable(true);
            $table->string('telefono')->nullable(true);
            $table->string('imagen')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametros');
    }
}
