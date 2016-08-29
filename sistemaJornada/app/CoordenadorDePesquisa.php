<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Evento;

class CoordenadorDePesquisa extends Model
{
    protected $table='tbCoordenadorDePesquisa';
	 protected $fillable = [
        'id','login', 'senha',
    ];
    protected $hidden = [
        'senha', 'remember_token',
    ];

   public function eventos() {
    	return $this->hasMany(Evento::class);
    }
    //
}
