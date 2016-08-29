<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('tbEvento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('id_coordenadorDePesquisa')->nullable();
            $table->date('data');
            $table->boolean('concluido')->default(false);
            $table->foreign('id_coordenadorDePesquisa')->references('id')->on('tbCoordenadorDePesquisa')->onUpdated('cascade');
            $table->timestamps();
            $table->boolean('disponivel')->default(true);
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
