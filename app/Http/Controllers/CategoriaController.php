<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
class CategoriaController extends Controller
{
    //
    public function store(Request $request)
    {



            $slider = new Categoria();
            $slider->nombre=$request->titulo;
            $slider->description=$request->descripcion;


          if($slider->save()){
              return 1;
        }
        }
        public function index(Request $request)
        {
            //

            $buscar=$request->buscar;
            if($buscar==''){
                $sliders=Categoria::orderBy('id','desc')->paginate(3);
            }else{
                $sliders=Categoria::where('nombre','like','%'.$buscar.'%')->orderBy('id','desc')->paginate(3);
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

        public function update(Request $request)
        {

            $slider=Categoria::where('id', '=', $request->id)->first();

            $slider->nombre=$request->titulo;

            $slider->description=$request->descripcion;;



          if($slider->save()){
            return 1;
        }else {
            return 0;
        }

        }
        public function destroy(Request $request)
    {
        $slider=Categoria::where('id', '=', $request->id)->first();
 if($slider!=null){

    if($slider->delete()){

        return 1;
    }else{
        return 0;
    }



 }else{
     return 0;
 }

}
}
