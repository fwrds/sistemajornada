<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAvaliacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_trabalho')->unsigned()->nullable();
            $table->integer('id_avaliador')->unsigned()->nullable();
            $table->foreign('id_avaliador')->references('id')->on('tbAvaliador')->onUpdated('cascade');
            $table->foreign('id_trabalho')->references('id')->on('tbTrabalho')->onUpdated('cascade');
            $table->integer('nota');
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
