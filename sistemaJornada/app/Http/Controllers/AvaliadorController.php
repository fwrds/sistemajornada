<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Avaliador;
use App\Avaliacao;
use App\Participante;
use App\AreaConhecimento;
use App\Trabalho;
class AvaliadorController extends Controller
 {
  public function index(){
      return Avaliador::orderBy("id_participante", "asc") -> get();
    }
   public function salvarAvaliador(Request $request,$id_participante,$id_areaConhecimento){
    	$avaliador = new Avaliador();
    	$participante = Participante::find($id_participante);
    	$areaConhecimento = AreaConhecimento::find($id_areaConhecimento);
  		$avaliador->participante()->associate($participante);
  		$avaliador->areaConhecimento()->associate($areaConhecimento);
  		$avaliador->save();
    	Return "Avaliador criado com sucesso!";
    }
    public function salvarAvaliacao(Request $request,$id_avaliador,$id_trabalho){
    	$avaliacao = new Avaliacao();
    	$avaliacao->nota =$request->input("nota");
    	$avaliador = Avaliador::find($id_avaliador);
    	$trabalho = Trabalho::find($id_trabalho);
  		$avaliacao->trabalho()->associate($trabalho);
  		$avaliacao->avaliador()->associate($avaliacao);
  		$avaliacao->concluida= true;
  		$avaliacao->save();
    	Return "Avaliação criada com sucesso!";
    }
     public function atualizarAvaliador(Request $request, $id,$id_areaConhecimento){
    	$avaliador=Avaliacao::find($id);
    	$areaConhecimento = AreaConhecimento::find($id_areaConhecimento);
    	$avaliador->areaConhecimento()->associate($areaConhecimento);
    	$avaliador->save();

    	Return "Avaliador atualizado com sucesso!";
    }
    public function editarAvaliador($id){
    	return Avaliador::find("id");
    }
     public function atualizarAvaliacao(Request $request, $id){
    	$avaliacao=Avaliacao::find($id);
    	$avaliacao->nota=$request->input("nota");
    	$avaliacao->save();

    	Return "Avaliacao atualizado com sucesso!";
    }
    public function editarAvaliacao($id){
    	return Avaliacao::find("id");
    }
}
 