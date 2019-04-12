<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyuntamientoCatPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayuntamiento_cat_partido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id')->unsigned();
            $table->integer('ayuntamiento_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('partido_id')->references('id')->on('cat_partidos')->onDelete('cascade');
            $table->foreign('ayuntamiento_id')->references('id')->on('ayuntamientos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayuntamiento_cat_partido');
    }
}
