$(document).ready(function () {


    $("#rruc").keyup(function (e) {
        if ($("#rruc").val().length == 11) {
            ConsultaRuc();
        }
    })

    $("#eruc").keyup(function (e) {
        if ($("#eruc").val().length == 11) {
            ConsultaRuc2();
        }
    })

});

function CerrarCargando() {
    $("#IdCargando").hide();
    $("#IdGrabarUsu").prop("disabled", false)
}


function ConsultaRuc() {

    var $ruc = $('#rruc').val();

    $("#IdCargando").show();
    $.ajax({
        type: 'POST',
        url: 'controlador/Cempresa.php?op=CONSULTA_RUC',
        data: {ruc: $ruc},
        dataType: "JSON",
        success: function (datos) {
            $("#IdCargando").hide();
            if (datos == 0) {
                $("#rruc,#rnombre,#restado,#rdireccion").val("");
                swal("RUC no se encuentra en la Busqueda ..", "Error", "error");


            }
            $('#rnombre').val(datos[1]);
            $('#rdireccion').val(datos[2]);
            $("#restado").val(datos[3]);
            return false;
        },
        error: function (e) {
            $("#IdCargando").hide();
            console.log(e);
        }
    });

}

function ConsultaRuc2() {

    var $ruc = $('#eruc').val();

    $("#IdCargando").show();
    $.ajax({
        type: 'POST',
        url: 'controlador/Cempresa.php?op=CONSULTA_RUC',
        data: {ruc: $ruc},
        dataType: "JSON",
        success: function (datos) {
            $("#IdCargando").hide();
            if (datos == 0) {
                $("#eruc,#enombre,#eestado,#edireccion").val("");
                swal("RUC no se encuentra en la Busqueda ..", "Error", "error");


            }
            $('#enombre').val(datos[1]);
            $('#edireccion').val(datos[2]);
            $("#eestado").val(datos[3]);
            return false;
        },
        error: function (e) {
            $("#IdCargando").hide();
            console.log(e);
        }
    });

}


function LlenarProvincias($departamento) {

    $.post("controlador/Cubigeo.php", {departamento: $departamento, accion: "provincias"}, function (provincias) {

        $('select[name="provincias"]').html(provincias);
    })


}

function LlenarDistritos($provincia) {

    $.post("controlador/Cubigeo.php", {provincia: $provincia, accion: "distritos"}, function (distritos) {

        $('select[name="distritos"]').html(distritos);
    })
}
$("#table-empresa").dataTable({
    "aProcessing": true, //Activamos el procesamiento del datatables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tabla
    buttons: [

    ],
    "ajax":
            {
                url: 'controlador/Cempresa.php?op=listar',
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


function editar(id, ruc, nombre, estado, direccion, telefono, pass, representante, dni, cell) {
    $("#ModalEditar").modal("show");
    $("#eid").val(id);
    $("#edni").val(dni);
    $("#eruc").val(ruc);
    $("#enombre").val(nombre);
    $("#eestado").val(estado);

    $("#edireccion").val(direccion);
    $("#etelefono").val(telefono);
    $("#epass").val(pass);
    $("#erepresentante").val(representante);
    $("#ecell").val(cell);

}

function eliminar(id) {
    $("#ModalEliminar").modal("show");
    $("#eliminar").val(id);
}


$("#formEditar").on("submit", function (e) {
    e.preventDefault();


    $.ajax({

        url: 'controlador/Cempresa.php?op=editar',
        type: "POST",
        data: {id: $("#eid").val(), nombre: $("#enombre").val(), dni: $("#edni").val(), ruc: $("#eruc").val(),

            direccion: $("#edireccion").val(), telefono: $("#etelefono").val(), pass: $("#epass").val(), representante: $("#erepresentante").val(),
            cell: $("#ecell").val(), estado: $("#eestado").val()},

        success: function (data) {
            $('#ModalEditar').modal('hide');
            $('#table-empresa').DataTable().ajax.reload();
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
            console.log(e);
            swal("Datos no editados Correctamente ..", "Error", "error");
        }
    });
});
$("#formRegistrar").on("submit", function (e) {
    e.preventDefault();

    $.ajax({

        url: 'controlador/Cempresa.php?op=registrar',
        type: "POST",
        data: {
            nombre: $("#rnombre").val(), estado: $("#restado").val(), dni: $("#rdni").val(), ruc: $("#rruc").val(),

            direccion: $("#rdireccion").val(), telefono: $("#rtelefono").val(), pass: $("#rpass").val(), representante: $("#rrepresentante").val(),
            cell: $("#rcell").val()
        },

        success: function (data) {
            $('#ModalRegistrar').modal('hide');
            $('#table-empresa').DataTable().ajax.reload();
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

        url: 'controlador/Cempresa.php?op=eliminar',
        type: "POST",
        data: {id: $("#eliminar").val()},

        success: function (data) {
            $('#ModalEliminar').modal('hide');
            $('#table-empresa').DataTable().ajax.reload();
            console.log(data);
            if (data == 1) {

                swal("Datos eliminados Correctamente ..", "Felicitaciones", "success");

                return false;
            } else
            if (data == 0) {
                swal("Datos no eliminados Correctamente ..", "Error", "error");
                return false;
            } else {
                swal("Datos no eliminados Correctamente ..", "Error", "error");
            }

        },
        error: function (e) {
            console.log(e);
            swal("Datos no eliminados Correctamente ..", "Error", "error");
        }
    });
});