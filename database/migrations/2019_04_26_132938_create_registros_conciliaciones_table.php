<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosConciliacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_conciliaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conciliacion_id')->unsigned();
            $table->integer('tipo'); //1- DEPOSITOS NO CONSIDERADOS  2-CHEQUES EXPEDIDOS Y NO COBRADOS   3-CARGOS BANCARIOS NO CONSIDERADOS 4- DEPOSITOS NO CONSIDERADOS POR EL BANCO 
            $table->date('fecha');
            $table->string('concepto', 500);
            $table->string('referencia', 500);
            $table->decimal('importe',10, 2);
         
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('conciliacion_id')->references('id')->on('conciliaciones')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros_conciliaciones');
    }
}
