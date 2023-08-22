<div id="modalRestaurante" class="fixed inset-0 flex justify-center items-center z-10 hidden">
  <div style="height: 90vh; width: 50vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
    <h3 class="text-blue-700 font-medium text-3xl">Editar Restaurante</h3>
    <form style="" action="{{route('post.update')}}" method="POST" class="mt-2 flex justify-center items-start flex-col">
      @csrf
      @method('PATCH')
      <input type ="hidden" name="restaurant_id" value="{{$restaurant->id}}">
      <div class="flex items-center justify-start w-full">
        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Nombre del restaurante:</label>
<input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="nombre" placeholder="Nombre del restaurante" value="{{$restaurant->nombre}}">
    </div>

    <div class="flex items-center justify-start w-full">
        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Enlace de la ubicación en google maps:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="ubicacion" placeholder="Enlace google maps..." value="{{$restaurant->ubicacion}}">
</div>

    <div class="flex items-center justify-start w-full">
        <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Telefono:</label>
        <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="telefono" maxlength="14" placeholder="Número del restaurante" value="{{$restaurant->telefono}}">
    </div>

      <div class="flex items-center justify-start w-full">
    <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Enlace de facebook:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="facebook" step="0.01" placeholder="Enlace a facebook..." value="{{$restaurant->facebook}}">
</div>

<div class="flex items-center justify-start w-full">
    <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Enlace de instagram:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="instagram" placeholder="Enlace a instagram..." value="{{$restaurant->instagram}}">
</div>

<div class="flex items-center justify-start w-full">
    <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Costo del envio:</label>
    <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="costoEnvio" step="0.01" placeholder="Precio del envio" value="{{$restaurant->costoEnvio}}">
</div>


      <div class="w-full flex justify-center items-center flex-row">
            <input type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Actualizar">
    </form>
    <a id="closeModalRestauranteBtn" class="ml-5 cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium">Cancelar</a>
    </div>
  </div>
</div>

<script>

const openModalRestauranteBtn = document.getElementById('openModalRestauranteBtn');
const closeModalRestaurantBtn = document.getElementById('closeModalRestauranteBtn');
const modalRestaurante = document.getElementById('modalRestaurante');
const modalOverlayRestaurante = document.createElement('div');
modalOverlayRestaurante.className = 'fixed inset-0 flex justify-center items-center z-1 hidden modal-overlay';
document.body.appendChild(modalOverlayRestaurante);

openModalRestauranteBtn.addEventListener('click', () => {
  modalRestaurante.classList.remove('hidden');
  modalOverlayRestaurante.classList.remove('hidden');
  document.body.classList.add('overflow-hidden'); // Evita que el scroll de la página esté disponible mientras el modal esté abierto
});

closeModalRestaurantBtn.addEventListener('click', () => {
  modalRestaurante.classList.add('hidden');
  modalOverlayRestaurante.classList.add('hidden');
  document.body.classList.remove('overflow-hidden'); // Restaura el scroll de la página al cerrar el modal
});


</script>
