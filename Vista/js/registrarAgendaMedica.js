var url_base = window.location.protocol + "//" + window.location.host;
// Trae las horas de la tabla hora_20 de la BD
$.post(url_base+'/horas/listarHoras', {}, function (data) {
    var datos = JSON.parse(data);
    var cont = 0;
    $.each(datos, function (i, v) {
        cont++;
            $('#divHoras').append("<label><input type='checkbox' name='chk[]' value='"+v.idhora_20+"'/> "+v.hora+"  </label> ");
    });
});

$.post(url_base+'/empleados/listarMedicos', {}, function (data) {
    var datos = JSON.parse(data);
    $.each(datos, function (i, v) {
        $('#cmbIdentificacionEmpleado').append('<option value="' + v.idEmpleado + '">' + v.numeroIdentificacionEmpleado + " - " + v.nombresEmpleado + " " + v.apellidosEmpleado + '</option>');
    });
});

$('#txfFechaAgendaMedica').datetimepicker({
	timepicker: false,
    format: 'Y-m-d', 
    minDate: '0'
});

$.post(url_base+'/consultorios/listarConsultorios', {}, function (data) {
    var datos = JSON.parse(data);
    $.each(datos, function (i, v) {
        $('#cmbConsultorio').append('<option value="' + v.idConsultorio + '">' + v.numeroConsultorio + '</option>');
    });
});