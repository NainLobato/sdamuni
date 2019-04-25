<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManualesAdministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuales_administrativos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->string('denominacion', 100);
            $table->date('fecha_autorizacion');
            $table->string('observaciones', 300);
        
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
        Schema::dropIfExists('manuales_administrativos');
    }
}
