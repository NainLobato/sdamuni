<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatTecnicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_tecnico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('adju_directa');
            $table->boolean('invitacion');
            $table->boolean('licitacion_publica');
            $table->boolean('archivo')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_tecnico');
    }
}
