<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadesParamunicipalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades_paramunicipales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->integer('empleado_titular_id')->unsigned();
            $table->string('entidad_paramunicipal', 100);
            $table->string('decreto', 10);
            $table->string('gaceta_oficial', 10);

            $table->timestamps();
            $table->softDeletes(); 
            
            $table->foreign('relacion_id')->references('id')->on('ayuntamientos')->onDelete('cascade');
            $table->foreign('empleado_titular_id')->references('id')->on('empleados')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades_paramunicipales');
    }
}
