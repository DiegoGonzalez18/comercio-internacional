<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $table = 'proyectos';
    public function  Archivos(){
        return $this->belongsToMany(Archivo::class,'archivo_proyecto','proyecto_id','archivo_id');
    }
}
