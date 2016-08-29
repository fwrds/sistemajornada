<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbTrabalho', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('id_autor')->unsigned()->nullable();
            $table->integer('id_tipoTrabalho')->unsigned()->nullable();
            $table->foreign('id_autor')->references('id')->on('tbParticipante')->onUpdated('cascade');
             $table->foreign('id_tipoTrabalho')->references('id')->on('tbTipoTrabalho')->onUpdated('cascade');
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
