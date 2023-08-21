<div id="modalAgregarOpcionSeccion" class="fixed inset-0 flex justify-center items-center z-10 hidden">
    <div style="height: 90vh; width: 50vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
      <h3 class="text-blue-700 font-medium text-3xl">Agregar Sección de Extras</h3>
      <form action="{{ route('section_options.store') }}" method="POST" class="mt-5 flex justify-center items-start flex-col space-y-5">
        @csrf
        <div>
            <label style="width:160px;" class="pb-5 pr-5 text-blue-900 font-medium">Nombre:</label>
            <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="nombre" placeholder="Nombre">
        </div>
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
        <div>
            <label style="width:160px;" class="pb-5 pr-5 text-blue-900 font-medium">Disponibilidad:</label>
            <input type="hidden" name="disponibilidad" value="0">
            <input type="checkbox" name="disponibilidad" class="switch-input" value="1" {{ old('disponibilidad') ? 'checked="checked"' : '' }}>
        </div>
        <div>
            <label style="width:160px;" class="pb-5 pr-5 text-blue-900 font-medium">Obligatorio:</label>
            <input type="hidden" name="obligatorio" value="0">
            <input type="checkbox" name="obligatorio" class="switch-input" value="1" {{ old('obligatorio') ? 'checked="checked"' : '' }}>
        </div>
        <div class="w-full flex justify-center items-center flex-row">
            <input type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 font-medium" value="Agregar">
            <a id="closeModalAgregarOpcionSeccionBtn" class="ml-5 cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 font-medium">Cancelar</a>
        </div>
    </form>


    </div>
  </div>

  <script>
    const openModalAgregarOpcionSeccionBtn = document.getElementById('openModalBtn');
    const closeModalAgregarOpcionSeccionBtn = document.getElementById('closeModalAgregarOpcionSeccionBtn');
    const modalAgregarOpcionSeccion = document.getElementById('modalAgregarOpcionSeccion');
    const modalOverlay = document.createElement('div');
    modalOverlay.className = 'fixed inset-0 flex justify-center items-center z-1 hidden modal-overlay';
    document.body.appendChild(modalOverlay);

    openModalAgregarOpcionSeccionBtn.addEventListener('click', () => {
      modalAgregarOpcionSeccion.classList.remove('hidden');
      modalOverlay.classList.remove('hidden');
      document.body.classList.add('overflow-hidden'); // Evita que el scroll de la página esté disponible mientras el modal esté abierto
    });

    closeModalAgregarOpcionSeccionBtn.addEventListener('click', () => {
      modalAgregarOpcionSeccion.classList.add('hidden');
      modalOverlay.classList.add('hidden');
      document.body.classList.remove('overflow-hidden'); // Restaura el scroll de la página al cerrar el modal
    });
  </script>
