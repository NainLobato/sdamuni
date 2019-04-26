<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalonariosChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talonarios_cheques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('relacion_id')->unsigned();
            $table->string('banco'); 
            $table->integer('num_cuenta');
            $table->string('total_primero');
            $table->string('total_ultimo');
            $table->string('utilizado_primero');
            $table->string('utilizado_ultimo');
            $table->string('porUtilizar_primero');
            $table->string('porUtilizar_ultimo');
            $table->string('cancelados');

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
        Schema::dropIfExists('talonarios_cheques');
    }
}
