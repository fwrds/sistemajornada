<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\CoordenadorDePesquisa;
use App\Participante;
use App\TipoTrabalho;
use App\Gt;

class Evento extends Model
{
    protected $table ='tbEvento';
    protected $fillable = [
        'id','nome', 'data','concluido',
    ];
    
   public function  coordenadorDePesquisa(){
    	return $this->belongsTo(CoordenadorDePesquisa::class);
    }
     public function participantes(){
        return $this->belongsToMany(Participante::class,'tbParticipantetbEvento','id_evento','id_participante');
    }
     public function tiposTrabalhos(){
        return $this->belongsToMany(TipoTrabalho::class,'tbEventotbTipoTrabalho','id_evento','id_tipoTrabalho');
    }
     public function gts(){
        return $this->belongsToMany(Gt::class,'tbEventotbGt','id_evento','id_gt');
    }

}
 