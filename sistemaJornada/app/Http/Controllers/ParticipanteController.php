<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Participante;
use App\Trabalho;
use App\TipoTrabalho;

class ParticipanteController extends Controller
{
 public function index(){
     return Participante::orderBy("id", "asc") -> get();
 }
    //Participante
 public function salvarParticipante(Request $request){
     $participante = new Participante;
     $participante->nome=$request->input("nome");
     $participante->cpf=$request->input("cpf");
     $participante->senha=$request->input("senha");
     $participante->externo=$request->input("externo");
     $participante->save();
       // $instituicao = Instituicao::find($id_instituicao);
        //inserirInstituicao($request->input"nome_instituicao");
        //$participante->instituicao()->associate($instituicao);
        //$participante->save();
     Return "Participante criado com sucesso!";
 }

public function atualizarParticipante(Request $request, $id){
 $participante=Participante::find($id);
 $participante->nome=$request->input("nome");
 $participante->cpf=$request->input("cpf");
 $participante->senha=$request->input("senha");
 $participante->save();

 Return "Participante atualizado com sucesso!";
}

public function desabilitarParticipante(Request $request, $id){
 $participante=Participante::find($id);
 $participante->disponivel = false;
 $participante->save();

 return "Participante removido com sucesso!";
}
public function editarParticipante($id){
 return Participante::find("id");
}
public function findParticipante($id){
    return Participante::find("id");
}


    //Trabalho

public function salvarTrabalho(Request $request,$id_tipoTrabalho,$id_participante){
 $trabalho = new Trabalho;
 $trabalho->nome=$request->input("nome");
 $trabalho->save();
 $tipoTrabalho = TipoTrabalho::find($id_tipoTrabalho);
 $trabalho->tipoTrabalho()->associate($id_tipoTrabalho);
 $participante = Participante::find($id_participante);
 $trabalho->participante()->associate($participante);
 Return "Trabalho criado com sucesso!";
}
public function salvarResumo(Request $request,$id_trabalho){
 $resumo = new Trabalho;
 $resumo->texto=$request->input("texto");
 $resumo->palavras_chave=$request->input("palavras_chave");
 $resumo->save();
 $trabalho = Trabalho::find($id_trabalho);
 $resumo->trabalho()->associate($trabalho);
 $resumo->save();
 Return "Resumo criado com sucesso!";
}

public function atualizarTrabalho(Request $request, $id){
 $trabalho=Trabalho::find($id);
 $trabalho->nome=$request->input("nome");
 $trabalho->save();

 Return "Trabalho atualizado com sucesso!";
}

public function desabilitarTrabalho(Request $request, $id){
 $trabalho=Trabalho::find($id);
 $trabalho->disponivel = false;
 $trabalho->save();

 return "Trabalho removido com sucesso!";
}
public function editarTrabalho($id){
 return Trabalho::find("id");
}

public function associarCoautor($id_trabalho,$id_participante){
 $trabalho = Trabalho::find($id_trabalho);
 $coautor = Participante::find($id_participante);
 $trabalho->coautores()->attach($coautor);

}


}
