'use strict';
$(document).ready(function() {
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
    $('#form1').validate({
        rules: {
            alto: {
                required: true,
                digits: true
            },
            largo: {
                required: true,
                digits: true
            },
            ancho: {
                required: true,
                digits: true
            },
        },
        messages: {
            alto: {
                required: "este campo es requerido",
                digits: "solo dígitos"
            },
            largo: {
                required: "este campo es requerido",
                digits: "solo dígitos"
            },
            ancho: {
                required: "este campo es requerido",
                digits: "solo dígitos"
            },

        },
        submitHandler: function() {
            var alto = $('#alto').val();
            var largo = $('#largo').val();
            var ancho = $('#ancho').val();
            console.log('Alto: ' + alto + '; Largo: ' + alto + '; Ancho: ' + ancho);
        },

    });

});
