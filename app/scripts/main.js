'use strict';
$(document).ready(function() {
    $("#ok").hide();
    $('#formularioEntrada').validate({
        rules: {
            emailEntrar: {
                required: true,
                email: true,
            },
            contrasenaEntrar: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            emailEntrar: {
                required: 'Escribe tu email',
                email: 'Por favor, escribe una dirección de correo válida.',
            },
            contrasenaEntrar: {
                required: 'Por favor, escribe tu contraseña',
                minlength: 'Contraseña de minimo 10 caracteres',
            },

        },
        submitHandler: function() {
            console.log('test');
            emailEntrar = $('#emailEntrar').val();
            contrasenaEntrar = $('#contrasenaEntrar').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../php/comprobarIdentidad.php',
                data: {
                    emailEntrar: email,
                    contrasenaEntrar: contrasena,
                },
                success: function(data) {
                    console.log('test');
                    if (data[0].estado == 0) {
                        $.growl({
                            icon: "glyphicon glyphicon-ok",
                            message: "INSERCCIÓN CORRECTA"

                        }, {
                            type: "success"
                        });
                    } else {

                        $.growl({

                            icon: "glyphicon glyphicon-remove",
                            message: "ERROR: fallo al hacer el doctor"

                        }, {
                            type: "danger"
                        });
                    }

                },
                complete: {}
            });
        }
    });
    $('#formulario').validate({
        rules: {
            nombre: {
                required: true,
            },
            apellidos: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            repemail: {
                required: true,
                email: true,
                equalTo: email,
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
                required: 'Campo requerido',
                email: 'Por favor, escribe una dirección de correo válida.',
                equalTo: 'Los emails no coinciden.',
            },
            contrasena: {
                required: 'Por favor, escribe tu contraseña',
                minlength: 'Contraseña de minimo 10 caracteres',
            },

        },
        submitHandler: function() {
            /*var datos = 'nombre='+$('#nombre').val()+'&apellidos='+$('#apellidos').val()+'&email='+$('#email').val()+'&contrasena='+$('#contrasena').val();*/
            nombreNuevo = $('#nombre').val();
            apellidosNuevo = $('#apellidos').val();
            emailNuevo = $('#email').val();
            contrasenaNueva = $('#contrasena').val();
            $.ajax({
                type: 'POST',
                url: '../php/nuevo.php',
                dataType: 'json',
                /*data: datos,     ---- ES LO MISMO ----  */
                data: {
                    nombreNuevo: nombre,
                    apellidosNuevo: apellidos,
                    emailNuevo: email,
                    contrasenaNueva: contrasena
                },
                success: function(data) {
                    console.log('test');
                    if (data[0].estado == 0) {

                        $.growl({

                            icon: "glyphicon glyphicon-ok",
                            message: "INSERCCIÓN CORRECTA"

                        }, {
                            type: "success"
                        });
                    } else {

                        $.growl({

                            icon: "glyphicon glyphicon-remove",
                            message: "ERROR: fallo al hacer el doctor"

                        }, {
                            type: "danger"
                        });
                    }

                },
                complete: {}
            });



        }
    });
    $('#contrasena').on('focusin', function() {

        $('#contrasena').complexify({
            minimumChars: 6
        }, function(valid, complexity) {
            $('#complejidad').val(complexity);
            var complejo = complexity;

            if (complexity < 20 && complexity > 0) {
                $('#labelComplejidad').html('Contraseña débil.');
            } else if (complexity >= 20 && complexity < 40) {
                $('#labelComplejidad').html('Contraseña normal.');
            } else if (complexity == 0) {
                $('#labelComplejidad').html('');
            } else {
                $('#labelComplejidad').html('Contraseña compleja.');
            }
        });
    });
});
