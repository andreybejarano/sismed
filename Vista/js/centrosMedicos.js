var url_base = window.location.protocol + "//" + window.location.host;

$.post(url_base+'/centrosMedicos/listarCentrosMedicos', {}, function (data) {
    var datos = JSON.parse(data);
    var filas;
    var cont = 0;
    $.each(datos, function (i, v) {
        cont = cont + 1;
        filas += "<tr>";
        filas += "<td>" + v.nombreCentroMedico + "</td>";
        filas += "<td>" + v.telefonoCentroMedico + "</td>";
        filas += "<td>" + v.celularCentroMedico + "</td>";
        filas += "<td>" + v.direccionCentroMedico + "</td>";
        filas += "<td>" + v.correoCentroMedico + "</td>";
        filas += "<td>";
        filas += "<form action='" + url_base + "/centrosMedicos/editarCentroMedico' method='POST'>";
        filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarCentroMedico'><i class='fa fa-edit'></i></button>";
        filas += "<input type='hidden' name='idCentroMedico' value='" + v.idCentroMedico + "'>";
        filas += "</form>";
        filas += "</td>";
        filas += "<td>";
        filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarCentroMedico" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
        filas += "<div class = 'modal fade' id='modalEliminarCentroMedico" + cont + "' tabindex = '-1' role = 'dialog'>";
        filas += "<div class='modal-dialog'>";
        filas += "<div class='modal-content'>";
        filas += "<div class='modal-header'>";
        filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        filas += "<h4 class='modal-title'>Eliminar CentroMedico</h4>";
        filas += "</div>";
        filas += "<div class='modal-body'>";
        filas += "<p>¿Seguro que desea eliminar registro?</p>";
        filas += "</div>";
        filas += "<div class='modal-footer'>";
        filas += "<form action='" + url_base + "/centrosMedicos/eliminarCentroMedico' method='POST'>";
        filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
        filas += "<button class='btn btn-primary' type='submit' name='btnEliminarCentroMedico'> Aceptar </button>";
        filas += "<input type='hidden' name='idCentroMedico' value='" + v.idCentroMedico + "'>";
        filas += "</form>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</td>";
        filas += "</tr>";
    });
    $('#tblCentrosMedicos tbody').html(filas);
});

$('#btnBuscar').click(function () {
    var centroMedico = $('#txtBuscar').val();
    $.post(url_base+'/centrosMedicos/listarNombreCentroMedico', {centroMedico: centroMedico}, function (data) {
        var datos = JSON.parse(data);
        var filas;
        cont = 0;
        if (datos != false) {
            $.each(datos, function (i, v) {
                cont = cont + 1;
                filas += "<tr>";
                filas += "<td>" + v.nombreCentroMedico + "</td>";
                filas += "<td>" + v.telefonoCentroMedico + "</td>";
                filas += "<td>" + v.celularCentroMedico + "</td>";
                filas += "<td>" + v.direccionCentroMedico + "</td>";
                filas += "<td>" + v.correoCentroMedico + "</td>";
                filas += "<td>";
                filas += "<form action='" + url_base + "/centrosMedicos/editarCentroMedico' method='POST'>";
                filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarCentroMedico'><i class='fa fa-edit'></i></button>";
                filas += "<input type='hidden' name='idCentroMedico' value='" + v.idCentroMedico + "'>";
                filas += "</form>";
                filas += "</td>";
                filas += "<td>";
                filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarCentroMedico" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
                filas += "<div class = 'modal fade' id='modalEliminarCentroMedico" + cont + "' tabindex = '-1' role = 'dialog'>";
                filas += "<div class='modal-dialog'>";
                filas += "<div class='modal-content'>";
                filas += "<div class='modal-header'>";
                filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                filas += "<h4 class='modal-title'>Eliminar CentroMedico</h4>";
                filas += "</div>";
                filas += "<div class='modal-body'>";
                filas += "<p>¿Seguro que desea eliminar registro?</p>";
                filas += "</div>";
                filas += "<div class='modal-footer'>";
                filas += "<form action='" + url_base + "/centrosMedicos/eliminarCentroMedico' method='POST'>";
                filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                filas += "<button class='btn btn-primary' type='submit' name='btnEliminarCentroMedico'> Aceptar </button>";
                filas += "<input type='hidden' name='idCentroMedico' value='" + v.idCentroMedico + "'>";
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
            filas += "<td colspan='6'>No existe este Centro Medico</td>";
            filas += "</tr>";
        }
        $('#tblCentrosMedicos tbody').html(filas);
    });
});