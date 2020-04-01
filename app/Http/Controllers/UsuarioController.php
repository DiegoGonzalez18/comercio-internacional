<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        //

        $buscar=$request->buscar;
        if($buscar==''){
            $personas=Persona::orderBy('id','desc')->paginate(3);
        }else{
            $personas=Persona::where('name','like','%'.$buscar.'%')->orderBy('id','desc')->paginate(3);;
        }
        return [
            'pagination'=> [
                'total'=> $personas->total(),
                'current_page'=> $personas->currentPage(),
                'per_page'=> $personas->perPage(),
                'last_page' => $personas->lastPage(),
                'from' => $personas->firstItem(),
                'to'=> $personas->lastItem(),
            ],
            'sliders'=>$personas
        ];

    }
    public function store(Request $request)
    {

 //Sacamos la información



            $persona = new Persona();
            $persona->nombre=$request->nombre;
            $persona->email=$request->email;
            $persona->telefono=$request->telefono;
            $persona->cargo=$request->cargo;


          if($persona->save()){
              return 1;
          }else {
              return 0;
          }


        }
        public function update(Request $request)
        {



            $persona=Persona::where('id', '=', $request->id)->first();

            $persona->nombre=$request->nombre;
            $persona->email=$request->email;
            $persona->telefono=$request->telefono;
            $persona->cargo=$request->cargo;






          if($persona->save()){
            return 1;
        }else {
            return 0;
        }

        }

}
