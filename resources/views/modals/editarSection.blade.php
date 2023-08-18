<div id="modalEditar" class="fixed inset-0 flex justify-center items-center z-10 hidden">
    <div style="height: 90vh; width: 50vw;" class="bg-white flex justify-center items-center flex-col shadow-lg rounded-xl">
      <h3 class="text-blue-700 font-medium text-3xl">Agregar Sección</h3>
      <form id="formularioEditar" action="{{ route('secciones.update', ['id' => -1]) }}" method="POST" class="mt-5 flex justify-center items-start flex-col">
        @csrf
        @method('put')
        <div class="flex items-center justify-start w-full">
          <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Nombre de la sección:</label>
  <input id="nombreEditar"  class="border-blue-900 border rounded pt-1 pb-1 pl-2 border focus:outline-none" type="text" name="nombre" placeholder="Nombre">
          <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
  </div>
  <div>
      <label style="width:160px;" class="pb-5 pr-5 mt-5 text-blue-900 font-medium">Disponibilidad:</label>
      <input id="disponibilidadEditar" type="checkbox" name="disponibilidad" class="switch-input" value="1" {{ old('disponibilidad') ? 'checked="checked"' : '' }}/>
  </div>
        <div class="w-full flex justify-center items-center flex-row">
              <input type="submit" class="cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium" value="Agregar">
      </form>
      <a id="closeModalEditarBtn" class="ml-5 cursor-pointer self-center text-center mt-3 text-white bg-blue-700 pt-2 pb-2 pl-3 pr-3 rounded hover:bg-blue-800 mb-5 font-medium">Cancelar</a>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>

    const modalEditar = document.getElementById('modalEditar');
    const modalOverlayEditar = document.createElement('div');
    modalOverlayEditar.className = 'fixed inset-0 flex justify-center items-center z-1 hidden modal-overlay';
    document.body.appendChild(modalOverlayEditar);
    const closeModalEditarBtn = document.getElementById('closeModalEditarBtn');


    $(document).ready(function() {
        var elementosEditar = $(".editar");
        var elementosNombre = $(".nombre");
        var elementosDisponibilidad = $(".disponibilidad");

        let inputNombre = $("#nombreEditar");
        let inputDisponibilidad = $("#disponibilidadEditar");

        elementosEditar.each(function(index, element) {
            $(element).click(function() {
                let nombre = $(elementosNombre[index]);
                let disponibilidad = $(elementosDisponibilidad[index]);

                inputNombre.val(nombre.text());

                if(disponibilidad.text().trim() === 'Si'){
                    inputDisponibilidad.attr("checked", true);
                }else{
                    inputDisponibilidad.attr("checked", false);
                }

                var nombreId = nombre.data("id"); // Reemplaza "#nombre" con tu selector correcto
                var nuevaAccion = "{{ route('secciones.update', ['id' => ':nombreId']) }}";
                nuevaAccion = nuevaAccion.replace(':nombreId', nombreId);
                $("#formularioEditar").attr("action", nuevaAccion);

                // console.log(nombre.data("id"));
                modalEditar.classList.remove('hidden');
                modalOverlayEditar.classList.remove('hidden');
                document.body.classList.add('overflow-hidden'); // Evita que el scroll de la página esté disponible mientras el modal esté abierto
            });
        });

        closeModalEditarBtn.addEventListener('click', () => {
            modalEditar.classList.add('hidden');
            modalOverlayEditar.classList.add('hidden');
            document.body.classList.remove('overflow-hidden'); // Restaura el scroll de la página al cerrar el modal
        });
    });

  </script>
