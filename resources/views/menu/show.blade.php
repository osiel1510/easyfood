@extends('layouts.footer')
@extends('layouts.content')
@extends('layouts.headerUser')
@extends('layouts.head')

@section('titulo')

{{$restaurant->nombre}}

@endsection

@section('contenido')

<style>
.overlay {
  display: none;
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

.sidebar {
  display:flex;
  flex-direction: column;
  align-items: center;
  position: fixed;
  width: 500px;
  right: 0;
  height: 100%;
  top: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  z-index: 3;
}


.sidebar.hidden {
  width: 0;
}


</style>



<div style="height: 90vh;" class="flex justify-start items-center">

    <div style="height: 100%; width: 18%;" class="bg-blue-800">

    </div>

    <div style="height: 100%; width: 80%;" class="flex justify-end" >
        <div style="width: 73%;" class="mt-5">
            @foreach($restaurant->sections as $section)
                <p class="text-start font-bold text-xl text-blue-900">{{ $section->nombre }}</p>
                <div style="width: 58vw; height: 0.5vh;" class="mt-1 bg-blue-800"></div>
                <div style="width: 100%;" class="flex mt-3 flex-wrap">
                @foreach($section->products as $product)
                    <div id="product-{{ $product->id }}" style="max-width: 300px; width: 50%; height: 15vh" class="cursor-pointer product-item hover:bg-gray-200 flex items-center">
                        <img style="width: 30%;" class="ml-1 rounded-xl" src="{{ asset('uploads/' . $product->imagen) }}">
                        <div style="max-height: 300px; max-width: 300px;" class="ml-2 flex flex-col items-start justify-start">
                            <h3 class="text-blue-950 text-lg font-bold">{{ $product->nombre }}</h3>
                            <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-xs">{{ $product->descripcion }}</p>
                            <p class="text-blue-950 font-bold text-xl">${{ $product->precio }}</p>
                        </div>

                        <!-- contenedor de detalles del producto -->
                        <div id="product-details-{{ $product->id }}" class="flex-col items-center justify-center product-details hidden">
                            <div id="product-details-{{ $product->id }}" class="product-details hidden"></div>
                            <img style="width: 50%;" class="mt-5 ml-1 rounded-xl" src="{{ asset('uploads/' . $product->imagen) }}">
                            <h3 class="text-blue-950 text-lg font-bold">{{ $product->nombre }}</h3>
                            <p style="max-height:70px; max-width: 100%; text-overflow: ellipsis; overflow:hidden;" class="text-blue-950 text-normal">{{ $product->descripcion }}</p>

                            <p class="text-blue-950 font-bold text-xl product-price">${{ $product->precio }}</p>

                            @foreach ($product->sectionOptions as $sectionOption)
                                <div style="width: 80%;" class="mt-5 flex flex-col p-5 bg-gray-100 items-center">
                                    <h2 class="text-blue-950 font-bold text-lg">{{ $sectionOption->nombre }}</h2>

                                    @foreach($sectionOption->options as $option)
                                    <div style="width: 80%;" class="mt-2 flex justify-between">
                                        <p class="text-blue-950">{{$option->nombre}}</p>
                                        <div style="width: 40%;" class="flex justify-between" id="{{$option->nombre}}">
                                            @if($sectionOption->obligatorio == false)
                                                <p class="text-blue-950 precioOption">${{$option->precio}}</p>
                                                <button class="increaseOption text-white font-bold bg-blue-900 rounded pl-2 pr-2" data-option="{{$option->nombre}}" >+</button>
                                                <p class="cantidadOption text-blue-950" data-option="{{$option->nombre}}" data-sectionOption="{{$sectionOption->nombre}}">0</p>
                                                <button class="decreaseOption text-white font-bold bg-blue-900 rounded pl-2 pr-2" data-option="{{$option->nombre}}">-</button>
                                            @endif
                                        </div>
                                        @if($sectionOption->obligatorio == true)
                                            <input type="radio" id="{{$option->nombre}}" name="{{$sectionOption->nombre}}" value="{{$option->nombre}}" @if($loop->first)  checked  @endif>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <div style="width: 80%;" class="mt-5 flex flex-col p-5 bg-gray-100 items-center">
                                <h2 class="text-blue-950 font-bold text-lg">Cantidad</h2>
                                <div style="width: 80%;" class="mt-2 flex justify-center">
                                    <div style="width: 40%;" class="flex justify-between">
                                        <button class="increaseCantidadProducto text-white font-bold bg-blue-900 rounded pl-2 pr-2" data-option="{{$option->nombre}}" >+</button>
                                        <p class="cantidadProducto text-blue-950">1</p>
                                        <button class="decreaseCantidadProducto text-white font-bold bg-blue-900 rounded pl-2 pr-2" data-option="{{$option->nombre}}">-</button>
                                    </div>
                                </div>
                            </div>

                            <button id="add-to-cart-btn-{{$product->id}}" data-product-id="{{$product->id}}" data-product-price="{{$product->precio}}" style="width: 80%" class="mb-5 add-to-cart hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
                                <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
                                <p id="cart-amount" class="cart-amount ml-2 text-lg ">Añadir al carrito: ${{$product->precio}}</p>
                            </button>
                        </div>
                    </div>
                @endforeach

                @foreach($section->products as $product)

            @endforeach

                </div>
            @endforeach

        </div>
    </div>

</div>

<div style="height: fit-content; width: 28vw;" class="pb-5 flex flex-col top-24 left-28 fixed items-end bg-white shadow-lg rounded-xl">
    <div style="width:80%" class="flex flex-col justify-start items-center">
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
        <a href=""  class="hover:bg-gray-200 text-blue-950 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
            <img class="w-4 h-4"  src="{{ asset('images/information.svg') }}">
            <p class="ml-2 text-base font-bold">Más información</p>
        </a>
        <h3  class="font-bold text-blue-950 text-xl text-center mr-4 mt-3">Menú</h3>
    </div>

    <div style="width:90%" class="flex-col flex justify-center items-center">
        @foreach($restaurant->sections as $section)
        <a href="" style ="width: 90%;" class="hover:bg-gray-200  text-blue-950 mt-2 rounded text-center">{{$section->nombre}}</a>
        @endforeach
    </div>
    <button style="width: 80%" class="view-cart hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
        <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
        <p class="ml-2 text-lg total">Total: $0 | Ver carrito </p>
    </butt>
</div>

<div id="overlay" class="overlay"></div>

<div id="sidebar" class="sidebar hidden">
    <!-- Aquí se insertará el contenido del producto de forma dinámica -->
</div>

<!-- Carrito contenedor -->
<div id="cart-container" class="sidebar hidden">
    <!-- Aquí se insertará el contenido del carrito de forma dinámica -->
</div>


<div style="border-radius: 200px; height: 200px; width: 200px;" class="rounded border-blue-800 border-xl border-8 top-28 left-5 fixed bg-white shadow-lg">
    <img src="{{ asset('uploads/'.$restaurant->imagen) }}" style="width:100%; border-radius: 200px;">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function updateTotal() {

    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : []; // Cambia '{}' a '[]'
    var total = 0;

    for (var i = 0; i < cart.length; i++) {
        var product = cart[i];
        var productTotal = 0; // Total del producto actual

        // Recorre las opciones seleccionadas en este producto
        for (var j = 0; j < product.selectedOptions.length; j++) {
            var option = product.selectedOptions[j];

            // Calcula el costo total de esta opción (precio * cantidad)
            var optionTotal = option.price * option.quantity;

            // Agrega el costo total de esta opción al costo total del producto
            productTotal += optionTotal;
        }

        // Multiplica el costo total del producto por la cantidad del producto
        productTotal *= product.quantity;


        productTotal += (product.price * product.quantity);

        // Agrega el costo total del producto al total del carrito
        total += productTotal;
    }

    // Actualiza el total del carrito en la vista
    $(".total").text('Total: $' + total.toFixed(2) + ' | Ver carrito'); // Asegúrate de formatear el total correctamente
}

updateTotal();

var isProductViewed = false;

$(document).ready(function() {



    $('#sidebar').on('click', '.increaseCantidadProducto', function() {

        // obtén el precio del producto actual
        var precioTotal = parseFloat($('#sidebar').find('#cart-amount').text().replace('Añadir al carrito: $', ''));
        var cantidadElemento = $('.cantidadProducto').last();
        var cantidad = parseInt(cantidadElemento.text());

        // calcula el monto calculado (cantidad * precio del producto)
        cantidadElemento.text((cantidad+1));

        // actualiza el monto calculado en el botón de añadir al carrito
        $('#sidebar').find('#cart-amount').text('Añadir al carrito: $' + ((precioTotal/cantidad)*(cantidad+1)).toFixed(2));
    });

    $('#sidebar').on('click', '.decreaseCantidadProducto', function() {

        // obtén el precio del producto actual
        var precioTotal = parseFloat($('#sidebar').find('#cart-amount').text().replace('Añadir al carrito: $', ''));
        var cantidadElemento = $('.cantidadProducto').last();
        var cantidad = parseInt(cantidadElemento.text());

        if(cantidad >= 2){
            // calcula el monto calculado (cantidad * precio del producto)
            cantidadElemento.text((cantidad-1));

            // actualiza el monto calculado en el botón de añadir al carrito
            $('#sidebar').find('#cart-amount').text('Añadir al carrito: $' + ((precioTotal/cantidad)*(cantidad-1)).toFixed(2));

        }

    });


    $('#sidebar').on('click', '.increaseOption', function() {
    var optionName = $(this).data('option');
    var cantidadOptionElements = $('.cantidadOption[data-option="' + optionName + '"]');

    var commonParent = $(this).closest('#' + optionName);
    var precioOptionElement = commonParent.find('.precioOption');
    var precio = parseFloat(precioOptionElement.text().replace('$',''));

    if (cantidadOptionElements.length >= 2) {

        var cantidadElemento = $('.cantidadProducto').last();
        var cantidadProducto = parseInt(cantidadElemento.text());

        var cartAmountElement = $('.cart-amount').last();
        var cartAmount = parseFloat(cartAmountElement.text().replace('Añadir al carrito: $',''));
        cartAmountElement.text('Añadir al carrito: $' + (cartAmount + (precio*cantidadProducto)));

        var cantidadOptionElement = cantidadOptionElements.last(); // Obtiene el segundo elemento
        var cantidadActual = parseInt(cantidadOptionElement.text());
        cantidadActual += 1;
        cantidadOptionElement.text(cantidadActual);
    }

});

// Delegación de eventos para decreaseOption
$('#sidebar').on('click', '.decreaseOption', function() {
    var optionName = $(this).data('option');
    var cantidadOptionElements = $('.cantidadOption[data-option="' + optionName + '"]');

    var commonParent = $(this).closest('#' + optionName);
    var precioOptionElement = commonParent.find('.precioOption');
    var precio = parseFloat(precioOptionElement.text().replace('$',''));

    if (cantidadOptionElements.length >= 2) {

        var cantidadOptionElement = cantidadOptionElements.last(); // Obtiene el segundo elemento
        var cantidadActual = parseInt(cantidadOptionElement.text());

        if(cantidadActual > 0){
            var cantidadElemento = $('.cantidadProducto').last();
            var cantidadProducto = parseInt(cantidadElemento.text());

            cantidadActual -= 1;
            var cartAmountElement = $('.cart-amount').last();
            var cartAmount = parseFloat(cartAmountElement.text().replace('Añadir al carrito: $',''));
            cartAmountElement.text('Añadir al carrito: $' + (cartAmount - (precio*cantidadProducto)));
            cantidadOptionElement.text(cantidadActual);
        }
    }
});


    // esconde la barra lateral y el overlay cuando se hace clic fuera de la barra lateral
    $('#overlay').on('click', function(event) {
        event.stopPropagation();
        $(this).hide();
        $('#sidebar').addClass('hidden');
        $('#cart-container').addClass('hidden');
    });

    $('#sidebar').on('click', '.increase', function() {
        var id = $(this).parent().data('id');
        var cart = JSON.parse(localStorage.getItem('cart'));
        cart[id].quantity++;
        localStorage.setItem('cart', JSON.stringify(cart));
        $(this).siblings('.quantity').text(cart[id].quantity);
    });

    $('#sidebar').on('click', '.decrease', function() {
        var id = $(this).parent().data('id');
        var cart = JSON.parse(localStorage.getItem('cart'));
        cart[id].quantity--;
        if (cart[id].quantity <= 0) {
            delete cart[id];
            $(this).parent().remove();
        } else {
            localStorage.setItem('cart', JSON.stringify(cart));
            $(this).siblings('.quantity').text(cart[id].quantity);
        }
    });

    $('#sidebar').on('click', '.remove', function() {
        var id = $(this).parent().data('id');
        var cart = JSON.parse(localStorage.getItem('cart'));

        // Buscar el producto en el carrito por su ID
        var productIndex = id;

        if (productIndex !== -1) {
            cart.splice(productIndex, 1); // Eliminar el producto del array
            localStorage.setItem('cart', JSON.stringify(cart));
            $(this).parent().remove();
        }

        updateTotal();
    });


    $('.product-item').on('click', function() {
    var productDetails = $('#product-details-' + $(this).attr('id').replace('product-', ''));
    var productDetailsCopy = productDetails.clone();

    // llena la barra lateral con los detalles del producto y muestra la barra lateral
    $('#sidebar').html(productDetailsCopy.html()).removeClass('hidden');

    $('#overlay').show();

    isProductViewed = true;

    // Adjunta el controlador de eventos al botón "add-to-cart" clonado
    $('#sidebar .add-to-cart').on('click', function(e) {
        e.stopPropagation();

        var product_id = $('#sidebar').find('.product-details').attr('id').replace('product-details-', '');
        var quantity = parseInt($('#sidebar').find('.cantidadProducto').text());

        // Crea un objeto para almacenar las sectionOptions y options seleccionadas
        var selectedOptions = [];

        // Dentro de tu bucle para recopilar selecciones
        $('#sidebar').find('input[type="radio"]:checked').each(function() {
            var sectionOptionName = $(this).attr('name');
            var optionName = $(this).val();
            var quantity = 1;
            var price = 0;

            // Crear un objeto JSON con los datos
            var selectedOption = {
                sectionOption: sectionOptionName,
                option: optionName,
                quantity: quantity,
                price: price
            };

            selectedOptions.push(selectedOption);
        });

        $('#sidebar').find('.cantidadOption').each(function() {
            var sectionOptionName = $(this).data('sectionoption');
            var optionName = $(this).data('option');
            var quantity = parseInt($(this).text());

            // Verifica si la cantidad es mayor que 0 antes de incluirlo
            if (quantity > 0) {
                // Encuentra el elemento padre común que contiene tanto cantidadOption como precioOption
                var commonParent = $(this).closest('#' + optionName);

                // Busca el elemento .precioOption dentro del padre común
                var precioOptionElement = commonParent.find('.precioOption');

                // Asegúrate de que el elemento .precioOption existe antes de obtener su valor
                if (precioOptionElement.length > 0) {
                    var price = parseFloat(precioOptionElement.text().replace('$', ''));

                    // Crear un objeto JSON con los datos
                    var selectedOption = {
                        sectionOption: sectionOptionName,
                        option: optionName,
                        quantity: quantity,
                        price: price
                    };

                    selectedOptions.push(selectedOption);
                }
            }
        });

        // Supongamos que addToCart devuelve el total actualizado del carrito
        var cartTotal = addToCart(product_id, quantity, selectedOptions);

        // Actualiza el total del carrito en la vista
        $(".total").text('Total: $' + cartTotal + ' | Ver carrito');

        $('#sidebar').addClass('hidden');
        $('#overlay').hide();
    });



});

});

function getTotal(){
    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];

    var total = 0;

    for (var i = 0; i < cart.length; i++) {
        var product = cart[i];
        var productTotal = 0; // Total del producto actual

        // Recorre las opciones seleccionadas en este producto
        for (var j = 0; j < product.selectedOptions.length; j++) {
            var option = product.selectedOptions[j];

            // Calcula el costo total de esta opción (precio * cantidad)
            var optionTotal = option.price * option.quantity;

            // Agrega el costo total de esta opción al costo total del producto
            productTotal += optionTotal;
        }

        // Multiplica el costo total del producto por la cantidad del producto
        productTotal *= product.quantity;


        productTotal += (product.price * product.quantity);

        // Agrega el costo total del producto al total del carrito
        total += productTotal;
    }

    return total;
}

