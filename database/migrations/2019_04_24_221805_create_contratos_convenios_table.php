<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_convenios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->nullable()->unsigned();
            $table->string('denominaciones', 2000);
            $table->date('fecha_subscripcion');
            $table->date('periodo_inicio');
            $table->date('periodo_final');
            $table->integer('importe');
            $table->string('observaciones', 1000);
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
        Schema::dropIfExists('contratos_convenios');
    }
}
