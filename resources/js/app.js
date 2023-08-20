import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube tu imagen aquí",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        const myDropzone = this; // Capturar la referencia a Dropzone para usarla en el evento removedfile

        // Comprobar si hay una imagen seleccionada inicialmente y agregarla a Dropzone
        if (document.querySelector('[name="image"]').value.trim()) {
            const imagePublicada = {
                size: 1234,
                name: document.querySelector('[name="image"]').value,
            };

            // Agregar el archivo a Dropzone
            this.emit("addedfile", imagePublicada);
            this.emit("thumbnail", imagePublicada, "/uploads/" + imagePublicada.name);

            // Establecer la clase para mostrar el archivo cargado exitosamente
            imagePublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    },
});

// Evento de envío correcto de imagen
dropzone.on("success", function (file, response) {
    document.querySelector('[name="image"]').value = response.image;
});

// Envío cuando hay un error
dropzone.on("error", function (file, message) {
    console.log(message);
});

// Remover un archivo
dropzone.on("removedfile", function () {
    document.querySelector('[name="image"]').value = "";
});

// Dropzone 2

const dropzone2 = new Dropzone("#dropzone2", {
    dictDefaultMessage: "Sube tu imagen aquí",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        const myDropzone2 = this; // Capturar la referencia a Dropzone para usarla en el evento removedfile

        // Comprobar si hay una imagen seleccionada inicialmente y agregarla a Dropzone
        if (document.querySelector('[name="image2"]').value.trim()) {
            const imagePublicada2 = {
                size: 1234,
                name: document.querySelector('[name="image2"]').value,
            };

            // Agregar el archivo a Dropzone
            this.emit("addedfile", imagePublicada2);
            this.emit("thumbnail", imagePublicada2, "/uploads/" + imagePublicada2.name);

            // Establecer la clase para mostrar el archivo cargado exitosamente
            imagePublicada2.previewElement.classList.add("dz-success", "dz-complete");
        }
    },
});

// Evento de envío correcto de imagen
dropzone2.on("success", function (file, response) {
    document.querySelector('[name="image2"]').value = response.image;
});

// Envío cuando hay un error
dropzone2.on("error", function (file, message) {
    console.log(message);
});

// Remover un archivo
dropzone2.on("removedfile", function () {
    document.querySelector('[name="image2"]').value = "";
});
