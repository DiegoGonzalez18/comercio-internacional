<?php

namespace App\Http\Controllers;

use App\Semillero;
use Illuminate\Http\Request;

class SemilleroController extends Controller
{
    //

public function registrar(Request $request){
    $semillero= new Semillero();

    if($request->titulo!=''&&$request->contenido!=''){
        $semillero->titulo=$request->titulo;
        $semillero->contenido=$request->contenido;
        $semillero->save();
        return 1;
    }else{
        return 0;
    }
}
public function semilleros(){
    $s= Semillero::get()->toArray();
    return $s;
}
public function actualizar(Request $request){
    $semillero= Semillero::where('id','=',$request->id)->first();
    if($request->titulo!=''&&$request->contenido!=''){
        $semillero->titulo=$request->titulo;
        $semillero->contenido=$request->contenido;
        $semillero->save();
        return 1;
    }else{
        return 0;
    }

}
public function datos(Request $request){
    $semillero= Semillero::where('id','=',$request->id)->first();
    return $semillero;

}
public function destroy(Request $request){
    $semillero= Semillero::where('id','=',$request->id)->first();
    if($semillero!=null){
        $semillero->delete();
        return 1;
    }else{
        return 0;
    }
}
}
