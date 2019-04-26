<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArqueosCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arqueos_caja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->decimal('saldo_efectivo',10, 2);
            $table->decimal('total_billetes',10, 2);
            $table->decimal('total_monedas',10, 2);
            $table->decimal('total_documentos',10, 2);
            $table->decimal('total',10, 2);
            $table->decimal('diferencia',10, 2);
         
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
        Schema::dropIfExists('arqueos_caja');
    }
}
