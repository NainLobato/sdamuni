<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyuntamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayuntamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_id')->unsigned();
            $table->string('escudo', 50);
            $table->string('telefono1', 10);
            $table->string('telefono2', 10);
            $table->string('correo', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('municipio_id')->references('id')->on('cat_municipios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayuntamientos');
    }
}
