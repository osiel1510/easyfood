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
}

