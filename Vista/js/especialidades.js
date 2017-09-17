var url_base = window.location.protocol + "//" + window.location.host;
$.post(url_base+'/especialidades/listarEspecialidades', {}, function (data) {
    var datos = JSON.parse(data);
    var filas;
    var cont = 0;
    $.each(datos, function (i, v) {
        cont = cont + 1;
        filas += "<tr>";
        filas += "<td>" + v.descripcionEspecialidad + "</td>";
        filas += "<td>";
        filas += "<form action='" + url_base + "/especialidades/editarEspecialidad' method='POST'>";
        filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEspecialidad'><i class='fa fa-edit'></i></button>";
        filas += "<input type='hidden' name='idEspecialidad' value='" + v.idEspecialidad + "'>";
        filas += "</form>";
        filas += "</td>";
        filas += "<td>";
        filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEspecialidad" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
        filas += "<div class = 'modal fade' id='modalEliminarEspecialidad" + cont + "' tabindex = '-1' role = 'dialog'>";
        filas += "<div class='modal-dialog'>";
        filas += "<div class='modal-content'>";
        filas += "<div class='modal-header'>";
        filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        filas += "<h4 class='modal-title'>Eliminar Especialidad</h4>";
        filas += "</div>";
        filas += "<div class='modal-body'>";
        filas += "<p>¿Seguro que desea eliminar registro?</p>";
        filas += "</div>";
        filas += "<div class='modal-footer'>";
        filas += "<form action='" + url_base + "/especialidades/eliminarEspecialidad' method='POST'>";
        filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
        filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEspecialidad'> Aceptar </button>";
        filas += "<input type='hidden' name='idEspecialidad' value='" + v.idEspecialidad + "'>";
        filas += "</form>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</td>";
        filas += "</tr>";
    });
    $('#tblEspecialidades tbody').html(filas);
});

$('#btnBuscar').click(function () {
    var especialidad = $('#txtBuscar').val();
    $.post(url_base+'/especialidades/listarDescripcionEspecialidad', {especialidad: especialidad}, function (data) {
        var datos = JSON.parse(data);
        var filas;
        var cont = 0;
        if (datos!=false){
        $.each(datos, function (i, v) {
            cont = cont + 1;
            filas += "<tr>";
            filas += "<td>" + v.descripcionEspecialidad + "</td>";
            filas += "<td>";
            filas += "<form action='" + url_base + "/especialidades/editarEspecialidad' method='POST'>";
            filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarEspecialidad'><i class='fa fa-edit'></i></button>";
            filas += "<input type='hidden' name='idEspecialidad' value='" + v.idEspecialidad + "'>";
            filas += "</form>";
            filas += "</td>";
            filas += "<td>";
            filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalEliminarEspecialidad" + cont + "' name='btnModalEliminarRol'><i class='fa fa-close'></i></button>";
            filas += "<div class = 'modal fade' id='modalEliminarEspecialidad" + cont + "' tabindex = '-1' role = 'dialog'>";
            filas += "<div class='modal-dialog'>";
            filas += "<div class='modal-content'>";
            filas += "<div class='modal-header'>";
            filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            filas += "<h4 class='modal-title'>Eliminar Especialidad</h4>";
            filas += "</div>";
            filas += "<div class='modal-body'>";
            filas += "<p>¿Seguro que desea eliminar registro?</p>";
            filas += "</div>";
            filas += "<div class='modal-footer'>";
            filas += "<form action='" + url_base + "/especialidades/eliminarEspecialidad' method='POST'>";
            filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
            filas += "<button class='btn btn-primary' type='submit' name='btnEliminarEspecialidad'> Aceptar </button>";
            filas += "<input type='hidden' name='idEspecialidad' value='" + v.idEspecialidad + "'>";
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
            filas += "<td colspan='4'>No existe esta Especialidad</td>";
            filas += "</tr>";
        }
        $('#tblEspecialidades tbody').html(filas);
    });
});