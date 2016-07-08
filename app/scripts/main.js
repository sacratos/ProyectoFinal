'use strict';
$(document).ready(function() {
    $('#formulario').validate({
        rules: {
            nombre: {
                required: true,
                lettersonly: true,
            },
            apellidos: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                remote: 'php/validarEmail.php'
            },
            repemail: {
                email: true,
                equalTo: email1,
            },
            contrasena: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            nombre: {
                required: 'Escribe tu nombre',
                lettersonly: 'Por favor, sólo caracteres',
            },
            apellidos: {
                required: 'Escribe tus apellidos',
            },
            email: {
                required: 'Escribe tu email',
                email: 'Por favor, escribe una dirección de correo válida.',
            },
            repemail: {
                email: 'Por favor, escribe una dirección de correo válida.',
                equalTo: 'Los emails no coinciden.',
            },
            contrasena: {
                required: 'Por favor, escribe tu contraseña',
                minlength: 'Contraseña de minimo 10 caracteres',
            },
           
        }
    });