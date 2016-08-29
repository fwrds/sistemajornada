<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbResumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbResumo', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('texto');
            $table->longText('revisao');
            $table->enum('status',array('APROVADO','AGUARDANDO','CORRIGIDO','REPROVADO'));
            $table->integer('id_trabalho')->unsigned()->nullable();
            $table->foreign('id_trabalho')->references('id')->on('tbTrabalho')->onUpdated('cascade');
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
