<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SeccionController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $user = User::where('id',$userId)->first();
        $restaurant = Restaurant::where('user_id',$userId)->first();

        $dayOfWeek = Carbon::now()->dayOfWeek; // Día de la semana actual

        $horarios = Horario::where('restaurant_id', $restaurant->id)
            ->where('day_of_week', $dayOfWeek)
            ->get();

        $secciones = Section::where('restaurant_id',$restaurant->id)->get();
        return view("sections",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios,
            'secciones'=>$secciones,
        ]);
    }

    public function store(Request $request){

        // Crear el registro en la base de datos
        $post = new Section;
        $post->nombre = $request->nombre;
        $post->disponibilidad = $request->has('disponibilidad');
        $post->restaurant_id = $request->restaurant_id;
        $post->save();

        // Redireccionar o realizar alguna acción adicional si es necesario
        return redirect()->route('post.index');

    }

    public function destroy(Section $seccion)
    {
        $seccion->delete();
        return redirect()->route('secciones.index')->with('success', 'Sección eliminada correctamente');
    }
}
