<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbCriterioAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbCriterioAvaliacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->double('peso');
            $table->integer('id_tipoTrabalho')->unsigned()->nullable();
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
