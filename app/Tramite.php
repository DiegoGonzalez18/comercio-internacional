<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    //
    public function  Archivos(){
        return $this->belongsToMany(Archivo::class,'archivo_tramite','tramite_id','archivo_id');
    }

    public function categoria(){
            return $this->belongsTo('App\Categoria');
    }
}
