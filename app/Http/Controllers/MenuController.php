<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MenuController extends Controller
{
    public function showMenu($restaurant)
    {
        $userId = Auth::id();
        $user = User::where('id',$userId)->first();

        $restaurant = Restaurant::where('id',$restaurant)->first();

        $dayOfWeek = Carbon::now()->dayOfWeek; // Día de la semana actual

        $horarios = Horario::where('restaurant_id', $restaurant->id)
            ->where('day_of_week', $dayOfWeek)
            ->get();

        return view("menu.show",[
            'user'=>$user,
            'restaurant'=>$restaurant,
            'horarios'=>$horarios
        ]);
    }

    public function store(Request $request)
    {
        $restaurante = Restaurant::where('id', $request->input('restaurante'))->first();


        $mensaje = 'Hola que tal ' . $restaurante->nombre . ', soy ' . $request->input('nombre') . ', mi pedido es el siguiente:';

        $cartData = json_decode(request()->input('cart'), true);

        $total = 0;

        // Recorre la matriz de $newProducts
        foreach ($cartData as $product) {
            $totalProducto = 0;
            $mensaje = $mensaje . ' -' . $product['quantity'] . ' x ' . $product['name'] . '($' . ($product['price']*$product['quantity']) . ')';

            $totalProducto+=($product['price']*$product['quantity']);

            foreach ($product['selectedOptions'] as $selectedOption) {
                if($selectedOption['price'] != 0){
                    $mensaje = $mensaje . '  -' . $selectedOption['quantity'] . ' x ' . $selectedOption['option'] . '($' . ($selectedOption['price']*$selectedOption['quantity']*$product['quantity']) . ')';
                    $totalProducto+=($selectedOption['price']*$selectedOption['quantity']*$product['quantity']);
                }else{
                    $mensaje = $mensaje . '  -' . $selectedOption['quantity'] . ' x ' . $selectedOption['option'] ;
                }
            }
            $mensaje = $mensaje . '-*Total por producto*: $' . $totalProducto;
            $total+=$totalProducto;
        }

        $mensaje = $mensaje . ' *Total del pedido*: $' . $total;

        $mensaje = $mensaje . ' *Mi tipo de entrega es*: ' . $request->input('tipoEntrega') ;

        if($request->input('tipoEntrega') == 'Envío a Domicilio'){
            $mensaje = $mensaje . ' En la colonia: ' . $request->input('colonia') ;
            $mensaje = $mensaje . ' En la calle: ' . $request->input('calle') ;
            $mensaje = $mensaje . ' Con número exterior: ' . $request->input('numeroExterior') ;
            $mensaje = $mensaje . ' Con número interior: ' . $request->input('numeroInterior') ;
        }


        $mensaje = $mensaje . ' *Mi método de pago va a ser:* ' . $request->input('metodoPago') ;

        if($request->input('metodoPago') == 'Efectivo'){
            $mensaje = $mensaje . '*Voy a pagar con: $*' . $request->input('efectivo') ;
        }

        $mensaje = $mensaje . ' Muchas gracias!, mi número es' . $request->input('telefono') ;


        // Número de teléfono y mensaje predefinido
        $phoneNumber = $restaurante->telefono;

        // Codificar el mensaje y el número para usar en el enlace
        $encodedPhoneNumber = urlencode($phoneNumber);
        $encodedMessage = urlencode($mensaje);

        // Construir el enlace de WhatsApp
        $whatsappLink = "https://api.whatsapp.com/send?phone={$encodedPhoneNumber}&text={$encodedMessage}";

        // Redirigir al usuario a WhatsApp
        return redirect($whatsappLink);


    }
}

