<nav style="height: 10vh; width: 100vw;" class="bg-blue-800 flex justify-between text-white fixed">
    <img class="ml-5" src="{{ asset('images/logoWWhite.png') }}" alt="easyfood">
    <ul class="flex items-center">
        <li class="hover:bg-blue-700 rounded p-1"><a href="./">Inicio</a></li>
        @auth

        <li class="ml-10 hover:bg-blue-700 rounded p-1"><a href="#">{{auth()->user()->name}}</a></li>

        {{-- Agregar seguridad al logout --}}

        <form method="post" style="width: 90%;" action="{{route('logout')}}" >
            @csrf
            <li class="cursor-pointer ml-10 mr-10 hover:bg-blue-700 rounded p-1"><input class="cursor-pointer" type="submit" value="Cerrar Sesión"></li>
        </form>
        @endauth

        @guest

        <li class="ml-10 hover:bg-blue-700 rounded p-1"><a href="demo">Ver demo</a></li>
        <li class="ml-10 hover:bg-blue-700 rounded p-1"><a href="planes">Precios</a></li>
        <li class="ml-10 hover:bg-blue-700 rounded p-1"><a href="login">Iniciar Sesión</a></li>
        <li class="ml-10 mr-10 hover:bg-blue-700 rounded p-1"><a href="registrar">Registrarse</a></li>


        @endguest
    </ul>
</nav>
