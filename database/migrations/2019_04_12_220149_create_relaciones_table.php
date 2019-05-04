<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formato_id')->unsigned();
            $table->integer('ayuntamiento_id')->unsigned();
            $table->integer('empleado_integra_id')->unsigned()->nullable();
            $table->integer('empleado_entrega_id')->unsigned()->nullable();
            $table->integer('empleado_recibe_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ayuntamiento_id')->references('id')->on('ayuntamientos')->onDelete('cascade');
            $table->foreign('empleado_integra_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('empleado_entrega_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('empleado_recibe_id')->references('id')->on('empleados')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relaciones');
    }
}
