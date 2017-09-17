var url_base = window.location.protocol + "//" + window.location.host;
$.post(url_base+'/citasMedicas/listarCitasMedicasHoy', {}, function (data) {
    var datos = JSON.parse(data);
    var filas;
    var cont = 0;
    var estadoCita;
    $.each(datos, function (i, v) {
        cont = cont + 1;
        filas += "<tr>";
        filas += "<td>" + v.fechaHoraRegistroCitaMedica + "</td>";
        filas += "<td>" + v.fechaAgendaMedica + "</td>";
        filas += "<td>" + v.hora + "</td>";
        filas += "<td>" + v.duracionCitaMedica + "</td>";
        filas += "<td>" + v.comentariosCitaMedica + "</td>";
        switch (v.estadoCitaMedica) {
            case '1':
                estadoCita = "<span class='label label-primary'>Asignada</span>";
                break;
            case '2':
                estadoCita = "<span class='label label-info'>En progreso</span>";
                break;
            case '3':
                estadoCita = "<span class='label label-warning'>Cancelada</span>";
                break;
            case '4':
                estadoCita = "<span class='label label-success'>Atendida</span>";
                break;
            case '5':
                estadoCita = "<span class='label label-danger'>Perdida</span>";
                break;
        }
        filas += "<td>" + estadoCita + "</td>";
        filas += "<td>" + v.numeroIdentificacionBeneficiario + "</td>";
        filas += "<td>" + v.nombresBeneficiario + " " + v.apellidosBeneficiario + "</td>";
        filas += "<td>" + v.numeroConsultorio + "</td>";
        filas += "<td>" + v.nombresEmpleado + " " + v.apellidosEmpleado + "</td>";
        filas += "<td>";
        filas += "<form action='" + url_base + "/consultas/consulta' method='POST'>";
        filas += "<button class='btn btn-xs btn-warning' type='submit' name='btnConstulaCitaMedica'><i class='fa fa-stethoscope'></i></button>";
        filas += "<input type='hidden' name='idCitaMedica' value='" + v.idCitaMedica + "'>";
        filas += "<input type='hidden' name='idBeneficiario' value ='" + v.idBeneficiario + "'>"; //idBeneficiario para la insercion del episodio
        filas += "</form>";
        filas += "</td>";
        filas += "<td>";
        filas += "<form action='" + url_base + "/citasMedicas/editarCitaMedica' method='POST'>";
        filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarCitaMedica'><i class='fa fa-edit'></i></button>";
        filas += "<input type='hidden' name='idCitaMedica' value='" + v.idCitaMedica + "'>";
        filas += "</form>";
        filas += "</td>";
        filas += "<td>";
        filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalCancelarCitaMedica" + cont + "' name='btnModalCancelarCitaMedica'><i class='fa fa-close'></i></button>";
        filas += "<div class = 'modal fade' id='modalCancelarCitaMedica" + cont + "' tabindex = '-1' role = 'dialog'>";
        filas += "<div class='modal-dialog'>";
        filas += "<div class='modal-content'>";
        filas += "<div class='modal-header'>";
        filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        filas += "<h4 class='modal-title'>Cancelar Cita Medica</h4>";
        filas += "</div>";
        filas += "<div class='modal-body'>";
        filas += "<p>¿Seguro que desea cancelar la cita?</p>";
        filas += "</div>";
        filas += "<div class='modal-footer'>";
        filas += "<form action='" + url_base + "/citasMedicas/estadoCitaMedica' method='POST'>";
        filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
        filas += "<button class='btn btn-primary' type='submit' name='btnCancelarCitaMedica'> Aceptar </button>";
        filas += "<input type='hidden' name='idCitaMedica' value='" + v.idCitaMedica + "'>";
        filas += "<input type='hidden' name='IdEstadoCitaMedica' value='3'>";
        filas += "</form>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</div>";
        filas += "</td>";
        filas += "</tr>";
    });
    $('#tblCitasMedicas tbody').html(filas);
    $('#ContadorCitas').html(cont);
});

 $('#btnBuscar').click(function () {
    var beneficiario = $('#txtBuscar').val();
    $.post(url_base+'/citasMedicas/listarCitasMedicasBeneficiario', {beneficiario:beneficiario}, function (data) {
        var datos = JSON.parse(data);
        var cont = 0;
        if (datos != false) {
            var filas;  
            var estadoCita;
            $.each(datos, function (i, v) { 
                cont = cont + 1;
                filas += "<tr>";
                filas += "<td>" + v.fechaHoraRegistroCitaMedica + "</td>";
                filas += "<td>" + v.fechaAgendaMedica + "</td>";
                filas += "<td>" + v.hora + "</td>";
                filas += "<td>" + v.duracionCitaMedica + "</td>";
                filas += "<td>" + v.comentariosCitaMedica + "</td>";
                switch (v.estadoCitaMedica) {
                    case '1':
                        estadoCita = "<span class='label label-primary'>Asignada</span>";
                        break;
                    case '2':
                        estadoCita = "<span class='label label-info'>En progreso</span>";
                        break;
                    case '3':
                        estadoCita = "<span class='label label-warning'>Cancelada</span>";
                        break;
                    case '4':
                        estadoCita = "<span class='label label-success'>Atendida</span>";
                        break;
                    case '5':
                        estadoCita = "<span class='label label-danger'>Perdida</span>";
                        break;
                }
                filas += "<td>" + estadoCita + "</td>";
                filas += "<td>" + v.numeroIdentificacionBeneficiario + "</td>";
                filas += "<td>" + v.nombresBeneficiario + " " + v.apellidosBeneficiario + "</td>";
                filas += "<td>" + v.numeroConsultorio + "</td>";
                filas += "<td>" + v.nombresEmpleado + " " + v.apellidosEmpleado + "</td>";
                filas += "<td>";
                filas += "<form action='" + url_base + "/consultas/consulta' method='POST'>";
                filas += "<button class='btn btn-xs btn-warning' type='submit' name='btnConstulaCitaMedica'><i class='fa fa-stethoscope'></i></button>";
                filas += "<input type='hidden' name='idCitaMedica' value='" + v.idCitaMedica + "'>";
                filas += "<input type='hidden' name='idBeneficiario' value ='" + v.idBeneficiario + "'>"; //idBeneficiario para la insercion del episodio
                filas += "</form>";
                filas += "</td>";
                filas += "<td>";
                filas += "<form action='" + url_base + "/citasMedicas/editarCitaMedica' method='POST'>";
                filas += "<button class='btn btn-xs btn-success' type='submit' name='btnEditarCitaMedica'><i class='fa fa-edit'></i></button>";
                filas += "<input type='hidden' name='idCitaMedica' value='" + v.idCitaMedica + "'>";
                filas += "</form>";
                filas += "</td>";
                filas += "<td>";
                filas += "<button class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modalCancelarCitaMedica" + cont + "' name='btnModalCancelarCitaMedica'><i class='fa fa-close'></i></button>";
                filas += "<div class = 'modal fade' id='modalCancelarCitaMedica" + cont + "' tabindex = '-1' role = 'dialog'>";
                filas += "<div class='modal-dialog'>";
                filas += "<div class='modal-content'>";
                filas += "<div class='modal-header'>";
                filas += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                filas += "<h4 class='modal-title'>Cancelar Cita Medica</h4>";
                filas += "</div>";
                filas += "<div class='modal-body'>";
                filas += "<p>¿Seguro que desea cancelar la cita?</p>";
                filas += "</div>";
                filas += "<div class='modal-footer'>";
                filas += "<form action='" + url_base + "/citasMedicas/estadoCitaMedica' method='POST'>";
                filas += "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                filas += "<button class='btn btn-primary' type='submit' name='btnCancelarCitaMedica'> Aceptar </button>";
                filas += "<input type='hidden' name='idCitaMedica' value='" + v.idCitaMedica + "'>";
                filas += "<input type='hidden' name='IdEstadoCitaMedica' value='3'>";
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
            filas += "<td colspan='6'>El beneficiario no tiene citas medicas</td>";
            filas += "</tr>";
        }
        $('#tblCitasMedicas tbody').html(filas);
    });
});