<div id="modal" class="fixed inset-0 flex justify-center items-center z-10 hidden">
  <div style="height: 90vh; width: 50vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
    <h3 class="text-blue-700 font-medium text-3xl">Agregar Producto</h3>
    <form action="{{route('productos.store')}}" method="POST" class="mt-5 flex justify-center items-start flex-col">
      @csrf
      <div class="flex items-center justify-start w-full">
        <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Descripción corta:</label>
<input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="descripcionCorta" placeholder="Descripción corta">
    </div>

    <div class="flex items-center justify-start w-full">
        <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Descripción larga:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="descripcionLarga" placeholder="Descripción larga">
</div>

    <div class="flex items-center justify-start w-full">
        <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Precio de venta:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="precioVenta" step="0.01" placeholder="Precio de venta">
    </div>

      <div class="flex items-center justify-start w-full">
    <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Precio de compra:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="precioCompra" step="0.01" placeholder="Precio de compra">
</div>

<div class="flex items-center justify-start w-full">
    <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Stock:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="stock" placeholder="Stock">
</div>

<div class="flex items-center justify-start w-full">
    <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Peso del producto:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="pesoProducto" step="0.01" placeholder="Peso del producto">
</div>


      <div class="w-full flex justify-center items-center flex-row">
            <input type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Agregar">
    </form>
    <a id="closeModalBtn" class="ml-5 cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium">Cancelar</a>
    </div>
  </div>
</div>

<script>

const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const modal = document.getElementById('modalEditarProducto');
const modalOverlay = document.createElement('div');
modalOverlay.className = 'fixed inset-0 flex justify-center items-center z-1 hidden modal-overlay';
document.body.appendChild(modalOverlay);

openModalBtn.addEventListener('click', () => {
  modal.classList.remove('hidden');
  modalOverlay.classList.remove('hidden');
  document.body.classList.add('overflow-hidden'); // Evita que el scroll de la página esté disponible mientras el modal esté abierto
});

closeModalBtn.addEventListener('click', () => {
  modal.classList.add('hidden');
  modalOverlay.classList.add('hidden');
  document.body.classList.remove('overflow-hidden'); // Restaura el scroll de la página al cerrar el modal
});


</script>