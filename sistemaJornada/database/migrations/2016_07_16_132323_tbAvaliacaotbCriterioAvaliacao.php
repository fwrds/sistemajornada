<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAvaliacaotbCriterioAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAvCriterioAv', function (Blueprint $table) {
            $table->integer('id_avaliacao')->unsigned();
            $table->integer('id_criterioAvaliacao')->unsigned();
            $table->primary(array('id_avaliacao','id_criterioAvaliacao'));
            $table->foreign('id_avaliacao')->references('id')->on('tbAvaliacao')->onUpdated('cascade');
            $table->foreign('id_criterioAvaliacao')->references('id')->on('tbCriterioAvaliacao')->onUpdated('cascade');
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
