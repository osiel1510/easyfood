@extends('layouts.footer')
@extends('layouts.content')
@extends('layouts.headerUser')
@extends('layouts.head')

@section('titulo')
Demo
@endsection

@section('contenido')

<div style="height: 90vh;" class="flex justify-start items-center">

    <div style="height: 100%; width: 18%;" class="bg-blue-800">

    </div>

    <div style="height: 100%; width: 80%;" class="flex justify-end" >
        <div style="width: 73%;" class="mt-5">
            <p class="text-start font-bold text-xl text-blue-950">Super Burgers</p>
            <div style="width: 58vw; height: 0.5vh; "class="mt-1 bg-blue-800"></div>
            <div style="width: 100%;" class="flex mt-3 flex-wrap" >
                <div style="max-width: 50%; width: 50%; height: 20vh" class="hover:bg-gray-200 flex items-center">
                    <img style="width: 45%;" class="ml-1 rounded-xl"  src="{{ asset('images/burger.jpg') }}">
                    <div style="max-height: 80%; max-width:50%;" class="ml-2 flex flex-col items-start justify-start">
                        <h3 class="text-blue-950 text-lg font-bold">Classic</h3>
                        <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-xs">Bollo de mantequilla, 150gr de carne de res calidad USDA CHOICE con receta original de Fuego Extremo, queso cheddar y queso Monterrey Jack. </p>
                        <p class="text-blue-950 font-bold text-xl">$130</p>
                    </div>
                </div>
                <div style="max-width: 50%; width: 50%; height: 20vh" class="hover:bg-gray-200 flex items-center">
                    <img style="width: 45%;" class="ml-1 rounded-xl"  src="{{ asset('images/burger.jpg') }}">
                    <div style="max-height: 80%; max-width:50%;" class="ml-2 flex flex-col items-start justify-start">
                        <h3 class="text-blue-950 text-lg font-bold">Classic</h3>
                        <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-xs">Bollo de mantequilla, 150gr de carne de res calidad USDA CHOICE con receta original de Fuego Extremo, queso cheddar y queso Monterrey Jack. </p>
                        <p class="text-blue-950 font-bold text-xl">$130</p>
                    </div>
                </div>
                <div style="max-width: 50%; width: 50%; height: 20vh" class="hover:bg-gray-200 flex items-center">
                    <img style="width: 45%;" class="ml-1 rounded-xl"  src="{{ asset('images/burger.jpg') }}">
                    <div style="max-height: 80%; max-width:50%;" class="ml-2 flex flex-col items-start justify-start">
                        <h3 class="text-blue-950 text-lg font-bold">Classic</h3>
                        <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-xs">Bollo de mantequilla, 150gr de carne de res calidad USDA CHOICE con receta original de Fuego Extremo, queso cheddar y queso Monterrey Jack. </p>
                        <p class="text-blue-950 font-bold text-xl">$130</p>
                    </div>
                </div>
            </div>

            <p class="text-start font-bold text-xl text-blue-950">Super Burgers</p>
            <div style="width: 58vw; height: 0.5vh; "class="mt-1 bg-blue-800"></div>
            <div style="width: 100%;" class="flex mt-3" >
                <div style="max-width: 50%; width: 50%; height: 20vh" class="hover:bg-gray-200 flex items-center">
                    <img style="width: 45%;" class="ml-1 rounded-xl"  src="{{ asset('images/burger.jpg') }}">
                    <div style="max-height: 80%; max-width:50%;" class="ml-2 flex flex-col items-start justify-start">
                        <h3 class="text-blue-950 text-lg font-bold">Classic</h3>
                        <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-xs">Bollo de mantequilla, 150gr de carne de res calidad USDA CHOICE con receta original de Fuego Extremo, queso cheddar y queso Monterrey Jack. </p>
                        <p class="text-blue-950 font-bold text-xl">$130</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div style="height: fit-content; width: 28vw;" class="pb-5 flex flex-col top-24 left-28 fixed items-end bg-white shadow-lg rounded-xl">
    <div style="width:80%" class="flex flex-col justify-start items-center">
        <h3  class="font-bold text-blue-950 text-xl text-center mr-4 mt-5">Easy Food Restaurante Demo</h3>
        <div class="flex justify-center items-start mt-1">
            <div class="mt-2 flex justify-center items-center h-2 w-2 bg-green-500 rounded-full">
            </div>
            <p class="ml-2 text-base text-blue-950">Abierto</p>
        </div>
        <a href=""  class="hover:bg-gray-200 text-blue-950 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
            <img class="w-4 h-4"  src="{{ asset('images/information.svg') }}">
            <p class="ml-2 text-base font-bold">Más información</p>
        </a>
        <h3  class="font-bold text-blue-950 text-xl text-center mr-4 mt-3">Menú</h3>
    </div>

    <div style="width:90%" class="flex-col flex justify-center items-center">
        <a href="" style ="width: 90%;" class="border-l-8 border-blue-900 bg-gray-200 hover:bg-gray-200 text-blue-950 mt-2  rounded text-center">Super Burgers</a>
        <a href="" style ="width: 90%;" class="hover:bg-gray-200  text-blue-950 mt-2 rounded text-center">Super Burgers</a>
    </div>
    <a href=""  style="width: 80%" class="hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
        <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
        <p class="ml-2 text-lg ">Total: $0 | Ver carrito </p>
    </a>
</div>

<div style="border-radius: 200px; height: 20%; width: 12vw;" class="rounded border-blue-800 border-xl border-8 top-24 left-12 fixed bg-white shadow-lg">
    <img src="{{ asset('images/logoMain.png') }}">
</div>

@endsection
