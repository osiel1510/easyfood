<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //Prueba de funcionamiento
    public function store(){
        auth()->logout();

        return redirect('login');
    }
}
