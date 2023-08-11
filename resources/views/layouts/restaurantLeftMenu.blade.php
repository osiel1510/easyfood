<div style="height: 74vh; width: 28vw;" class="pb-5 flex flex-col top-40 left-8 fixed items-end bg-white shadow-lg rounded-xl">

    <div style="width:100%" class="mt-16 flex flex-col justify-start items-center">
        <h3  class="font-bold text-blue-950 text-xl text-center mr-4 mt-5">{{$restaurant->nombre}}</h3>
        <div class="flex justify-center items-start mt-1">

        @php
            if($horarios->isEmpty()){
                            echo '
                    <div class="mt-2 flex justify-center items-center h-2 w-2 bg-red-500 rounded-full">
                    </div>
                    <p class="ml-2 text-base text-blue-950">Cerrado</p>';

            }else{

                echo '
                    <div class="mt-2 flex justify-center items-center h-2 w-2 bg-green-500 rounded-full">
                    </div>
                    <p class="ml-2 text-base text-blue-950">Abierto</p>';

            }

        @endphp

        </div>
        <button id="openModalRestauranteBtn" class="hover:bg-gray-200 text-blue-950 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
            <p class="ml-2 text-xl font-bold">EDITAR RESTAURANTE</p>
        </button>
        <a href="{{ route('menu.show', ['restaurant' => $restaurant->id]) }}"  class="hover:bg-gray-200 text-blue-950 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
            <p class="ml-2 text-xl font-bold">VISUALIZAR MENÚ</p>
        </a>

    </div>

    <div style="width:90%" class="mt-5 flex-col flex justify-center items-center">
        <a href="{{route('secciones.index')}}" style ="width: 90%;" class="pl-5 @yield('seccionesSeleccionadas') hover:bg-gray-200 text-blue-950 mt-2  text-xl rounded ">Secciones</a>
        <a href="{{route('products.index')}}" style ="width: 90%;" class="pl-5 @yield('productosSeleccionados') hover:bg-gray-200 text-blue-950 mt-2  text-xl rounded ">Productos</a>
        <a href="{{route('section_options.index')}}" style ="width: 90%;" class="pl-5 @yield('sectionOptionSeleccionadas') hover:bg-gray-200 text-blue-950 mt-2  text-xl rounded ">Secciones de Extras</a>
        <a href="{{route('options.index')}}" style ="width: 90%;" class="pl-5 @yield('extrasSeleccionados') hover:bg-gray-200 text-blue-950 mt-2  text-xl rounded ">Extras</a>

    </div>

    <button id="openModalBtn"  class="hover:bg-gray-200 text-blue-950 mt-5 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
        <p class="ml-2 text-lg font-bold">@yield('accionLeftMenu')</p>
    </button>

</div>

<div style="border-radius: 200px; height: 200px; width: 200px;" class="rounded border-blue-800 border-xl border-8 top-8 left-32 fixed bg-white shadow-lg">
    <button class="editar-imagen" id="openModalImagenRestauranteBtn">
        <img src="{{ asset('uploads/'.$restaurant->imagen) }}" style="width:100%; border-radius: 200px;">
        <span class="editar-texto">Editar</span>
    </button>
</div>
