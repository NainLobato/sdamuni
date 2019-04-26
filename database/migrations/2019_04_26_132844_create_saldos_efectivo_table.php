<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaldosEfectivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldos_efectivo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valor_id')->unsigned();
            $table->integer('tipo'); //1- Moneda  2-Billete  3-Documento
            $table->decimal('cantidad',10, 2);
            $table->string('descripcion', 1000);
            $table->decimal('total',10, 2);
         
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('valor_id')->references('id')->on('cat_valor_efectivo')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldos_efectivo');
    }
}
