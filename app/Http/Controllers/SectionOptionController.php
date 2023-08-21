<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Horario;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Section;
use Carbon\Carbon;
use App\Models\SectionOption;

class SectionOptionController extends Controller
{

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

    public function index()
    {
        $userId = Auth::id();
        $user = User::where('id',$userId)->first();
        $restaurant = Restaurant::where('user_id',$userId)->first();

        $dayOfWeek = Carbon::now()->dayOfWeek; // Día de la semana actual

        $horarios = Horario::where('restaurant_id', $restaurant->id)
            ->where('day_of_week', $dayOfWeek)
            ->get();

        $sectionOptions = SectionOption::all();

        return view("section_options.index",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios,
            'sectionOptions'=>$sectionOptions,
        ]);
    }

    public function store(Request $request)
    {
        $sectionOption = new SectionOption();
        $sectionOption->restaurant_id = $request->input('restaurant_id');
        $sectionOption->nombre = $request->input('nombre');
        $sectionOption->disponibilidad = $request->input('disponibilidad');
        $sectionOption->obligatorio = $request->input('obligatorio'); // Agrega esta línea para el campo "obligatorio"
        $sectionOption->save();

        return redirect()->route('section_options.index')->with('success', 'Section Option creado correctamente');
    }


    public function destroy(SectionOption $sectionOption)
    {
        $sectionOption->delete();

        return redirect()->route('section_options.index')->with('success', 'Section Option eliminado correctamente');
    }
}