function addToCart(product_id, quantity, selectedOptions) {
    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];


    var productPrice = parseFloat($('#product-details-' + product_id).find('.product-price').text().replace('$', ''));
    var productName = $('#product-details-' + product_id).find('h3').text();

    // Estructura del producto en el carrito
    var newProduct = {
        id: product_id,
        quantity: parseInt(quantity),
        price: productPrice,
        name: productName,
        selectedOptions: selectedOptions
    };

    cart.push(newProduct);
    localStorage.setItem('cart', JSON.stringify(cart));

    var total = 0;

    for (var i = 0; i < cart.length; i++) {
        var product = cart[i];
        var productTotal = 0; // Total del producto actual

        // Recorre las opciones seleccionadas en este producto
        for (var j = 0; j < product.selectedOptions.length; j++) {
            var option = product.selectedOptions[j];

            // Calcula el costo total de esta opción (precio * cantidad)
            var optionTotal = option.price * option.quantity;

            // Agrega el costo total de esta opción al costo total del producto
            productTotal += optionTotal;
        }

        // Multiplica el costo total del producto por la cantidad del producto
        productTotal *= product.quantity;


        productTotal += (product.price * product.quantity);

        // Agrega el costo total del producto al total del carrito
        total += productTotal;
    }

    return total;
}

