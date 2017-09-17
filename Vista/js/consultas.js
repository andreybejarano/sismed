var url_base = window.location.protocol + "//" + window.location.host;
function capturarId(o, nombreFila){

    var eIndex = o.id.split("-")[1];
    if(eIndex){
        $(o).closest("#"+eIndex).remove();
    }else{
        console.log("El elemento no tiene un id bien formado.");
    };
}
$(document).ready(function(){
    $.post(url_base+'/enfermedades/listarEnfermedades', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbEnfermedad').append('<option value="' + v.idEnfermedad + '">' + v.nombreEnfermedad + '</option>');
        });
    });

    $.post(url_base+'/medicamentos/listarMedicamentos', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbMedicamento').append('<option value="' + v.idMedicamento + '">' + v.nombreGenericoMedicamento + '</option>');
        });
    });

    $.post(url_base+'/tipoOrdenes/listarTipoOrdenes', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbTipoOrden').append('<option value="' + v.idTipoOrden + '">' + v.descripcionTipoOrden + '</option>');
        });
    });
    //Ordenes
    var cont = 0;
    $('#btnAgregarOrden').click(function () {
        var tipoOrden = $('#cmbTipoOrden').val();
        $.post(url_base+'/tipoOrdenes/listarTipoOrden', {tipoOrden: tipoOrden}, function (data) {
            var datos = JSON.parse(data);
            var fechaOrden = $('#txfFechaHoraOrden').val();
            var cantOrden = $('#txfCantidadOrden').val();
            var observacionOrden = $('#txfObservacionOrden').val();
            var fila = "<tr id='" + cont + "'>";
            
            var inputsHidden = "<input type='hidden' value='" + fechaOrden + "' name='fechaOrden[]'> \
                                <input type='hidden' value='" + cantOrden + "' name='cantOrden[]'> \
                                <input type='hidden' value='" + observacionOrden + "' name='observacionOrden[]'> \
                                <input type='hidden' value='" + tipoOrden + "' name='tipoOrden[]'>";
            fila += "<td hidden>" + inputsHidden + "</td>";
            var descripcionTipoOrden;
            $.each(datos, function (i, v) {
                descripcionTipoOrden = v.descripcionTipoOrden;
            });
            fila += "<td>" + fechaOrden + "</td>";
            fila += "<td>" + cantOrden + "</td>";
            fila += "<td>" + observacionOrden + "</td>";
            fila += "<td>" + descripcionTipoOrden + "</td>";
            fila += "<td><button type='button' onclick='capturarId(this)' class='btn btn-xs btn-danger btnEliminarOrden' id='btnEliminarOrden-" + cont + "'><i class='fa fa-close'></i></button></td>";
            fila += "<input type='hidden' name='eliminarOrden' id='eliminarOrden' value='"+cont+"'>";
            fila += "</tr>";
            $('#tblOrdenes').append(fila);
            $('#txfFechaHoraOrden').val('');
            $('#txfCantidadOrden').val('');
            $('#txfObservacionOrden').val('');
            cont++;
        });
    });
    
    //Formula medica
    var contF = 0;
    $('#btnAgregarMedicamento').click(function () {
        var idMedicamento = $('#cmbMedicamento').val();
        $.post(url_base+'/medicamentos/listarIdMedicamento', {idMedicamento: idMedicamento}, function (data) {
            var datos = JSON.parse(data);
            var cantMedicamento = $('#txfCantidadedicamento').val();
            var dosis = $('#txfDosis').val();
            var codigo;
            var nombreMedicamento;
            var descMedicamento;
            var fila = "<tr id='" + contF + "'>";
            var inputsHidden = "<input type='hidden' value='" + idMedicamento + "' name='idMedicamento[]'> \
                                <input type='hidden' value='" + cantMedicamento + "' name='cantMedicamento[]'> \
                                <input type='hidden' value='" + dosis + "' name='dosis[]'>";
            fila += "<td hidden>" + inputsHidden + "</td>";
            $.each(datos, function (i, v) {
                codigo = v.codigoMedicamento;
                nombreMedicamento = v.nombreGenericoMedicamento;
                descMedicamento = v.descripcionMedicamento;
            });
            fila += "<td>" + codigo + "</td>";
            fila += "<td>" + nombreMedicamento + "</td>";
            fila += "<td>" + descMedicamento + "</td>";
            fila += "<td>" + cantMedicamento + "</td>";
            fila += "<td>" + dosis + "</td>";
            fila += "<td id='td'><button type='button' onclick='capturarId(this)' class='btn btn-xs btn-danger btnEliminarMedicamento0' name='btnEliminarMedicamento" + contF + "' id='btnEliminarMedicamento-" + contF + "'><i class='fa fa-close'></i></button></td>";
            fila += "</tr>";
            $('#tblMedicamentos').append(fila);
            $('#txfCantidadedicamento').val('');
            $('#txfDosis').val('');
            contF++;
            
        });
        
    });
    
       
    $('#txfFechaHora').datetimepicker({
        timepicker: false,
        format: 'Y-m-d H:m:s'
    });

    $('#txfFechaHoraOrden').datetimepicker({
        format: 'Y-m-d H:m'
    });
});