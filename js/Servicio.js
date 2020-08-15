
$("#table-servicio").dataTable({
    "aProcessing": true, //Activamos el procesamiento del datatables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tabla
    buttons: [

    ],
    "ajax":
            {
                url: 'controlador/Cservicio.php?op=listar',
                type: "POST",
                dataType: "json",
                error: function (e) {
                    console.log("Error" + e.responseText);
                }
            },
    "bDestroy": true,
    "responsive": true,
    "bInfo": true,
    "iDisplayLength": 10, //Por cada 10 registros hace una paginación
    "order": [[0, "asc"]], //Ordenar (columna,orden)

    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {

            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"

        },
        "oAria": {

            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"

        }

    }

});
function Detalle(servicio){
     $.post('Adm_DetalleServicio.php', {servicio:servicio}, function (datitos) {
        $("#IdCuerpo").html(datitos);
    })
    
}

function editar(id, nombre, estado) {
    $("#ModalEditar").modal("show");
    $("#eid").val(id);
    $("#enombre").val(nombre);
    $("#eestado").val(estado);
    $("#eestado").change();


}

function eliminar(id) {
    $("#ModalEliminar").modal("show");
    $("#eliminar").val(id);
}


$("#formEditar").on("submit", function (e) {
    e.preventDefault();


    $.ajax({

        url: 'controlador/Cservicio.php?op=editar',
        type: "POST",
        data: {id: $("#eid").val(), nombre: $("#enombre").val(), estado: $("#eestado").val()},

        success: function (data) {
            $('#ModalEditar').modal('hide');
            $('#table-servicio').DataTable().ajax.reload();
            console.log(data);
            if (data == 1) {

                swal("Datos editados Correctamente ..", "Felicitaciones", "success");

                return false;
            } else
            if (data == 0) {
                swal("Datos no editados Correctamente ..", "Error", "error");
                return false;
            } else {
                swal("Datos no editados Correctamente ..", "Error", "error");
            }



        },
        error: function (e) {

            swal("Datos no editados Correctamente ..", "Error", "error");
            console.log(e);

        }
    });
});
$("#formRegistrar").on("submit", function (e) {
    e.preventDefault();

    $.ajax({

        url: 'controlador/Cservicio.php?op=registrar',
        type: "POST",
        data: {
            nombre: $("#rnombre").val(), estado: $("#restado").val()
        },

        success: function (data) {
            $('#ModalRegistrar').modal('hide');
            $('#table-servicio').DataTable().ajax.reload();
            console.log(data);
            if (data == 1) {

                swal("Datos registrados Correctamente ..", "Felicitaciones", "success");

                return false;
            } else
            if (data == 0) {
                swal("Datos no registrados Correctamente ..", "Error", "error");
                return false;
            } else {
                swal("Datos no registrados Correctamente ..", "Error", "error");
            }

        },
        error: function (e) {
            console.log(e);
            swal("Datos no registrados Correctamente ..", "Error", "error");
        }
    });
});


$("#formEliminar").on("submit", function (e) {
    e.preventDefault();

    $.ajax({

        url: 'controlador/Cservicio.php?op=eliminar',
        type: "POST",
        data: {id: $("#eliminar").val()},

        success: function (data) {
            $('#ModalEliminar').modal('hide');
            $('#table-servicio').DataTable().ajax.reload();
            console.log(data);
            if (data == 1) {

                swal("Datos eliminados Correctamente ..", "Felicitaciones", "success");

                return false;
            }else
            if (data == 0) {
                swal("Datos no eliminados Correctamente ..", "Error", "error");
                return false;
            }else{
             swal("Datos no eliminados Correctamente ..", "Error", "error");
            }

        },
        error: function (e) {
            console.log(e);
            swal("Datos no eliminados Correctamente ..", "Error", "error");
        }
    });
});/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


