<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Tramite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TramiteController extends Controller
{ 
    //
    public function categorias(){
  $categoria=Categoria::get();
  return $categoria->toArray();

    }
    public function tramites(){
        $tramite= Tramite::get();
        return $tramite->toArray();
    }
    public function registrar(Request $request){
        $tramite = new Tramite();
        $tramite->categoria_id= $request->categoria;
        $tramite->titulo=$request->titulo;
        $tramite->description= $request->contenido;
        if($tramite->save()){
            return 1;
        }else{
            return 0;
        }
    }
    public function index(Request $request)
    {
        //

        $buscar=$request->buscar;
        if($buscar!=''){
            $data= DB::table('tramites')
            ->join('categorias','categoria_id','=','categorias.id')
            ->select('tramites.id','tramites.categoria_id','tramites.titulo',
            'categorias.nombre','tramites.description')->where('titulo','like','%'.$buscar.'%')->orderBy('tramites.id','desc')->paginate(3);
        }else{
            $data= DB::table('tramites')
            ->join('categorias','categoria_id','=','categorias.id')
            ->select('tramites.id','tramites.categoria_id','tramites.titulo',
            'categorias.nombre','tramites.description')->paginate(3);
        }


return $data;
    }
    public function updated(Request $request){
        $tramite= Tramite::where('id','=',$request->id)->first();
        $tramite->titulo=$request->titulo;
        $tramite->categoria_id=$request->categoria;
        $tramite->description=$request->contenido;
        if($tramite->save()){
            return 1;
        }else{
            return 0;
        }

    }
    public function destroy(Request $request){
        $tramite= Tramite::where('id','=',$request->id)->first();
        if($tramite->delete()){
                return 1;
        }else{
            return 0;
        }
    }
}
