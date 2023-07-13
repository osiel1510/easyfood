@extends('layouts.footer')
@extends('layouts.content')
@extends('layouts.header')
@extends('layouts.head')

@section('titulo')
Login
@endsection

@section('contenido')

<div style="height: 90vh;" class="flex justify-center items-center flex-col">

<div style="height: 60vh; width: 30vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
    <h3 class="text-blue-700 font-medium text-3xl">Bienvenido</h3>
    <h3 class="mt-1 text-blue-900 font-bold text-xl">Inicia Sesión</h3>
    <form action="{{route('login')}}" method="POST" class="mt-8 flex justify-center items-start flex-col">
        @csrf
        <label class="text-blue-900 font-medium" >Correo electrónico:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none"  type="email" name="email" placeholder="Correo electrónico">

        <label class="mt-5 text-blue-900 font-medium" >Contraseña:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none"  type="password" name="password" placeholder="Contraseña">

        <a href="" class="self-center mt-4 underline text-blue-900 font-medium">¿Olvidaste la contraseña?</a>
        <input type="submit" class="self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Entrar">
    </form>

    @if (session('mensaje'))
        <p class="font-bold text-red-500">{{session('mensaje')}}</p>
    @endif

</div>

</div>
@endsection
