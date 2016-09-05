'use strict';

$(document).ready(function() {
    
    function guardarDimensiones (par1,par2,par3,par4) {
        var datos=[par1,par2,par3,par4];
        console.log(datos);
    }
    

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
                range: [0.00001, 1000000.01]
            },
            largo: {
                required: true,
                range: [0.00001, 1000000.01]
            },
            ancho: {
                required: true,
                range: [0.00001, 1000000.01]
            },
        },
        messages: {
            alto: {
                required: "Este campo es requerido",
                range: "Solo números positivos."
            },
            largo: {
                required: "Este campo es requerido",
                range: "Solo números positivos."
            },
            ancho: {
                required: "Este campo es requerido",
                range: "Solo números positivos."
            },

        },
        submitHandler: function() {
            var alto = $('#alto').val();
            var largo = $('#largo').val();
            var ancho = $('#ancho').val();
            var volumen = $('#volumen').val();
            console.log('Alto: ' + alto + '; Largo: ' + alto + '; Ancho: ' + ancho);
            console.log('Volumen: '+ volumen);
            guardarDatos(largo,alto,ancho,volumen);
            /*$.ajax({
                url: '../php/guardarDimensiones.php',
                type: 'default GET (Other values: POST)',
                dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: {alto: 'value1'},
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });*/
            
        },

    });

    $("#largo")
        .keyup(function() {
            var value = $('#largo').val() * $('#ancho').val() * $('#alto').val();
            $('#volumen').val(value);
        })
        .keyup();
    $("#ancho")
        .keyup(function() {
            var value = $('#largo').val() * $('#ancho').val() * $('#alto').val();
            $('#volumen').val(value);
        })
        .keyup();
    $("#alto")
        .keyup(function() {
            var value = $('#largo').val() * $('#ancho').val() * $('#alto').val();
            $('#volumen').val(value);
        })
        .keyup();

    
    var areaAbsorcion = $('#areaAbs').val();


    $('#guardar').on('click', function() {
        


    });

});
