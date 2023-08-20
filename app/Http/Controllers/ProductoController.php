<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Horario;
use App\Models\Restaurant;
use App\Models\SectionOption;
use App\Models\User;
use App\Models\Section;
use Carbon\Carbon;

class ProductoController extends Controller
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

        $productos = Product::where('restaurant_id',$restaurant->id)->get();

        $sections = Section::where('restaurant_id',$restaurant->id)->get();

        return view("products.index",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios,
            'products'=>$productos,
            'sections'=>$sections,
        ]);

    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->nombre = $request->input('nombre');
        $product->disponibilidad = $request->input('disponibilidad');
        $product->imagen = $request->input('image2');
        $product->descripcion = $request->input('descripcion');
        $product->precio = $request->input('precio');
        $product->sections_id = $request->input('sections_id');
        $product->restaurant_id = $request->input('restaurant_id');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    public function show($id)
    {
        $userId = Auth::id();
        $user = User::where('id',$userId)->first();
        $restaurant = Restaurant::where('user_id',$userId)->first();

        $dayOfWeek = Carbon::now()->dayOfWeek; // Día de la semana actual

        $horarios = Horario::where('restaurant_id', $restaurant->id)
            ->where('day_of_week', $dayOfWeek)
            ->get();

        $producto = Product::where('id',$id)->first();

        $sections = Section::where('restaurant_id',$restaurant->id)->get();

        $sectionOptions = SectionOption::whereDoesntHave('products', function ($query) use ($producto) {
            $query->where('product_id', $producto->id);
        })->get();

        $sectionOptionsProducto = SectionOption::whereHas('products', function ($query) use ($producto) {
            $query->where('product_id', $producto->id);
        })->get();


        return view("products.show",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios,
            'product'=>$producto,
            'sections'=>$sections,
            'sectionOptions'=>$sectionOptions,
            'sectionOptionsProducto'=>$sectionOptionsProducto,
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }

    public function addSectionOptionToProduct(Request $request, Product $product)
    {
        $product->sectionOptions()->attach($request->input('section_option_id'));

        return redirect()->route('products.show', $product->id)->with('success', 'Sección agregada al producto con éxito.');
    }

    public function removeSectionOption(Product $product, SectionOption $sectionOption)
    {
        // Elimina la relación entre el producto y la sección
        $product->sectionOptions()->detach($sectionOption);

        return redirect()->route('products.show', $product->id)->with('success', 'Sección eliminada del producto con éxito.');
    }
}


