<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idPedido')->unsigned();
            $table->integer('idTipoVenta')->unsigned();
            $table->integer('idMetodoPago')->unsigned();
            $table->integer('idPromocion')->unsigned();
            $table->date('fechaCompra')->nullable;
            $table->date('fechaPago')->nullable;
            $table->double('total',8,2);
            $table->timestamps();
            $table->foreign('idPedido')->references('id')->on('pedidos')->onDelete("cascade");
            $table->foreign('idTipoVenta')->references('id')->on('tipovendedores')->onDelete("cascade");
            $table->foreign('idMetodoPago')->references('id')->on('metodopagos')->onDelete("cascade");
            $table->foreign('idPromocion')->references('id')->on('promociones')->onDelete("cascade");
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
