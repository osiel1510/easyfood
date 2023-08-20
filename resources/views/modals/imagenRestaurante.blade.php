<div id="modalImagenRestaurante" class="fixed inset-0 flex justify-center items-center z-10 hidden">
  <div style="height: 90vh; width: 50vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
    <h3 class="text-blue-700 font-medium text-3xl">Subir nueva imagen</h3>

      <form action ="{{route('imagenes.store')}}"   method="POST" class="dropzone mt-5 flex justify-center items-start flex-col" enctype="multipart/form-data" id="dropzone" >
        @csrf
    </form>

    <form style="" action="{{route('post.update')}}" method="POST" class="mt-5 flex justify-center items-start flex-col">
      @csrf
      @method('PATCH')
      <input type ="hidden" name="restaurant_id" value="{{$restaurant->id}}">
      <input type = "hidden" name="image" value="">
      <input type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Actualizar">
    </form>
    <a id="closeModalImagenRestauranteBtn" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium">Cancelar</a>
    </div>
  </div>
</div>

<script>

const openModalImagenRestauranteBtn = document.getElementById('openModalImagenRestauranteBtn');
const closeModalImagenRestaurantBtn = document.getElementById('closeModalImagenRestauranteBtn');
const modalImagenRestaurante = document.getElementById('modalImagenRestaurante');
const modalOverlayImagenRestaurante = document.createElement('div');
modalOverlayImagenRestaurante.className = 'fixed inset-0 flex justify-center items-center z-1 hidden modal-overlay';
document.body.appendChild(modalOverlayImagenRestaurante);

openModalImagenRestauranteBtn.addEventListener('click', () => {
  modalImagenRestaurante.classList.remove('hidden');
  modalOverlayImagenRestaurante.classList.remove('hidden');
  document.body.classList.add('overflow-hidden'); // Evita que el scroll de la página esté disponible mientras el modal esté abierto
});

closeModalImagenRestaurantBtn.addEventListener('click', () => {
  modalImagenRestaurante.classList.add('hidden');
  modalOverlayImagenRestaurante.classList.add('hidden');
  document.body.classList.remove('overflow-hidden'); // Restaura el scroll de la página al cerrar el modal
});


</script>
