<?php

namespace App\Http\Controllers;

use App\archivo_proyecto;
use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    //


    public function p(){
        $p= Proyecto::get()->toArray();
        return $p;
    }

    public function registrar(Request $request){
        $proyecto= new Proyecto();


        $proyecto->titulo=$request->titulo;
        $proyecto->contenido=$request->contenido;
        $proyecto->semillero_id=$request->id;
        $proyecto->save();
        return 1;

    }
    public function actualizar(Request $request){
        $semillero= Proyecto::where('id','=',$request->id)->first();
        if($request->titulo!=''&&$request->contenido!=''){
            $semillero->titulo=$request->titulo;
            $semillero->contenido=$request->contenido;
            $semillero->semillero_id=$request->semillero_id;
            $semillero->save();
            return 1;
        }else{
            return 0;
        }

    }
    public function pro(Request $request){
        $p= Proyecto::where('id','=',$request->id)->first();
        return $p;
    }
    public function destroy(Request $request){
        echo "pi ->" .$request->id;
        $semillero= Proyecto::where('id','=',$request->id)->first();
        if($semillero!=null){
            $semillero->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function registrar2(Request $request){
        $ta= new archivo_proyecto();
       $verificar = DB::select('select * from archivo_proyecto where  archivo_id = :archivo and proyecto_id = :proyecto',
       ["archivo" => $request->id1, "proyecto"=>$request->id2]);




        $ta->archivo_id=$request->id1;
        $ta->proyecto_id=$request->id2;

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
        $data=DB::table('archivo_proyecto')
        ->join('proyectos','proyecto_id','=','proyectos.id')
        ->join('archivos','archivo_id','=','archivos.id')
        ->select('archivo_proyecto.id','archivo_id','archivos.nombre','archivos.url','proyecto_id','proyecto.titulo')->
        where('proyectos.titulo','like','%'.$buscar.'%')
        ->orWhere( 'archivos.nombre','like','%'.$buscar.'%')->paginate(5);





        }else{
            $data=DB::table('archivo_proyecto')
            ->join('proyectos','proyecto_id','=','proyectos.id')
            ->join('archivos','archivo_id','=','archivos.id')
            ->select('archivo_proyecto.id','archivo_id','archivos.nombre','archivos.url','proyecto_id','proyectos.titulo')->
            paginate(5);
        }


return $data;

    }
    public function destroy2(Request $request){
        $request->id;
        $slider=archivo_proyecto::where('id', '=', $request->id)->first();



        $slider->delete();
        return 1;
    }
}
