<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('ayuntamiento_id')->unsigned();
            $table->integer('cargo_id')->unsigned();
            $table->string('cargo', 50);
            $table->integer('sexo');
            $table->boolean('fism');
            $table->string('profesion', 100);
            $table->date('fecha_inicio_funciones');
            $table->string('telefono', 10);
            $table->integer('status');
            $table->date('fecha_fin_funciones');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ayuntamiento_id')->references('id')->on('ayuntamientos')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cat_Cargos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