</script>

<script>

// Función para mostrar el carrito
function showForm() {
    var cartContainer = $('#cart-container');
    cartContainer.empty();  // Limpiar el contenido existente

    // Mostrar el total del carrito

    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];

    let total = getTotal();

    cartContainer.append(`

    <form method="POST" action="{{route('menu.store')}}" class="w-full flex flex-col items-center">
        @csrf
        <input type="hidden" name="restaurante" value="{{$restaurant->id}}">
        <h1 class="text-3xl text-blue-900 mt-5 font-bold">LLena los datos</h1>
        <div style="width: 80%;" class="mt-5 flex flex-col p-5 bg-gray-100 items-center rounded">
                <h2 class="text-blue-950 font-bold text-lg">Datos personales</h2>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <label  class="mb-2 pr-5 mt-5 text-blue-900 font-medium">Nombre</label>
                    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="nombre" placeholder="Nombre" required>
                </div>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <label  class="mb-2 pr-5 mt-5 text-blue-900 font-medium">Teléfono</label>
                    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="telefono" placeholder="Teléfono" required>
                </div>
        </div>

        <div style="width: 80%;" class="mt-5 flex flex-col p-5 bg-gray-100 items-center rounded">
                <h2 class="text-blue-950 font-bold text-lg">Tipo de entrega</h2>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <div style="width: 80%;" class="mt-1 flex justify-between">
                        <p class="text-blue-950">Envío a domicilio</p>
                        <input type="radio" id="envioDomicilio" name="tipoEntrega" value="Envío a Domicilio" checked >
                    </div>
                    <div style="width: 80%;" class="mt-1 flex justify-between">
                        <p class="text-blue-950">Pasar a recoger</p>
                        <input type="radio" id="pasarRecoger" name="tipoEntrega" value="Pasar a recogerlo" >
                    </div>
                    <div style="width: 80%;" class="mt-1 flex justify-between">
                        <p class="text-blue-950">Comer en restaurante</p>
                        <input type="radio" id="comerRestaurante" name="tipoEntrega" value="Comer en el restaurante" >
                    </div>
                </div>
        </div>

        <div style="width: 80%;" class="mt-5 flex flex-col p-5 bg-gray-100 items-center rounded" id="tipoEntrega">
                <h2 class="text-blue-950 font-bold text-lg">Dirección de entrega</h2>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <label  class="mb-2 pr-5 mt-5 text-blue-900 font-medium">Colonia</label>
                    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="colonia" placeholder="Colonia">
                </div>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <label  class="mb-2 pr-5 mt-5 text-blue-900 font-medium">Calle</label>
                    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="calle" placeholder="Calle">
                </div>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <label  class="mb-2 pr-5 mt-5 text-blue-900 font-medium">Número exterior</label>
                    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="numeroExterior" placeholder="Número exterior">
                </div>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <label  class="mb-2 pr-5 mt-5 text-blue-900 font-medium">Número interior</label>
                    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="numeroInterior" placeholder="Número interior">
                </div>
        </div>

        <div style="width: 80%;" class="mt-5 flex flex-col p-5 bg-gray-100 items-center rounded">
                <h2 class="text-blue-950 font-bold text-lg">Método de pago ($${total})</h2>
                <div style="width: 80%;" class="mt-1 flex justify-between flex-col">
                    <div style="width: 80%;" class="mt-1 flex justify-between">
                        <p class="text-blue-950">Pago en efectivo</p>
                        <input type="radio" id="efectivo" name="metodoPago" value="Efectivo" checked >
                    </div>

                    <div style="width: 80%;" class="mt-1 flex justify-between" id="inputEfectivo">
                        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" step=0.1 name="efectivo" placeholder="¿$Con cuanto pagas?">
                    </div>

                    <div style="width: 80%;" class="mt-1 flex justify-between">
                        <p class="text-blue-950">Transferencia</p>
                        <input type="radio" id="transferencia" name="metodoPago" value="Transferencia" >
                    </div>

                    <div style="width: 80%;" class="mt-1 flex justify-between">
                        <p class="text-blue-950">Terminal</p>
                        <input type="radio" id="terminal" name="metodoPago" value="Terminal" >
                    </div>
                </div>
        </div>

        <button type="submit" style="width: 80%" class="mt-5 mb-5 hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
            <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
            <p class="cart-amount ml-2 text-lg ">Hacer mi pedido: $${total}</p>
        </button>

        <div style="width: 80%;" class="mt-5 flex flex-col p-5 items-center rounded">
        </div>

    </form>

    `);


    // Obtener los datos del carrito desde el localStorage
    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];

    // Agregar un campo oculto al formulario para el carrito
    var cartInput = document.createElement('input');
    cartInput.type = 'hidden';
    cartInput.name = 'cart'; // Nombre del campo en el formulario
    cartInput.value = JSON.stringify(cart); // Convertir el carrito a una cadena JSON

    // Acceder al elemento DOM del formulario usando [0] o .get(0)
    let form = $('form').first()[0]; // O $('form').first().get(0);

    // Agregar el campo oculto al formulario
    form.appendChild(cartInput);

    // Mostrar el div del carrito
    cartContainer.removeClass('hidden');
    $('#overlay').show();

}


