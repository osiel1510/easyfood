
@extends('layouts.footer')
@extends('modals.section')
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
                @if($secciones->count() == 0)

                    <h1 class="font-bold text-5xl w-4/5 text-center text-blue-700">¡Parece que no tienes ninguna seccion aun!</h1>

                    <p class="mt-10 text-2xl w-4/5 text-center">Agrega una seccion para empezar</p>

                @else

                    <table>
                        <tr class="bg-blue-700 text-white">
                            <th>Nombre</th>
                            <th>Disponible</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($secciones as $seccion)
                            <tr>
                                <td class="pl-5 pr-5 text-center" data-id="{{$seccion->id}}">{{$seccion->nombre}}</td>
                                <td class="pl-5 pr-5 text-center">
                                    @if($seccion->disponibilidad == 1)
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                                <td class="pl-5 pr-5"><a class="text-center text-blue-700" href="">Editar</a></td>
                                <td class="pl-5 pr-5">
                                    <form action="{{ route('secciones.destroy', $seccion->id) }}" method="POST">
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todas las celdas con el atributo data-id
    const celdasNombre = document.querySelectorAll('td[data-id]');

    // Itera sobre las celdas y establece el id según el atributo data-id
    celdasNombre.forEach(celda => {
        const seccionId = celda.getAttribute('data-id');
        celda.id = 'nombre' + seccionId;
    });
});

</script>

</div>

@section('accionLeftMenu')
Agregar sección
@endsection

@section('seccionesSeleccionadas')
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
