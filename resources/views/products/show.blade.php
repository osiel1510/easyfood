@extends('layouts.footer')
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
                <h1 class="text-blue-900 font-bold text-3xl mt-2">Detalles de {{$product->nombre}}</h1>
                <div class="flex ">
                  <div  class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl p-10 mt-10">
                    <h2 class="text-blue-900 font-bold text-xl">Editar producto</h2>
                    <form id="myForm" action="{{ route('products.store') }}" method="POST" class=" flex justify-center items-start flex-col">
                      @csrf
                      <div class="flex items-center justify-start w-full">
                        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Nombre del producto:</label>
                        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="nombre" placeholder="Nombre">
                      </div>
                      <div class="flex items-center justify-start w-full">
                        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Disponibilidad:</label>
                        <input type="checkbox" name="disponibilidad" class="switch-input" value="1" {{ old('disponibilidad') ? 'checked="checked"' : '' }}/>
                      </div>
                      <input type="hidden" name="image2" value="">

                      <div class="flex items-center justify-start w-full">
                        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Descripción:</label>
                        <textarea class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" name="descripcion" placeholder="Descripción"></textarea>
                      </div>
                      <div class="flex items-center justify-start w-full">
                        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Precio:</label>
                        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="precio" placeholder="Precio" step="0.01">
                      </div>
                      <div class="flex items-center justify-start w-full">
                        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Sección:</label>
                        <select class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" name="sections_id">
                          <option value="">Seleccione una sección</option>
                          @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
                        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="hidden" name="restaurant_id" value="{{$restaurant->id}}">

                    </form>

                    <form action ="{{route('imagenes.store')}}"   method="POST" class="dropzone mt-5 flex justify-center items-start flex-col" enctype="multipart/form-data" id="dropzone2" >
                      @csrf
                      </form>
                      <div class="w-full flex justify-center items-center flex-row">
                          <input id="submitButton" type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Agregar">
                        </div>
                  </div>

                  <div class="ml-5 mt-10 flex flex-col">
                    <h2 class="text-blue-900 font-bold text-xl">Agregar secciones al producto</h2>
                    <form method="POST" action="{{ route('product.add-section-option', $product->id) }}">
                        @csrf
                        <select class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" name="section_option_id">
                            @foreach($sectionOptions as $sectionOption)
                                <option value="{{ $sectionOption->id }}">{{ $sectionOption->nombre }}</option>
                            @endforeach
                        </select>
                        <input id="submitButton" type="submit" class="ml-2 cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Agregar">
                    </form>


                    <table>
                        <tr class="bg-blue-700 text-white">
                          <th>Seccion</th>
                          <th>Eliminar</th>
                        </tr>

                        @foreach($sectionOptionsProducto as $sectionOption)

                            <tr>
                                <td class="pl-5 pr-5 text-center">{{$sectionOption->nombre}}</td>

                                </td>

                                <td class="pl-5 pr-5">

                                    <form method="POST" action="{{ route('product.remove-section-option', [$product, $sectionOption]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-center text-blue-700">Eliminar</button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                      </table>

                  </div>




                </div>
            </div>
        </div>
    </div>

</div>

</div>


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
