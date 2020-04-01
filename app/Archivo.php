<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    //




    public function  tramites(){
        return $this->belongsToMany(Tramite::class,'archivo_tramite','archivo_id','tramite_id');
    }
}
