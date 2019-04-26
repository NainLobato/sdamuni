<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosFormasValoradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios_formas_valoradas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->string('concepto'); 
            $table->string('serie');
            $table->string('folioPrimero');
            $table->string('folioFinal');
            $table->string('area');
            $table->string('observaciones');
            
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('relacion_id')->references('id')->on('relaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios_formas_valoradas');
    }
}
