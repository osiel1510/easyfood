<div id="modalAgregarOption" class="fixed inset-0 flex justify-center items-center z-10 hidden">
    <div style="height: 90vh; width: 50vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
      <h3 class="text-blue-700 font-medium text-3xl">Agregar Extra</h3>
      <form id="myForm" action="{{ route('options.store') }}" method="POST" class="mt-2 flex justify-center items-start flex-col">
        @csrf
        <div class="mt-5 flex items-center justify-start w-full">
          <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Nombre:</label>
          <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="nombre" placeholder="Nombre">
        </div>
        <div class="flex items-center justify-start w-full">
          <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Precio:</label>
          <input class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="number" name="precio" placeholder="Precio" step="0.01">
        </div>
        <div>
            <input type="hidden" name="disponibilidad" value="0">
            <label style="width:160px;" class="pb-5 pr-5 text-blue-900 font-medium">Disponibilidad:</label>
            <input type="checkbox" name="disponibilidad" class="switch-input" value="1" {{ old('disponibilidad') ? 'checked="checked"' : '' }}>
          </div>
        <div class="flex items-center justify-start w-full">
            <label style="width:160px;" class="pb-5 pr-5 mt-2 text-blue-900 font-medium">Sección:</label>

            <select name="section_options_id" class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none">
                @foreach($sectionOptions as $sectionOption)
                  <option value="{{ $sectionOption->id }}">{{ $sectionOption->nombre }}</option>
                @endforeach
              </select>

        </div>
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
      </form>

      <div class="w-full flex justify-center items-center flex-row">
        <input id="submitButton" type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Agregar">
        <a id="closeModalBtn" class="ml-5 cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium">Cancelar</a>
      </div>
    </div>
  </div>

  <script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modalAgregarOption');
    const modalOverlay = document.createElement('div');
    modalOverlay.className = 'fixed inset-0 flex justify-center items-center z-1 hidden modal-overlay';
    document.body.appendChild(modalOverlay);

    openModalBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      modalOverlay.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    });

    closeModalBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
      modalOverlay.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    });

    const myForm = document.getElementById('myForm');
    const submitButton = document.getElementById('submitButton');

    submitButton.addEventListener('click', function(event) {
      event.preventDefault(); // Evita que se envíe el formulario automáticamente

      // Aquí puedes realizar validaciones adicionales si es necesario

      myForm.submit(); // Envía el formulario
    });
  </script>
