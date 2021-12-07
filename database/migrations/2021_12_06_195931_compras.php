<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Compras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idProveedores')->unsigned();
            $table->integer('idTipoCompra')->unsigned();
            $table->integer('idMetodoPago')->unsigned();
            $table->date('fechaCompra')->nullable;
            $table->date('fechaPago')->nullable;
            $table->double('total',8,2);
            $table->timestamps();
            $table->foreign('idProveedores')->references('id')->on('proveedores')->onDelete("cascade");
            $table->foreign('idTipoCompra')->references('id')->on('tipocompras')->onDelete("cascade");
            $table->foreign('idMetodoPago')->references('id')->on('metodopagos')->onDelete("cascade");
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
