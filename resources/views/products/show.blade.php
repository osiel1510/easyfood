@extends('layouts.footer')
@extends('modals.editarRestaurante')
@extends('modals.imagenRestaurante')
@extends('layouts.restaurantLeftMenu')
@extends('layouts.content')
@extends('layouts.header')
@extends('layouts.head')

@section('titulo')
  EasyFood - Detalles del Producto
@endsection

@section('contenido')
<div class="container mx-auto">
  <div class="py-8">
    <h1 class="text-3xl font-bold text-blue-700">{{ $product->nombre }}</h1>
    <p class="text-gray-700">{{ $product->descripcion }}</p>
    <p class="text-blue-700 font-bold">Precio: ${{ $product->precio }}</p>
    <p class="text-gray-600">
      @if($product->disponibilidad)
        Disponible
      @else
        No disponible
      @endif
    </p>
  </div>
</div>
@endsection
