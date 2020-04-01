<?php

namespace App\Http\Controllers;

use App\Mail\Correo;
use Illuminate\Http\Request;
Use App\Mensaje;
use Illuminate\Support\Facades\Mail;

class MensajeController extends Controller
{
    //
    public function store(Request $request){
         $nombre= $request->nombre;
         $correo=$request->correo;
         $telefono=$request->telefono;
         $mensaje=$request->mensaje;
         try {

            $m=  new Mensaje();
            $m->nombre=$nombre;
            $m->correo=$correo;
            $m->telefono=$telefono;
            $m->mensaje=$mensaje;
            $m->respuesta='';

            $m->save();
            return 1;
        } catch (Exception $e) {


            return 0;
        }
    }
    public function index(Request $request)
    {
        //
        $count=Mensaje::where("estado","=",0)->count();
        session(['mensajes' => $count]);
        $buscar=$request->buscar;
        if($buscar==''){
            $sliders=Mensaje::where('estado',"=",0)->orderBy('id','asc')->paginate(10);
        }else{
            $sliders=Mensaje::where('estado',"=",0)->where('nombre','like','%'.$buscar.'%')
            ->orWhere('mensaje','like','%'.$buscar.'%')
            ->orWhere('telefono','like','%'.$buscar.'%')
            ->orWhere('correo','like','%'.$buscar.'%')->orderBy('id','desc')->paginate(10);
        }
        return [
            'pagination'=> [
                'total'=> $sliders->total(),
                'current_page'=> $sliders->currentPage(),
                'per_page'=> $sliders->perPage(),
                'last_page' => $sliders->lastPage(),
                'from' => $sliders->firstItem(),
                'to'=> $sliders->lastItem(),
            ],
            'sliders'=>$sliders
        ];

    }
    public function index2(Request $request)
    {
        //
        $count=Mensaje::where("estado","=",0)->count();
        session(['mensajes' => $count]);
        $buscar=$request->buscar;
        if($buscar==''){
            $sliders=Mensaje::where('estado',"=",1)->orderBy('id','asc')->paginate(10);
        }else{
            $sliders=Mensaje::where('estado',"=",1)->where('nombre','like','%'.$buscar.'%')->orWhere('mensaje','like','%'.$buscar.'%')->orWhere('telefono','like','%'.$buscar.'%')->orWhere('correo','like','%'.$buscar.'%')->orderBy('id','desc')->paginate(10);
        }
        return [
            'pagination'=> [
                'total'=> $sliders->total(),
                'current_page'=> $sliders->currentPage(),
                'per_page'=> $sliders->perPage(),
                'last_page' => $sliders->lastPage(),
                'from' => $sliders->firstItem(),
                'to'=> $sliders->lastItem(),
            ],
            'sliders'=>$sliders
        ];

    }
    public function responder(Request $request){
            $correo=$request->correo;
            $respuesta=$request->respuesta;
            $mensaje= Mensaje::where('id',"=",$request->id)->first();

            try {
                Mail::to($correo)->send(new Correo($correo, $respuesta));
                $mensaje->estado=1;
                $mensaje['estado']=1;
                $mensaje->respuesta=$respuesta;
                $mensaje->save();
                $count=Mensaje::where("estado","=",0)->count();
                session(['mensajes' => $count]);
                return 1;
            } catch (Exception $e) {
                return 0;
            }


    }


}