// Función para mostrar el carrito
function showCart() {
    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];
    var cartContainer = $('#cart-container');
    cartContainer.empty();  // Limpiar el contenido existente

    var total = 0;  // Inicializar la variable para el total

    // Iterar sobre los productos en el carrito y generar HTML
    cartContainer.append(`
    <h2 class="mt-5 text-xl text-blue-800 font-bold">Carrito</h2>
    `);

    for (var i = 0; i < cart.length; i++) {
    var product = cart[i];
    total += product.quantity * product.price;
    totalProducto = product.quantity * product.price;

    product.selectedOptions.forEach(option => {
        totalProducto += option.price * option.quantity * product.quantity;
    });

    var cartItemHTML = `
        <div style="width: 85%; margin-top: 10px;" class="text-white p-5 rounded-xl cart-item cart-product bg-blue-800" data-id="${i}">
            <p class="product-name">${product.quantity} x ${product.name} $${product.price * product.quantity}</p>
            <div class="selected-options">
                ${product.selectedOptions.map(option => `
                    <p class="ml-3">${option.quantity} x ${option.option}${option.price !== 0 ? `: $${option.price}` : ''}</p>
                `).join('')}
            </div>
            <p class="ml-3">$${totalProducto}</p>

            <div class="product-quantity">
                <span class="product-price"></span>
                <button class="increase-quantity">+</button>
                <button class="ml-5 decrease-quantity elongated-minus">-</button>
                <button class="remove-from-cart ml-5"><i class="fas fa-trash-alt"></i></button>
                <span class="text-blue-800 quantity">${product.quantity}</span>
            </div>
        </div>
    `;

    cartContainer.append(cartItemHTML);
}
    var total = 0;

    for (var i = 0; i < cart.length; i++) {
        var product = cart[i];
        var productTotal = 0; // Total del producto actual

        // Recorre las opciones seleccionadas en este producto
        for (var j = 0; j < product.selectedOptions.length; j++) {
            var option = product.selectedOptions[j];

            // Calcula el costo total de esta opción (precio * cantidad)
            var optionTotal = option.price * option.quantity;

            // Agrega el costo total de esta opción al costo total del producto
            productTotal += optionTotal;
        }

        // Multiplica el costo total del producto por la cantidad del producto
        productTotal *= product.quantity;


        productTotal += (product.price * product.quantity);

        // Agrega el costo total del producto al total del carrito
        total += productTotal;
    }

    // Mostrar el total del carrito
    cartContainer.append(`

    <button style="width: 450px;" class="continuar-pedido hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
        <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
        <p class="ml-2 text-lg total">Total: $${total.toFixed(2)} | Continuar</p>
    </button>
    `);

    // Mostrar el div del carrito
    cartContainer.removeClass('hidden');
    $('#overlay').show();
}


