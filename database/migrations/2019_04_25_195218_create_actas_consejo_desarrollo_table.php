<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActasConsejoDesarrolloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas_consejo_desarrollo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_acta');
            $table->string('asuntos_acta');
            $table->date('fecha_levanto_acta');
            $table->integer('año_acta');
            $table->integer('num_forjas');
            $table->boolean('firmas_consejo');
            $table->boolean('sellos_validez');
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
        Schema::dropIfExists('actas_consejo_desarrollo');
    }
}
