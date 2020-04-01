<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //

        $buscar=$request->buscar;
        if($buscar==''){
            $personas=User::where('email','!=',session('correo'))->orderBy('id','desc')->paginate(3);
        }else{
            $personas=User::where('email','!=',session('correo'))->where('nombre','like','%'.$buscar.'%')->orderBy('id','desc')->paginate(3);
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
            'users'=>$personas
        ];

    }
    public function store(Request $request)
    {

 //Sacamos la información



            $persona = new User();
            $persona->nombre=$request->nombre;
            $persona->email=$request->email;
            $persona->password=bcrypt($request->password);

        if($persona->save()){
              return 1;
          }else {
              return 0;
          }


        }
        public function update(Request $request)
        {



            $persona=User::where('id', '=', $request->id)->first();

            $persona->nombre=$request->nombre;
            $persona->email=$request->email;
            if($request->password!=''){
            $persona->password=bcrypt($request->password);
        }






          if($persona->save()){
            return 1;
        }else {
            return 0;
        }

        }

        public function destroy(Request $request)
    {
        $slider=User::where('id', '=', $request->id)->first();



    $slider->delete();
    return 1;

// Lo eliminamos de la base de datos



    }

}
