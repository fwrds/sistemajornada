<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbParticipante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbParticipante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf')->unique();
            $table->string('nome');
            $table->string('senha');
            $table->boolean('externo');
            $table->integer('id_instituicao')->unsigned()->nullable();
            $table->foreign('id_instituicao')->references('id')->on('tbInstituicao')->onUpdated('cascade');
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
