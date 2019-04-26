<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuiciosContraAyuntamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juicios_contra_ayuntamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->string('tipo', 50);
            $table->date('fecha_inicio');
            $table->string('instancia', 100);
            $table->string('denunciante', 200);
            $table->string('descripcion', 1000);
            $table->string('etapa', 20);
            $table->integer('monto');
            $table->string('acciones', 1000);


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
        Schema::dropIfExists('juicios_contra_ayuntamientos');
    }
}
