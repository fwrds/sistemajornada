<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evento;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gt extends Model
{
	protected $table='tbGt';
   protected $fillable['id','nome'];

    public function eventos(){
        return $this->belongsToMany(Evento::class,'tbEventotbGt','id_particiante','id_evento');
    }
}
