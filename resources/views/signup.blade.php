@extends('layouts.footer')
@extends('layouts.content')
@extends('layouts.header')
@extends('layouts.head')

@section('titulo')
Login
@endsection

@section('contenido')

<div style="height: 90vh;" class="flex justify-center items-center flex-col">

<div style="height: fit-content; width: 40vw;" class="pt-4 pb-4 bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
    <h3 class="text-blue-700 font-medium text-3xl">¡Empieza ahora tu menú!</h3>
    <h3 class="mt-1 text-blue-900 font-bold text-xl">Regístro</h3>
    <form action="{{route('registrar-cuenta')}}" method="POST" class="mt-8 flex justify-center items-start flex-col">
        @csrf
        <label class="text-blue-900 font-medium" >Usuario:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none"  type="text" name="name" placeholder="Usuario">

        <label class="mt-5 text-blue-900 font-medium" >Email:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none"  type="email" name="email" placeholder="Correo Electrónico">

        <label class="mt-5 text-blue-900 font-medium" >Contraseña:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none"  type="password" name="password" placeholder="Contraseña">


        <label class="mt-5 text-blue-900 font-medium" >Repetir contraseña:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none"  type="password" name="password_confirmation" placeholder="Repetir contraseña">

        <input type="submit" value="¡Regístrame!" class="self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" >

    </form>

    @if ($errors->any())
    <p class="font-bold text-red-500">{{ $errors->first() }}</p>



@endif

</div>

</div>
@endsection