// Evento para el botón "Ver carrito"
$('.view-cart').on('click', function(e) {
    e.preventDefault();
    showCart();
});

$(document).on('click', '.continuar-pedido', function() {
    showForm();
});

$(document).on('click', '#terminal', function() {
    let efectivoPago = $('#inputEfectivo');

    efectivoPago.hide();

});

$(document).on('click', '#transferencia', function() {
    let efectivoPago = $('#inputEfectivo');

    efectivoPago.hide();

});

$(document).on('click', '#efectivo', function() {
    let efectivoPago = $('#inputEfectivo');

    efectivoPago.show();

});

$(document).on('click', '#envioDomicilio', function() {
    let tipoEntregaDiv = $('#tipoEntrega');

    tipoEntregaDiv.show();

});

$(document).on('click', '#pasarRecoger', function() {
    let tipoEntregaDiv = $('#tipoEntrega');

    tipoEntregaDiv.hide();
});

$(document).on('click', '#comerRestaurante', function() {
    let tipoEntregaDiv = $('#tipoEntrega');

    tipoEntregaDiv.hide();
});

// Evento para el botón "Eliminar" en el carrito
$('#cart-container').on('click', '.remove-from-cart', function() {
    var productElement = $(this).closest('.cart-product');
    var productId = productElement.data('id');
    var cart = JSON.parse(localStorage.getItem('cart'));

    // Buscar el producto en el carrito por su ID
    var productIndex = productId;

    if (productIndex !== -1) {
        cart.splice(productIndex, 1); // Eliminar el producto del array
        localStorage.setItem('cart', JSON.stringify(cart));
        $(this).parent().remove();
    }
    updateTotal();
    showCart();
});

