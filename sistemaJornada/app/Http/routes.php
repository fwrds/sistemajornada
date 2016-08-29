<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/batata', function () {
    return view('/batata');
});

Route::get("/api/v2/participantes/", "ParticipanteController@index");

Route::get("/api/v2/eventos/", "CoordenadorDePesquisaController@index");

Route::get("/api/v2/avaliadores/", "AvaliadorController@index");

// Rotas Menus
Route::get("/menuAdministrador", function() {
return view ("/menuAdministrador");});

Route::get("/menuParticipante", function() {
return view ("/menuParticipante");});

//Rotas Eventos


//Rotas Participantes


Route::get("/api/v2/participante/find/{id}", "ParticipanteController@findParticipante");

Route::post('/api/v2/participante/salvar', 'ParticipanteController@salvarParticipante');

//Rotas Login
Route::get("/login", function() {
return view ("/login");});


//Rotas Intituicao

Route::get("/api/v2/listarInstituicoes", "InstituicaoController@index");

Route::get("/api/v2/instituicoes/procurar/{id}", "InstituicaoController@procurar");