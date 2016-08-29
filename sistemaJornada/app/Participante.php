<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HAsOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Instituicao;
use App\Trabalho;
use App\Avaliador;
use App\Evento;

class Participante extends Model
{
    protected $table='tbParticipante';
    protected $fillable =[
    'id','cpf','nome','senha','externo',

    ];

    public function instituicao(){
    	return $this->belongsTo(Instituicao::class);
    }
    public function trabalhos(){
    	return $this->hasMany(Trabalho::class);
    }
     public function avaliador(){
    	return $this->hasOne(Avaliador::class);
    }
    public function eventos(){
        return $this->belongsToMany(Evento::class,'tbParticipantetbEvento','id_participante','id_evento');
    }
}
