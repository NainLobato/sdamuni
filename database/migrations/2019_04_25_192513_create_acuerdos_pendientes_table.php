<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcuerdosPendientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos_pendientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('num_acta');
            $table->date('fecha_Acta');
            $table->string('acuerdo');
            $table->integer('empleado_id')->unsigned();
            $table->string('accion_situacion');
            $table->string('comentarios');
            $table->integer('relacion_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
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
        Schema::dropIfExists('acuerdos_pendientes');
    }
}
