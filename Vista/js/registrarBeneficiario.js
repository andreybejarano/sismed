var url_base = window.location.protocol + "//" + window.location.host;
$.post(url_base+'/tipos/listarTipoDocumento', {}, function (data) {
    var datos = JSON.parse(data);
    $.each(datos, function (i, v) {
        $('#cmbTipoDocumento').append('<option value="' + v.idTipoDocumento + '">' + v.tipoDocumento + '</option>');
    });
});

$.post(url_base+'/funcionarios/listarFuncionarios', {}, function (data) {
    var datos = JSON.parse(data);
    $.each(datos, function (i, v) {
        $('#cmbIdFuncionario').append('<option value="' + v.idFuncionario + '">' + v.numeroIdentificacionFuncionario + '</option>');
    });
});

$('#txfFechaNacimientoBeneficiario').datetimepicker({
    timepicker: false,
	format: 'Y-m-d', 
	maxDate: '0'
});