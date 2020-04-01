<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    public function tramites(){
        return $this->hasMany('app\Tramite');
    }
}
