<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaEspecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_especials', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable(true);
            $table->longText('descripcion')->nullable(true);
            $table->integer('se_repite')->nullable(true)->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('dia_especials');
    }
}
