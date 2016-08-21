'use strict';

$(document).ready(function() {

    $('[data-toggle="popover"]').popover();

    //Cargar imagen de Sala:
    $(function() {
        $('#file-input').change(function(e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida').attr("src", result);
        }
    });

    $('#form1').validate({
        rules: {
            nombresala: {
                required: true,
            },
            descripcion: {
                required: true,
            },
        },
        messages: {
            nombresala: {
                required: "Este campo es requerido",
            },
            descripcion: {
                required: "Este campo es requerido",
            },

        },
        submitHandler: function() {
            var nombresala = $('#nombresala').val();
            var descripcion = $('#descripcion').val();
            console.log('Nombre: ' + nombresala + '; Descripcion: ' + descripcion);
        },

    });

    $('#form2').validate({
        rules: {
            alto: {
                required: true,
                number: true
            },
            largo: {
                required: true,
                number: true
            },
            ancho: {
                required: true,
                number: true
            },
        },
        messages: {
            alto: {
                required: "Este campo es requerido",
                number: "Solo dígitos"
            },
            largo: {
                required: "Este campo es requerido",
                number: "Solo dígitos"
            },
            ancho: {
                required: "Este campo es requerido",
                number: "Solo dígitos"
            },

        },
        submitHandler: function() {
            var alto = $('#alto').val();
            var largo = $('#largo').val();
            var ancho = $('#ancho').val();
            console.log('Alto: ' + alto + '; Largo: ' + alto + '; Ancho: ' + ancho);
        },

    });

    var volumen = $('#volumen').val();
    volumen = 2;
    $('#largo').on('focusout', function() {
        if ($('#largo').val()!="") {
            volumen += $('#largo').val();

        }
    });


});
