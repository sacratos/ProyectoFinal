'use strict';
$(document).ready(function() {
	console.log('test');
    $("#search").css("opacity", 0.7);
    $("#search").on('focusin', function() {
            $("#search").css({ translate: ['60px', '300px'] });
            console.log('test');
            /*$("#search").transition({ width: '300px' }, 100);*/

        })
        /* .on('click', function() {
             console.log('test');
             $("#search").transition({ opacity: 1 }, 100);
             
         });*/
    ;

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
