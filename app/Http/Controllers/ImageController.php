<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request){

        $imagen = $request->file('file');
        //return response()->json(['imagen'=>$imagen->extension()]);

        //Generar un id unico para cada una de las imagenes que se cargan al server
        $nombreImagen = Str::uuid().'.'. $imagen->extension();

        //Implementar intervention image
        $imagenServidor = Image::make($imagen);

        //Agregamos efectos de intervention image: indicamos la medida de cada imagen
        $imagenServidor->fit(1000,1000);

        //Movemos la imagen a un lugar fisico del server
        $imagenPath = public_path('uploads').'/'.$nombreImagen;

        $imagenServidor->save($imagenPath);

        //Verificar que el nombre se ponga como unico
        return response()->json(['image'=>$nombreImagen]);
    }
}
