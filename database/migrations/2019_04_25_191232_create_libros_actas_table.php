<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros_actas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->date('fecha_primer_sesion');
            $table->date('fecha_ultima_sesion');
            $table->integer('primer_folio');
            $table->integer('ultimo_folio');
            $table->string('comentarios');
            $table->string('ubicacion');
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
        Schema::dropIfExists('libros_actas');
    }
}
