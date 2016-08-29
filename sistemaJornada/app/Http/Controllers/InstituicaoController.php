<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Instituicao;

class InstituicaoController extends Controller
{
	public function index(){
		return Instituicao::orderBy("nome", "asc") -> get();
	}

	public function inserirInstituicao($nomeInstituição){
		$instituicao = new Instituicao;
		$instituicao->nome = $nomeInstituição;
		$instituicao->save();

		Return "Instituição salva com sucesso!";
	}

	public function procurar($id){
		return Instituicao::find("id");
	}
}