// Función para actualizar la cantidad de un producto en el carrito
function updateCartItemQuantity(productId, delta) {
    var cart = JSON.parse(localStorage.getItem('cart'));
    productIndex = productId;

    if (productIndex === -1) return;

    cart[productIndex].quantity += delta;
    if (cart[productIndex].quantity <= 0) {
        cart.splice(productIndex, 1); // Elimina el producto del array
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}


$(document).on('click', '.increase-quantity, .increase', function() {
    let quantityElement = $(this).siblings('.quantity');
    let currentQuantity = parseInt(quantityElement.text());
    let productId = $(this).closest('.cart-item').data('id');
    let priceElement = $(this).siblings('.product-price');
    let unitPrice = parseFloat(priceElement.text().replace('$', '')) / currentQuantity; // se obtiene el precio unitario

    updateCartItemQuantity(productId, 1); // incrementa la cantidad en 1

    currentQuantity += 1; // Incrementar la cantidad actual
    quantityElement.text(currentQuantity);
    priceElement.text('$' + (unitPrice * currentQuantity).toFixed(2)); // Actualizar el precio total del producto
    updateTotal();
    showCart();
});

$(document).on('click', '.decrease-quantity, .decrease', function() {
    let quantityElement = $(this).siblings('.quantity');
    let currentQuantity = parseInt(quantityElement.text());
    let productId = $(this).closest('.cart-item').data('id');
    let priceElement = $(this).siblings('.product-price');
    let unitPrice = parseFloat(priceElement.text().replace('$', '')) / currentQuantity; // se obtiene el precio unitario

    if (currentQuantity > 1) {
        updateCartItemQuantity(productId, -1); // disminuye la cantidad en 1

        currentQuantity -= 1; // Decrementar la cantidad actual
        quantityElement.text(currentQuantity);
        priceElement.text('$' + (unitPrice * currentQuantity).toFixed(2)); // Actualizar el precio total del producto
        updateTotal();
        showCart();
    }
});

</script>


@endsection
