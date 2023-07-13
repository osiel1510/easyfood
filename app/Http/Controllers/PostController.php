<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PostController extends Controller
{
    //Constructor para la proteccion de la url dashboard

    //El constructor es lo que se ejecuta cuando instanciamos un controlador

    public function __construct(){
        // Protegemos la URL
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                // Si el usuario no está autenticado, redireccionar a otra vista
                return redirect()->route('index');
            }
            return $next($request);
        });
    }

    public function index(){
        
        $userId = Auth::id();
        $user = User::where('id',$userId)->first();
        $restaurant = Restaurant::where('user_id',$userId)->first();

        $dayOfWeek = Carbon::now()->dayOfWeek; // Día de la semana actual

        $horarios = Horario::where('restaurant_id', $restaurant->id)
            ->where('day_of_week', $dayOfWeek)
            ->get();

        return view("welcomeadminEmpresa",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios,
        ]);
    }

    public function update(Request $request)
    {
        $restaurant = Restaurant::findOrFail($request->restaurant_id);
        
        if($request->input('image') != null){
            $restaurant->imagen = $request->input('image');
        }else{            
            // Actualizar los campos del restaurante según los valores recibidos en la solicitud
            $restaurant->nombre = $request->input('nombre');
            $restaurant->ubicacion = $request->input('ubicacion');
            $restaurant->telefono = $request->input('telefono');
            $restaurant->facebook = $request->input('facebook');
            $restaurant->instagram = $request->input('instagram');
            $restaurant->costoEnvio = $request->input('costoEnvio');
        }

        // Guardar los cambios en la base de datos
        $restaurant->save();

        // Redirigir a la página deseada después de la actualización
        return redirect()->route('post.index');
    }

}
