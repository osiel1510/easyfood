
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

const dropzone2 = new Dropzone ('#dropzone2', {
    diqtDefaultMessage:"Sube tu image aqui",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple:false,

    //Trabajando con la image en el contenedor dropzone
    init:function(){
        if(document.querySelector('[name="image2"]').value.trim()){
            const imagePublicada2= {};
            imagePublicada2.size = 1234
            imagePublicada2.name=document.querySelector('[name="image2"]').value;
            this.options.addedFile.call(this,imagePublicada2);
            this.options.thumbnail.call(
            this,
            imagePublicada2,
            '/uploads/($imagePublicada.name)'
            );

            imagePublicada2.previewElement.classList.add(
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
dropzone2.on('success', function(file,response){
    document.querySelector('[name="image2"]').value  =response.image;
});

//Envio cuando hay un error
dropzone2.on('error', function(file,message){
    console.log(message);
});

//Remover un archivo
dropzone2.on('removedfile', function(){
    document.querySelector('[name="image2"]').value('[name=""]')
});
