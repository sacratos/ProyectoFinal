'use strict';
$(document).ready(function() {
    $('#formularioEditar').hide();
    $('#formularioCrear').hide();
    $('#edicionok').hide();
    $('#edicionerr').hide();
    $('#materialCreado').hide();
    $('#creaMat').click(function(e) {
        e.preventDefault();

        //oculto tabla muestro form
        $('#tabla').fadeOut(100);
        $('#formularioCrear').fadeIn(100);
        //cargarClinicaCrear();

        //VALIDACION FORMULARIO CREAR
        $('#formCrear').validate({
            rules: {
                materialNuevo: {
                    required: true,
                },
                superficieNueva: {
                    required: true,
                    number: true
                },
                absorcionNueva: {
                    required: true,
                    number: true
                }
            },
            messages: {
                materialNuevo: {
                    required: "Este campo es requerido",
                },
                superficieNueva: {
                    required: "Este campo es requerido",
                    number: "Solo dígitos"
                },
                absorcionNueva: {
                    required: "Este campo es requerido",
                    number: "Solo dígitos"
                },

            },
            submitHandler: function() {
                var materialNuevo = $('#materialNuevo').val();
                var superficieNueva = $('#superficieNueva').val();
                var absorcionNueva = $('#absorcionNueva').val();
                console.log('Material: ' + materialNuevo + '; Superficie: ' + superficieNueva + '; Absorcion: ' + absorcionNueva);
                
                $('#formularioCrear').fadeOut(100);
                $('#tabla').fadeIn(100);
                $('#materialCreado').show(1000);
                
            }
        });
        //FIN VALIDACION FORMULARIO CREAR

    });
    $('#cancelarCrear').on('click', function(e) {
        e.preventDefault();
        $('#formularioCrear').fadeOut(100);
        $('#tabla').fadeIn(100);
    });
    $('#cancelarEditar').on('click', function(e) {
        e.preventDefault();
        $('#formularioEditar').fadeOut(100);
        $('#tabla').fadeIn(100);
    });
    var miTabla;
    miTabla = $('#miTabla').dataTable({
        'processing': true,
        'serverSide': true,
        'ajax': 'php/cargar_tabla_materiales.php',
        'language': {
            'sProcessing': 'Procesando...',
            'sLengthMenu': 'Mostrar _MENU_ registros',
            'sZeroRecords': 'No se encontraron resultados',
            'sEmptyTable': 'Ningún dato disponible en esta tabla',
            'sInfo': 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            'sInfoEmpty': 'Mostrando registros del 0 al 0 de un total de 0 registros',
            'sInfoFiltered': '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix': '',
            'sSearch': 'Buscar:',
            'sUrl': '',
            'sInfoThousands': ',',
            'sLoadingRecords': 'Cargando...',
            'oPaginate': {
                'sFirst': 'Primero',
                'sLast': 'Último',
                'sNext': 'Siguiente',
                'sPrevious': 'Anterior'
            },
            'oAria': {
                'sSortAscending': ': Activar para ordenar la columna de manera ascendente',
                'sSortDescending': ': Activar para ordenar la columna de manera descendente'
            }
        },
        'columns': [{
            'data': 'nombrematerial'
        }, {
            'data': 'porcentaje_absorcion'
        }, {
            'data': 'superficie',
        }, {
            'data': 'idmaterial',
            /*añadimos las clases editarbtn y borrarbtn para procesar los eventos click de los botones. No lo hacemos mediante id ya que habrá más de un
            botón de edición o borrado*/
            'render': function(data) {
                return '<a class="btn btn-primary editarbtn" href=http://localhost/php/modificar_material.php?idmaterial=' + data + '>Editar</a><a data-toggle="modal" data-target="#basicModal"  class="btn btn-warning borrarbtn" href=http://localhost/php/borrarmaterial.php?idmaterial=' + data + '>Borrar</a>';
            }
        }]
    });
    $('#miTabla').on('click', '.editarbtn', function(e) {
        e.preventDefault();

        $('#tabla').fadeOut(100);
        $('#formularioEditar').fadeIn(100);

        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        $('#idDoctor').val(aData.idDoctor);
        $('#nombre').val(aData.nombre);
        $('#numcolegiado').val(aData.numcolegiado);
        $('#clinicas').val(aData.nombreClinica);
        // var prueba=$('#idClinica').val(aData.idDoctor);
        cargarTarifas();

        // alert(aData.idClinica);
        //selecciono las que estaban
        var str = aData.idClinica;

        str = str.split(",");

        //cargo el select con las que ya estaban
        $('#clinicas').val(str);

        /*
           $('#clinicas').each(function() {
                 str.push($(this).val());
            });
*/
        // $('#clinicas').sel('2');
        // $('#clinicas').val(aData.idDoctor);



    });
    $('#miTabla').on('click', '.borrarbtn', function(e) {
        //e.preventDefault();
        var nRow = $(this).parents('tr')[0];
        var aData = miTabla.row(nRow).data();
        idDoctor = aData.idDoctor;


    });

    $('#basicModal').on('click', '#confBorrar', function(e) {


        $.ajax({

            type: 'POST',
            dataType: 'json',
            url: 'php/borrar_doctor.php',
            data: {
                id_doctor: idDoctor
            },
            error: function(xhr, status, error) {

                $.growl({

                    icon: "glyphicon glyphicon-remove",
                    message: "Error al borrar!"

                }, {
                    type: "danger"
                });
            },
            success: function(data) {

                var $mitabla = $("#miTabla").dataTable({ bRetrieve: true });
                $mitabla.fnDraw();

                $.growl({
                    icon: "glyphicon glyphicon-remove",
                    message: "Borrado realizado con exito!"

                }, {
                    type: "success"
                });
            },
            complete: {

            }
        });
        $('#tabla').fadeIn(100);
    });

    //VALIDACION DEL FORMULARIO EDITAR
    $('#formEditar').validate({
        rules: {
            material: {
                required: true,
                lettersonly: true
            },
            superficie: {
                required: true,
                digits: true
            },
            absorcion: {
                required: true
            }
        },
        submitHandler: function() {

            idmaterial = $('#idMaterial').val();
            nombre_material = $('#material').val();
            porcentaje_absorcion = $('#absorcion').val();
            superficie = $('#superficie').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'php/modificar_material.php',

                data: {
                    idmaterial: idmaterial,
                    nombre_material: nombre_material,
                    porcentaje_absorcion: porcentaje_absorcion,
                    superficie: superficie

                },
                error: function(xhr, status, error) {


                    $.growl({

                        icon: "glyphicon glyphicon-remove",
                        message: "Error al editar!"

                    }, {
                        type: "danger"
                    });

                },
                success: function(data) {
                    var $mitabla = $("#miTabla").dataTable({ bRetrieve: true });
                    $mitabla.fnDraw();
                    if (data[0].estado == 0) {
                        $.growl({
                            icon: "glyphicon glyphicon-ok",
                            message: "Material editado correctamente!"

                        }, {
                            type: "success"
                        });
                    } else {

                        $.growl({
                            icon: "glyphicon glyphicon-remove",
                            message: "Error al editar el material!"
                        }, {
                            type: "danger"
                        });
                    }
                },
                complete: {}
            });
            $('#tabla').fadeIn(100);
            $('#formularioEditar').fadeOut(100);
        }
    });
    //FIN VALIDACION FORMULARIO EDITAR




});
