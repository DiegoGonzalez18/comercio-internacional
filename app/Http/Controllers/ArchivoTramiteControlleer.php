<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\archivo_tramite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoTramiteControlleer extends Controller
{
    //
    public function registrar(Request $request){
        $ta= new archivo_tramite();
       $verificar = DB::select('select * from archivo_tramite where  archivo_id = :archivo and tramite_id = :tramite',
       ["archivo" => $request->id1, "tramite"=>$request->id2]);




        $ta->archivo_id=$request->id1;
        $ta->tramite_id=$request->id2;

$a=count($verificar);

        if($a<1){
 $ta->save();
           return 1;
        }else{
           return 0;
        }
    }
    public function index(Request $request)
    {
        $buscar=$request->buscar;

    if($buscar!=''){
        $data=DB::table('archivo_tramite')
        ->join('tramites','tramite_id','=','tramites.id')
        ->join('archivos','archivo_id','=','archivos.id')
        ->select('archivo_tramite.id','archivo_id','archivos.nombre','archivos.url','tramite_id','tramites.titulo')->where('tramites.titulo','like','%'.$buscar.'%')
        ->orWhere( 'archivos.nombre','like','%'.$buscar.'%')->paginate(5);





        }else{
            $data=DB::table('archivo_tramite')
        ->join('tramites','tramite_id','=','tramites.id')
        ->join('archivos','archivo_id','=','archivos.id')
        ->select('archivo_tramite.id','archivo_id','archivos.nombre','archivos.url','tramite_id','tramites.titulo')->paginate(5);

        }


return $data;

    }

    public function destroy(Request $request){
        $request->id;
        $slider=archivo_tramite::where('id', '=', $request->id)->first();



        $slider->delete();
        return 1;
    }
}
