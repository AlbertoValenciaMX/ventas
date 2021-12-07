<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idTipoCliente')->unsigned();
            $table->string('nombre', 50);
            $table->string('domicilio', 50);
            $table->string('estado', 20);
            $table->string('ciudad', 40);
            $table->string('cp', 5);
            $table->string('email', 320);
            $table->string('telefono', 10);
            $table->string('rfc', 13);
            $table->timestamps();
            $table->foreign('idTipoCliente')->references('id')->on('tipoclientes')->onDelete("cascade");
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
