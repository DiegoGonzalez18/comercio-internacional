<?php

namespace App\Http\Controllers;

use App\Contenido;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    //
    public function contenidos(){
      $hola= Contenido::get();
      return $hola->toArray();
    }
    public function contenido(Request $request){
        $contenido=Contenido::where('id','=',$request->id)->first();
        return $contenido;
    }
    public function boletin(){
        $contenido=Contenido::where('id','=',8)->first();
    return view('pagina.contenido.boletin',compact('contenido'));

    }
    public function actualizar(Request $request){
        $contenido=Contenido::where('id','=',$request->id)->first();
        $contenido['titulo']=$request->titulo;
        $contenido['contenido']= $request->contenido;
        $contenido->save();
        return 1;
    }
}
