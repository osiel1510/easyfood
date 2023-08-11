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
  right: 0;
  width: 28%;
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
                <div style="width: 100%;" class="flex mt-3">
                @foreach($section->products as $product)
                    <div id="product-{{ $product->id }}" style="max-width: 50%; width: 50%; height: 20vh" class="cursor-pointer product-item hover:bg-gray-200 flex items-center">
                        <img style="width: 32%;" class="ml-1 rounded-xl" src="{{ asset('uploads/' . $product->imagen) }}">
                        <div style="max-height: 80%; max-width: 50%;" class="ml-2 flex flex-col items-start justify-start">
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

                            <input id="quantity-input" class="mt-2 mb-2 " type="number" min="1" value="1">

                            <button id="add-to-cart-btn" href=""  style="width: 80%" class="add-to-cart hover:bg-blue-900 text-white bg-blue-800 mt-2 pt-1 pb-1 pl-3 pr-3 self-center flex justify-center items-center border-blue-800 border-2 rounded-lg">
                                <img class="w-6 h-6"  src="{{ asset('images/marketcar.svg') }}">
                                <p id="cart-amount" class="ml-2 text-lg ">Añadir al carrito</p>
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

var isProductViewed = false;

$(document).ready(function() {

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
        delete cart[id];
        localStorage.setItem('cart', JSON.stringify(cart));
        $(this).parent().remove();
    });


    $(document).on('input', '#quantity-input', function() {
        // obtén el precio del producto actual
        var precioProducto = parseFloat($(this).parent().find('.product-price').text().replace('$', ''));

        // calcula el monto calculado (cantidad * precio del producto)
        var montoCalculado = precioProducto * parseInt($(this).val());

        // actualiza el monto calculado en el botón de añadir al carrito
        $(this).parent().find('#cart-amount').text('Añadir al carrito: $' + montoCalculado.toFixed(2));
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
        var quantity = $(this).prev().val();

        // Supongamos que addToCart devuelve el total actualizado del carrito
        var cartTotal = addToCart(product_id, quantity);

        // Actualiza el total del carrito en la vista
        $(".total").text('Total: $' + cartTotal + ' | Ver carrito');

        $('#sidebar').addClass('hidden');
        $('#overlay').hide();
    });


});

});

function addToCart(product_id, quantity) {
    // primero, intentamos recuperar el carrito del local storage
    var cart = localStorage.getItem('cart');

    // si el carrito ya existe, lo parseamos a un objeto, de lo contrario inicializamos un objeto vacío
    cart = cart ? JSON.parse(cart) : {};

    // luego obtenemos el precio y el nombre del producto actual
    var productPrice = parseFloat($('#product-details-' + product_id).find('.product-price').text().replace('$', ''));
    var productName = $('#product-details-' + product_id).find('h3').text();

    // si el producto ya está en el carrito, simplemente incrementamos la cantidad, de lo contrario agregamos el producto al carrito
    if (cart[product_id]) {
        cart[product_id].quantity += parseInt(quantity);
    } else {
        cart[product_id] = {
            id: product_id,
            quantity: parseInt(quantity),
            price: productPrice,
            name: productName
        };
    }

    // guardamos el carrito actualizado de nuevo en el local storage
    localStorage.setItem('cart', JSON.stringify(cart));

    // calculamos el total del carrito
    var total = 0;
    for (var product in cart) {
        total += cart[product].quantity * cart[product].price;
    }

    // genera el HTML para el producto en el carrito
    var cartItemHTML = '<div class="cart-item" data-id="' + product_id + '">' +
                        '<h3>' + cart[product_id].name + '</h3>' +
                        '<p>Cantidad: <span class="quantity">' + cart[product_id].quantity + '</span></p>' +
                        '<p>Precio: $<span class="price">' + cart[product_id].price.toFixed(2) + '</span></p>' +
                        '<button class="increase">+</button>' +
                        '<button class="decrease">-</button>' +
                        '<button class="remove">Eliminar</button>' +
                       '</div>';

    // inserta el producto en el carrito (en la barra lateral)
    $('#sidebar').html(cartItemHTML);

    // devuelve el total del carrito
    return total;
}


</script>

<script>

// Función para mostrar el carrito
function showCart() {
    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : {};
    var cartContainer = $('#cart-container');
    cartContainer.empty();  // Limpiar el contenido existente

    // Iterar sobre los productos en el carrito y generar HTML
    cartContainer.append(`
    <h2 class="mt-5 text-xl text-blue-800 font-bold">Carrito</h2>
    `);

    for (var productId in cart) {
        var product = cart[productId];
        var productHTML = `
            <div style="width: 85%; margin-top: 10px;" class="text-white p-5 rounded-xl cart-item cart-product bg-blue-800" data-id="${productId}">
                <p class="product-name">${product.quantity} x ${product.name} $${product.price * product.quantity}</p>
                <div class="product-quantity">
                    <span class="product-price"></span>
                    <button class="increase-quantity">+</button>
                    <button class="ml-5 decrease-quantity elongated-minus">-</button>
                    <button class="remove-from-cart ml-5"><i class="fas fa-trash-alt"></i></button>
                    <span class="text-blue-800 quantity">${product.quantity}</span>
                </div>
            </div>
        `;
        cartContainer.append(productHTML);
    }

    cartContainer.append(`


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

// Evento para el botón "Eliminar" en el carrito
$('#cart-container').on('click', '.remove-from-cart', function() {
    var productElement = $(this).closest('.cart-product');
    var productId = productElement.data('id');
    var cart = JSON.parse(localStorage.getItem('cart'));
    delete cart[productId];
    localStorage.setItem('cart', JSON.stringify(cart));
    productElement.remove();
    updateTotal();
    // Actualiza el total del carrito si es necesario
});

// Función para actualizar la cantidad de un producto en el carrito
function updateCartItemQuantity(productId, delta) {
    var cart = JSON.parse(localStorage.getItem('cart'));

    if (!cart[productId]) return;

    cart[productId].quantity += delta;
    if (cart[productId].quantity <= 0) {
        delete cart[productId];
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}

function updateTotal() {
    var total = 0;
    var cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : {}; // <--- Asegúrate de hacer el parse aquí
    for (var product in cart) {
        total += cart[product].quantity * cart[product].price;
    }

    // Actualiza el total del carrito en la vista
    $(".total").text('Total: $' + total + ' | Ver carrito');
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
