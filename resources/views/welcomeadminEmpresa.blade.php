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

<div style="height: 90vh;" class="flex justify-start items-center">

    <div style="height: 100%; width: 18%;" class="bg-blue-800 fixed top-16">

    </div>

    <div style="height: 100%; width: 80%; margin-left: 18%;" class="flex justify-end" >
        <div style="width: 80%;" class="mt-28">
            <div class="container mx-auto">
                <h1 class="font-bold text-5xl w-4/5 text-center text-blue-700">¡Bienvenido al panel de tu restaurante!</h1>
                    <p class="mt-10 text-2xl w-4/5 text-center">Empieza a armar tu menú</p>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
