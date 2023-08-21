<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Restaurant;

class RegisterController extends Controller
{
    public function index(){
        return view('signup');
    }

    public function store(Request $request){
        // Dump and die imprime lo que se tiene del proyecto y lo depura
        // dd($request->get('name'));

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users|email|',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        $restaurant = new Restaurant;
        $restaurant->nombre = 'restaurante ' . $request->email;
        $restaurant->user_id = $user->id;
        $restaurant->imagen = 'logoMain.png';
        $restaurant->save();

        $user->restaurant_id = $restaurant->id;
        $user->save();

        return redirect()->route('post.index');

    }
}
