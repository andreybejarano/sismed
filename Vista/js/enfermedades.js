var url_base = window.location.protocol + "//" + window.location.host;
$.post(url_base+'/enfermedades/listarEnfermedades', {}, function (data) {
    var datos = JSON.parse(data);
    var filas;
    var cont = 0;
    $.each(datos, function (i, v) {
        cont = cont + 1;
        filas += "<tr>";
        filas += "<td>" + v.nombreEnfermedad + "</td>";
        filas += "<td>" + v.sintomatologiaEnfermedad + "</td>";
        filas += "<td>" + v.tratamientoEnfermedad + "</td>";
        filas += "<td>";
        filas += "<form action='" + url_base + "/enfermedades/editarEnfermedad' method='POST'>";
        filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEnfermedad'><i class='fa fa-edit'></i></button>";
        filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
        filas += "</form>";
        filas += "</td>";
        filas += "<td>";
        filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEnfermedad" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
        filas += "<div class = 'modal fade' id='modalEliminarEnfermedad" + cont + "' tabindex = '-1' role = 'dialog'>";
        filas += "<div class='modal-dialog'>";
        filas += "<div class='modal-content'>";
        filas += "<div class='modal-header'>";
        filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        filas += "<h4 class='modal-title'>Eliminar Enfermedad</h4>";
        filas += "</div>";
        filas += "<div class='modal-body'>";
        filas += "<p>¿Seguro que desea eliminar registro?</p>";
        filas += "</div>";
        filas += "<div class='modal-footer'>";
        filas += "<form action='" + url_base + "/enfermedades/eliminarEnfermedad' method='POST'>";
        filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
        filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEnfermedad'> Aceptar </button>";
        filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
        filas += "</form>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</td>";
        filas += "</tr>";
    });
    $('#tblEnfermedades tbody').html(filas);
});

$('#btnBuscar').click(function () {
    var enfermedad = $('#txtBuscar').val();
    $.post(url_base+'/enfermedades/listarNombreEnfermedad', {enfermedad: enfermedad}, function (data) {
        var datos = JSON.parse(data);
        var filas;
        cont = 0;
        if (datos != false) {
            $.each(datos, function (i, v) {
                cont = cont + 1;
                filas += "<tr>";
                filas += "<td>" + v.nombreEnfermedad + "</td>";
                filas += "<td>" + v.sintomatologiaEnfermedad + "</td>";
                filas += "<td>" + v.tratamientoEnfermedad + "</td>";
                filas += "<td>";
                filas += "<form action='" + url_base + "/enfermedades/editarEnfermedad' method='POST'>";
                filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEnfermedad'><i class='fa fa-edit'></i></button>";
                filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
                filas += "</form>";
                filas += "</td>";
                filas += "<td>";
                filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEnfermedad" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
                filas += "<div class = 'modal fade' id='modalEliminarEnfermedad" + cont + "' tabindex = '-1' role = 'dialog'>";
                filas += "<div class='modal-dialog'>";
                filas += "<div class='modal-content'>";
                filas += "<div class='modal-header'>";
                filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                filas += "<h4 class='modal-title'>Eliminar Enfermedad</h4>";
                filas += "</div>";
                filas += "<div class='modal-body'>";
                filas += "<p>¿Seguro que desea eliminar registro?</p>";
                filas += "</div>";
                filas += "<div class='modal-footer'>";
                filas += "<form action='" + url_base + "/enfermedades/eliminarEnfermedad' method='POST'>";
                filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEnfermedad'> Aceptar </button>";
                filas += "<input type='hidden' name='idEnfermedad' value='" + v.idEnfermedad + "'>";
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
            filas += "<td colspan='6'>No existe este Centro de formacion</td>";
            filas += "</tr>";
        }
        $('#tblEnfermedades tbody').html(filas);
    });
});