<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_tramites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('requisitos')->nullable(false);
            $table->longText('introduccion')->nullable(false);
            $table->longText('descripcion')->nullable(false);
            $table->longText('vigencia')->nullable(false);
            $table->longText('costo')->nullable(false);
            $table->string('denominacion')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_tramites');
    }
}
