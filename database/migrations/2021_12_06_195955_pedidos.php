<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idProducto')->unsigned();
            $table->integer('idCliente')->unsigned();
            $table->integer('idVendedor')->unsigned();
            $table->integer('cantidad');
            $table->double('subTotal', 8,2);
            $table->timestamps();
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete("cascade");
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete("cascade");
            $table->foreign('idVendedor')->references('id')->on('vendedores')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
