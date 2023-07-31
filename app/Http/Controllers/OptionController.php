<?php

namespace App\Http\Controllers;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Horario;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Section;
use App\Models\SectionOption;
use Carbon\Carbon;

class OptionController extends Controller
{
    public function __construct()
    {
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

        $options = Option::all();

        return view("options.index",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios,
            'sectionOptions'=>$sectionOptions,
            'options'=>$options,
        ]);

    }

    public function store(Request $request)
    {
        $option = new Option();
        $option->section_options_id = $request->input('section_options_id');
        $option->restaurant_id = $request->input('restaurant_id');
        $option->nombre = $request->input('nombre');
        $option->precio = $request->input('precio');
        $option->disponibilidad = $request->input('disponibilidad');
        $option->save();

        return redirect()->route('options.index')->with('success', 'Option creado correctamente');
    }

    public function destroy(Option $option)
    {
        $option->delete();

        return redirect()->route('options.index')->with('success', 'Option eliminado correctamente');
    }
}
