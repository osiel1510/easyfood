@extends('layouts.footer')
@extends('layouts.content')
@extends('layouts.header')
@extends('layouts.head')

@section('titulo')
Planes
@endsection

@section('contenido')
    <div style="height: 90vh;" class="flex justify-center items-center flex-col">

        <h1 class="font-bold text-4xl w-4/5 text-center text-blue-700">¿Estás listo para hacer crecer tu negocio?</h1>

        <p class="mt-10 text-2xl w-4/5 text-center">Selecciona el plan que más te convenga</p>
        <div class="mt-16 flex justify-center align-center">
            <div class="flex justify-start items-center">
                <div style="width: 18vw;" class="border-2 pl-10 pr-10 border-blue-700 border rounded-xl flex justify-start items-center flex-col">
                    <h3 class="mt-2 font-bold text-blue-700 text-2xl">Mensual</h3>
                    <h2 class="font-bold text-blue-900 text-2xl">$349/mes</h2>
                    <a style="width: 13vw;" class="text-center mt-2 text-white bg-blue-700 p-3 rounded hover:bg-blue-800 mb-5" href="">Contratar </a>
                </div>
            </div>
            <div class="ml-10 flex justify-start items-center">
                <div style="width: 18vw;" class="border-2 pl-10 pr-10 border-blue-700 border rounded-xl flex justify-start items-center flex-col">
                    <h3 class="mt-2 font-bold text-blue-700 text-2xl">6 Meses</h3>
                    <h2 class="font-bold text-blue-900 text-2xl">$280/mes</h2>
                    <a style="width: 13vw;" class="text-center mt-2 text-white bg-blue-700 p-3 rounded hover:bg-blue-800 mb-5" href="">Contratar </a>
                </div>
            </div>
            <div class="ml-10 flex justify-start items-center">
                <div style="width: 18vw;" class="border-2 pl-10 pr-10 border-blue-700 border rounded-xl flex justify-start items-center flex-col">
                    <h3 class="mt-2 font-bold text-blue-700 text-2xl">Anual</h3>
                    <h2 class="font-bold text-blue-900 text-2xl">$159/mes</h2>
                    <a style="width: 13vw;" class="text-center mt-2 text-white bg-blue-700 p-3 rounded hover:bg-blue-800 mb-5" href="">Contratar </a>
                </div>
            </div>

        </div>

    </div>
@endsection
