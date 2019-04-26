<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActasConsejoPlaneacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas_consejo_planeacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_acta_consejo');
            $table->date('fecha_acta_levanto');
            $table->string('descripcion_acta');
            $table->integer('año_acta');
            $table->integer('num_forjas');
            $table->boolean('firmas_consejo');
            $table->boolean('sello_validez');
            $table->integer('relacion_id')->unsigned();
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
        Schema::dropIfExists('actas_consejo_planeacion');
    }
}
