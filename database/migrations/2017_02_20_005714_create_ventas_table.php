<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('producto')->unsigned();
            $table->foreign('producto')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('cliente')->unsigned();
            $table->foreign('cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->integer('apartar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ventas');
    }
}
