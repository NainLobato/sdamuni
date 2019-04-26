<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConciliacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciliaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->integer('cuenta');
            $table->decimal('depositos_municipio',10,2);
            $table->decimal('cheques_noCobrados',10,2);
            $table->decimal('cargos_noConsiderados',10,2);
            $table->decimal('depositos_banco',10,2);
            $table->date('fecha_actualizacion');
            $table->decimal('saldo_actualizado',10,2); 
         
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
        Schema::dropIfExists('conciliaciones');
    }
}
