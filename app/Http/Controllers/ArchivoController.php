<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    //
    public function archivos(){
        $tramite= Archivo::get();
        return $tramite->toArray();
    }
    public function store(Request $request)
    {
       $exploded= explode(',',$request->algo);
       $decoded=base64_decode($exploded[1]);
       $imagen = getimagesize($request->algo);



 //Sacamos la información
 $imagen = getimagesize($request->algo);


       $extension="";

            if(Str::contains($exploded[0],'docx')){
$extension="docx";
            }else
            if(Str::contains($exploded[0],'doc')){
                $extension="doc";
                            }

            else{
                $extension="pdf";
            }
           $fileName= Str::random().'.'.$extension;

           $path=public_path()."/pdf/".$fileName;
           file_put_contents($path,$decoded);

            $slider = new Archivo();
            $slider->nombre=$request->titulo;
            $slider->url='pdf/'.$fileName;

          if($slider->save()){
              return 1;
          }


        }


        public function index(Request $request)
    {
        //

        $buscar=$request->buscar;
        if($buscar==''){
            $sliders=Archivo::orderBy('id','desc')->paginate(3);
        }else{
            $sliders=Archivo::where('nombre','like','%'.$buscar.'%')->orderBy('id','desc')->paginate(3);
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

        $slider=Archivo::where('id', '=', $request->id)->first();

        $slider->nombre=$request->titulo;



      if($request->algo!=''){
          //elimino imagen antigua
          $mi_imagen = public_path().'/'.$slider->url;
if (@getimagesize($mi_imagen)) {
    unlink($mi_imagen);
}
else
{
return 0;
}
        $exploded= explode(',',$request->algo);
        $decoded=base64_decode($exploded[1]);
        $extension="";
        if(Str::contains($exploded[0],'docx')){
            $extension="docx";
                        }else
                        if(Str::contains($exploded[0],'doc')){
                            $extension="doc";
                                        }

                        else{
                            $extension="pdf";
                        }
            $fileName= Str::random().'.'.$extension;

            $path=public_path()."/pdf/".$fileName;
            file_put_contents($path,$decoded);
            $slider->url='pdf/'.$fileName;
      }
      if($slider->save()){
        return 1;
    }else {
        return 0;
    }

    }

    public function destroy(Request $request)
    {
        $slider=Archivo::where('id', '=', $request->id)->first();
 if($slider!=null){
    $mi_imagen = public_path().'/'.$slider->url;
    unlink($mi_imagen);
    $slider->delete();
    return 1;
 }else{
     return 0;
 }
        }

    }
