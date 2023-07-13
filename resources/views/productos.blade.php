
@extends('layouts.footer')
@extends('modals.product')
@extends('layouts.content')
@extends('layouts.restaurantLeftMenu')
@extends('layouts.header')
@extends('layouts.head')

@section('titulo')
EasyFood
@endsection

@section('contenido')

@auth

<div style="height: 90vh;" class="flex justify-start items-center">

    <div style="height: 100%; width: 18%;" class="bg-blue-800 fixed top-16">

    </div>

    <div style="height: 100%; width: 80%;" class="flex justify-end" >
        <div style="width: 85%;" class="mt-5">
            <div class="container mx-auto">
            </div>
        </div>
    </div>

</div>


@section('accionLeftMenu')
Agregar producto
@endsection

@section('productosSeleccionados')
border-blue-900 bg-gray-200 border-r-8
@endsection

@endauth

@guest

<div style="height: 90vh;" class="flex justify-center items-center flex-col">

<h1 class="font-bold text-5xl w-4/5 text-center text-blue-700">Agiliza tus pedidos en WhatsApp y crece tu negocio</h1>

<p class="mt-10 text-2xl w-4/5 text-center"> <b class="text-blue-700">EasyFood</b> es el menú digital que te ayuda a atender a tus comensales 80% más rápido para crecer tu <b class="text-blue-700">restaurante</b>.</p>

<div class="mt-10 flex justify-center align-center">
    <a class="text-white bg-blue-700 p-3 rounded hover:bg-blue-800" href="./planes">Ver planes</a>
    <a class="text-white bg-blue-700 p-3 rounded hover:bg-blue-800 ml-10" href="">Más información</a>
</div>

@endguest

</div>
@endsection
