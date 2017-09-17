var url_base = window.location.protocol + "//" + window.location.host;
$.post(url_base+'/empleados/listarEmpleados', {}, function (data) {
    var datos = JSON.parse(data);
    var filas;
    var cont = 0;
    $.each(datos, function (i, v) {
        cont = cont + 1;
        filas += "<tr>";
        filas += "<td>" + v.numeroIdentificacionEmpleado + "</td>";
        filas += "<td>" + v.tipoDocumento + "</td>";
        filas += "<td>" + v.nombresEmpleado + "</td>";
        filas += "<td>" + v.apellidosEmpleado + "</td>";
        filas += "<td>" + v.tipoGenero + "</td>";
        filas += "<td>" + v.fechaNacimientoEmpleado + "</td>";
        filas += "<td>" + v.tarjetaProfesionalEmpleado + "</td>";
        filas += "<td>" + v.descripcionCargo + "</td>";
        filas += "<td>" + v.descripcionEspecialidad + "</td>";
        filas += "<td>" + v.direccionEmpleado + "</td>";
        filas += "<td>" + v.telefonoEmpleado + "</td>";
        filas += "<td>" + v.movilEmpleado + "</td>";
        filas += "<td>" + v.correoEmpleado + "</td>";
        filas += "<td>" + v.estadoEmpleado + "</td>";
        filas += "<td>";
        filas += "<form action='" + url_base + "/empleados/editarEmpleado' method='POST'>";
        filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEmpleado'><i class='fa fa-edit'></i></button>";
        filas += "<input type='hidden' name='idEmpleado' value='" + v.idEmpleado + "'>";
        filas += "</form>";
        filas += "</td>";
        filas += "<td>";
        filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEmpleado" + cont + "' name='btnModalEliminarEmpleado'><i class='fa fa-close'></i></button>";
        filas += "<div class = 'modal fade' id='modalEliminarEmpleado" + cont + "' tabindex = '-1' role = 'dialog'>";
        filas += "<div class='modal-dialog'>";
        filas += "<div class='modal-content'>";
        filas += "<div class='modal-header'>";
        filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        filas += "<h4 class='modal-title'>Eliminar Empleado</h4>";
        filas += "</div>";
        filas += "<div class='modal-body'>";
        filas += "<p>¿Seguro que desea eliminar registro?</p>";
        filas += "</div>";
        filas += "<div class='modal-footer'>";
        filas += "<form action='" + url_base + "/empleados/eliminarEmpleado' method='POST'>";
        filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
        filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEmpleado'> Aceptar </button>";
        filas += "<input type='hidden' name='idEmpleado' value='" + v.idEmpleado + "'>";
        filas += "</form>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</td>";
        filas += "</tr>";
    });
    $('#tblEmpleados tbody').html(filas);
});

$('#btnBuscar').click(function () {
    var empleado = $('#txtBuscar').val();
    $.post(url_base+'/empleados/listarDocumentoEmpleado', {empleado: empleado}, function (data) {
        var datos = JSON.parse(data);
        var cont = 0;
        if (datos != false) {
            var filas;
            $.each(datos, function (i, v) {
                cont = cont + 1;
                filas += "<tr>";
                filas += "<td>" + v.numeroIdentificacionEmpleado + "</td>";
                filas += "<td>" + v.tipoDocumento + "</td>";
                filas += "<td>" + v.nombresEmpleado + "</td>";
                filas += "<td>" + v.apellidosEmpleado + "</td>";
                filas += "<td>" + v.tipoGenero + "</td>";
                filas += "<td>" + v.fechaNacimientoEmpleado + "</td>";
                filas += "<td>" + v.tarjetaProfesionalEmpleado + "</td>";
                filas += "<td>" + v.descripcionCargo + "</td>";
                filas += "<td>" + v.descripcionEspecialidad + "</td>";
                filas += "<td>" + v.direccionEmpleado + "</td>";
                filas += "<td>" + v.telefonoEmpleado + "</td>";
                filas += "<td>" + v.movilEmpleado + "</td>";
                filas += "<td>" + v.correoEmpleado + "</td>";
                filas += "<td>" + v.estadoEmpleado + "</td>";
                filas += "<td>";
                filas += "<form action='" + url_base + "/empleados/editarEmpleado' method='POST'>";
                filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEmpleado'><i class='fa fa-edit'></i></button>";
                filas += "<input type='hidden' name='idEmpleado' value='" + v.idEmpleado + "'>";
                filas += "</form>";
                filas += "</td>";
                filas += "<td>";
                filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEmpleado" + cont + "' name='btnModalEliminarEmpleado'><i class='fa fa-close'></i></button>";
                filas += "<div class = 'modal fade' id='modalEliminarEmpleado" + cont + "' tabindex = '-1' role = 'dialog'>";
                filas += "<div class='modal-dialog'>";
                filas += "<div class='modal-content'>";
                filas += "<div class='modal-header'>";
                filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                filas += "<h4 class='modal-title'>Eliminar Empleado</h4>";
                filas += "</div>";
                filas += "<div class='modal-body'>";
                filas += "<p>¿Seguro que desea eliminar registro?</p>";
                filas += "</div>";
                filas += "<div class='modal-footer'>";
                filas += "<form action='" + url_base + "/empleados/eliminarEmpleado' method='POST'>";
                filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEmpleado'> Aceptar </button>";
                filas += "<input type='hidden' name='idEmpleado' value='" + v.idEmpleado + "'>";
                filas += "</form>";
                filas += "</div>";
                filas += "</div>";
                filas += "</div>";
                filas += "</div>";
                filas += "</td>";
                filas += "</tr>";
            });
        } else {
            filas += "<tr>";
            filas += "<td colspan='6'>No existe Empleado con este Numero de documento</td>";
            filas += "</tr>";
        }
        $('#tblEmpleados tbody').html(filas);
    });
});