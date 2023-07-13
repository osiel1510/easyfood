
//import './bootstrap';


//Configuración de Dropzone

import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone ('#dropzone', {
    diqtDefaultMessage:"Sube tu image aqui",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple:false,

    //Trabajando con la image en el contenedor dropzone
    init:function(){
        if(document.querySelector('[name="image"]').value.trim()){
            const imagePublicada= {};
            imagePublicada.size = 1234
            imagePublicada.name=document.querySelector('[name="image"]').value;
            this.options.addedFile.call(this,imagePublicada);
            this.options.thumbnail.call(
            this,
            imagePublicada,
            '/uploads/($imagePublicada.name)'
            );

            imagePublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    }

});

//Eventos de Dropzone
// dropzone.on('sending', function(file, xhr, formdata){
//     console.log(file);
// });

//Evento de envio correcto de image
dropzone.on('success', function(file,response){
    document.querySelector('[name="image"]').value  =response.image;
});

//Envio cuando hay un error
dropzone.on('error', function(file,message){
    console.log(message);
});

//Remover un archivo
dropzone.on('removedfile', function(){
    document.querySelector('[name="image"]').value('[name=""]')
});