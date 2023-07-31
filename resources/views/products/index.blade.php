@extends('layouts.footer')
@extends('products.modal')
@extends('modals.editarRestaurante')
@extends('modals.imagenRestaurante')
@extends('layouts.restaurantLeftMenu')
@extends('layouts.content')
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

    <div style="height: 100%; width: 80%; margin-left: 18%;" class="flex justify-end">
        <div style="width: 80%;" class="mt-28">
            <div class="container mx-auto flex flex-col items-center">
                @if($products->count() == 0)

                    <h1 class="font-bold text-5xl w-4/5 text-center text-blue-700">¡Parece que no tienes ningún producto aún!</h1>

                    <p class="mt-10 text-2xl w-4/5 text-center">Agrega un producto para empezar</p>

                @else

                <div class="grid grid-cols-3 gap-4">
                    @foreach($products as $product)
                      <a href="{{ route('products.show', $product->id) }}" class="text-black">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                          <div class="flex justify-center">
                            <img src="{{ asset('uploads/' . $product->imagen) }}" alt="Imagen del producto" class="w-32 h-32">
                          </div>
                          <h2 class="text-xl font-bold mt-4">{{ $product->nombre }}</h2>
                          <p class="text-gray-700 mt-2">{{ $product->descripcion }}</p>
                          <p class="text-blue-700 font-bold mt-2">Precio: ${{ $product->precio }}</p>
                          <p class="text-gray-600 mt-2">
                            @if($product->disponibilidad)
                              Disponible
                            @else
                              No disponible
                            @endif
                          </p>
                        </div>
                      </a>
                    @endforeach
                  </div>



                @endif

            </div>

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
