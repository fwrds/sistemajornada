<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\CoordenadorDePesquisa;
use App\Evento;
use App\TipoTrabalho;
use App\CriterioAvaliacao;
use App\Participante;
use App\Avaliacao;
use App\Trabalho;
use App\Avaliador;

class CoordenadorDePesquisaController extends Controller
{
    
    public function index(){
    	return CoordenadorDePesquisa::orderBy("id", "asc") -> get();
    }
    //Evento
    public function salvarEvento(Request $request,$id_coordenadorDePesquisa){
    	$evento= new Evento;
    	$evento->nome=$request->input("nome");
        $evento->data=$request->input("data");
    	$evento->save();
        $coordenadorDePesquisa = CoordenadorDePesquisa::find($id_coordenadorDePesquisa);
        $evento->coordenadorDePesquisa()->associate($coordenadorDePesquisa);
        $evento->save();
    	Return "Evento criado com sucesso!";
    }

    public function atualizarEvento(Request $request, $id){
    	$evento=Evento::find($id);
    	$evento->nome=$request->input("nome");
    	$evento->data=$request->input("data");
    	$evento->save();

    	Return "Evento atualizado com sucesso!";
    }
    public function concluirEvento(Request $request, $id){
        $evento=Evento::find($id);
        $evento->concluido = true;
        $evento->save();

        Return "Evento concluído! ";
    }

    public function desabilitarEvento(Request $request, $id){
    	$evento=Evento::find($id);
        $evento->disponivel = false;
        $evento->save();

    	return "Evento removido com sucesso!";
    }
    public function editarEvento($id){
    	return Evento::find("id");
    }

    //TipoTrabalho

    public function novoTipoTrabalho(Request $request,$id_evento){
        $tipoTrabalho = new TipoTrabalho;
        $tipoTrabalho->descricao=$request->input("descricao");
       // $tipoTrabalho->save();
        $evento = Evento::find($id_evento);
        $tipoTrabalho->eventos()->attach($evento);
        $tipoTrabalho->save();
        Return "Tipo Trabalho criado com sucesso!";
    }
    public function salvarTipoTrabalho(Request $id_tipoTrabalho,$request,$id_evento){
        $tipoTrabalho =TipoTrabalho::find($id_tipoTrabalho);
       // $tipoTrabalho->save();
        $evento = Evento::find($id_evento);
        $tipoTrabalho->eventos()->attach($evento);
        $tipoTrabalho->save();
        Return "Tipo Trabalho criado com sucesso!";
    }
    public function listarTipoTrabalho(){
        Return TipoTrabalho::orderBy('id','asc')->get();
    }
    public function atualizarTipoTrabalho(Request $request, $id){
        $tipoTrabalho=TipoTrabalho::find($id);
        $tipoTrabalho->descricao=$request->input("descricao");
        $tipoTrabalho->save();

        Return "Tipo Trabalho atualizado com sucesso!";
    }

    public function desabilitarTipoTrabalho(Request $request, $id){
        $tipoTrabalho=TipoTrabalho::find($id);
        $tipoTrabalho->disponivel = false;
        $tipoTrabalho->save();

        return "Tipo Trabalho removido com sucesso!";
    }
    public function editarTipoTrabalho($id){
        return TipoTrabalho::find("id");
    }

    //Criterio de avaliacao

     public function salvarCriterioAvaliacao(Request $request,$id_tipoTrabalho){
        $criterioAvaliacao = new CriterioAvaliacao;
        $criterioAvaliacao->nome = $request->input('nome');
        $criterioAvaliacao->descricao=$request->input("descricao");
        $criterioAvaliacao->peso = $request->input('peso');
       // $tipoTrabalho->save();
        $tipoTrabalho = TipoTrabalho::find($id_tipoTrabalho);
        $criterioAvaliacao->tipoTrabalho()->associate($evento);
        $criterioAvaliacao->save();
        Return "Critério de avaliacao criado com sucesso!";
    }
    public function listarCriterioAvaliacao(){
        Return CriterioAvaliacao::orderBy('id','asc')->get();
    }

    public function atualizarCriterioAvaliacao(Request $request, $id){
        $criterioAvaliacao=TipoTrabalho::find($id);
        $criterioAvaliacao->descricao=$request->input("descricao");
        $criterioAvaliacao->save();

        Return "Tipo Trabalho atualizado com sucesso!";
    }

    public function desabilitarCriterioAvaliacao(Request $request, $id){
        $criterioAvaliacao=CriterioAvaliacao::find($id);
        $criterioAvaliacao->disponivel = false;
        $criterioAvaliacao->save();

        return "Evento removido com sucesso!";
    }
    public function editarCriterioAvaliacao($id){
        return TipoTrabalho::find("id");
    }


    //Relatorios

    public function gerarRelatorioParticipantes(){
        $participantes = Participante::orderBy('id','asc')->get();
    }
     public function gerarRelatorioAvaliacoes(){
        $avaliacoes = Avaliacao::orderBy('id','asc')->get();
    }
     public function gerarRelatorioTrabalhos(){
        $trabalhos = Trabalho::orderBy('id','asc')->get();
    }
     public function gerarChachasQR(){
        $participantes = Participante::orderBy('id','asc')->get();
    }
     public function atribuirAvaliadorTrabalho(Request $request, $id_avaliador,$id_trabalho){
        $avaliador = Avaliador::find($id_avaliador);
        $trabalho = Trabalho::find($id_trabalho);
        $avaliacao = new Avaliacao;
        $avaliacao->avaliador()->associate($avaliador);
        $avaliacao->trabalho()->associate($trabalho);
        $avaliacao->save();
    }

    //E-mails
    public function avisoPrazoEnvioResumo(){
        $participantes = Participante::orderBy('id','asc')->get();
    }
    public function avisoPrazoCorrecaoResumo(){
        $avaliadores = Avaliador::orderBy('id','asc')->get();
    }

}
