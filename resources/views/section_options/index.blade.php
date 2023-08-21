@extends('layouts.footer')
@extends('section_options.modal')
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

    <div style="height: 100%; width: 80%; margin-left: 18%;" class="flex justify-end" >
        <div style="width: 80%;" class="mt-28">
            <div class="container mx-auto flex flex-col items-center">
                @if($sectionOptions->count() == 0)

                    <h1 class="font-bold text-5xl w-4/5 text-center text-blue-700">¡Parece que no tienes ninguna sección de extras aún!</h1>

                    <p class="mt-10 text-2xl w-4/5 text-center">Agrega una sección para empezar</p>

                @else

                <table>
                    <tr class="bg-blue-700 text-white">
                        <th>Nombre</th>
                        <th>Disponible</th>
                        <th>Obligatorio</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($sectionOptions as $sectionOption)
                        <tr>
                            <td class="pl-5 pr-5 text-center">{{ $sectionOption->nombre }}</td>
                            <td class="pl-5 pr-5 text-center">
                                @if($sectionOption->disponibilidad == 1)
                                    Si
                                @else
                                    No
                                @endif
                            </td>
                            <td class="pl-5 pr-5 text-center">
                                @if($sectionOption->obligatorio)
                                    Sí
                                @else
                                    No
                                @endif
                            </td>
                            <td class="pl-5 pr-5"><a class="text-center text-blue-700">Editar</a></td>
                            <td class="pl-5 pr-5">
                                <form action="{{ route('section_options.destroy', $sectionOption->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-center text-blue-700" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>


                @endif

            </div>

        </div>
    </div>

</div>

</div>

@section('accionLeftMenu')
Agregar Sección de Extra
@endsection

@section('sectionOptionSeleccionadas')
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
