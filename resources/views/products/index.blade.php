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

                @foreach($restaurant->sections as $section)
                <p class="text-start font-bold text-xl text-blue-900">{{ $section->nombre }}</p>
                <div style="width: 58vw; height: 0.5vh;" class="mt-1 bg-blue-800"></div>
                <div style="width: 100%;" class="flex mt-3 flex-wrap">
                @foreach($section->products as $product)
                    <div id="product-{{ $product->id }}" onclick="redirectToProduct('{{ route('products.show', ['id' => $product->id]) }}')" style="max-width: 30%; width: 50%; height: 15vh" class="cursor-pointer product-item hover:bg-gray-200 flex items-center">
                        <img style="width: 30%;" class="ml-1 rounded-xl" src="{{ asset('uploads/' . $product->imagen) }}">
                        <div style="max-height: 50%; max-width: 50%;" class="ml-2 flex flex-col items-start justify-start">
                            <h3 class="text-blue-950 text-lg font-bold">{{ $product->nombre }}</h3>
                            <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-xs">{{ $product->descripcion }}</p>
                            <p class="text-blue-950 font-bold text-xl">${{ $product->precio }}</p>
                        </div>

                        <div id="product-details-{{ $product->id }}" class="flex-col items-center justify-center product-details hidden">
                            <div id="product-details-{{ $product->id }}" class="product-details hidden"></div>
                            <img style="width: 50%;" class="mt-5 ml-1 rounded-xl" src="{{ asset('uploads/' . $product->imagen) }}">
                            <h3 class="text-blue-950 text-lg font-bold">{{ $product->nombre }}</h3>
                            <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-normal">{{ $product->descripcion }}</p>

                            <p class="text-blue-950 font-bold text-xl product-price">${{ $product->precio }}</p>

                            <input id="quantity-input" class="mt-2 mb-2 " type="number" min="1" value="1">

                            <button id="add-to-cart-btn" href=""  style="width: 80%" class="add-to-cart hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
                                <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
                                <p id="cart-amount" class="ml-2 text-lg ">Añadir al carrito</p>
                            </button>
                        </div>
                    </div>
                @endforeach

                @foreach($section->products as $product)

            @endforeach

                </div>
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

<script>
    function redirectToProduct(url) {
        window.location.href = url;
    }
</script>


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
