<div id="modalRegistrarCitaMedica" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Cita Medica</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'citasMedicas/insertarCitaMedica'; ?>">
                   <div class="form-group">
                        <label for="">Beneficiario:</label>
                        <select class="form-control" name="cmbBeneficiario" id="cmbBeneficiario" required>
                            <option value="">Seleccione un Beneficiario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbEmpleado">Medico:</label>
                        <select class="form-control" name="cmbEmpleado" id="cmbEmpleado" required>
                            <option value="">Seleccione un medico</option>
                        </select>
                    </div>
                     <div class="form-group col-xs-6">
                        <label for="txfFechaCita">Fecha:</label>
                        <input type="text" name="txfFechaCita" id="txfFechaCita" class="form-control" placeholder="Seleccione fecha" required disabled>
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="cmbHoraCita">Horas Disponibles:</label>
                         <select class="form-control" name="cmbHoraCita" id="cmbHoraCita" required disabled>
                            <option value="">Seleccione Hora</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                      <label for="txfComentario">Comentarios:</label>
                      <textarea class="form-control" rows="5" id="txfComentario" name="txfComentario"></textarea>
                    </div>
                <button type="submit" class="btn btn-primary" name="btnRegistrarCitaMedica" id="btnRegistrarCitaMedica"> Crear Cita Medica</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//Lista los empleados existente en la base de datos
 $.post('<?php echo URL_BASE; ?>empleados/listarMedicos', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbEmpleado').append('<option value="' + v.idEmpleado + '">' + v.nombresEmpleado + " "+ v.apellidosEmpleado + '</option>');
        });
    });

var f=new Date();
if ((f.getMonth() +1)<10) {
	var mes = '0'+(f.getMonth() +1);
}else{
	var mes = (f.getMonth() +1);
}
if ((f.getDate() +1)<10) {
	var dia = '0'+(f.getMonth() +3);
}else{
	var dia = (f.getMonth() +3);
}
var hoy = f.getFullYear() + "-" + mes + "-" + dia;
   
$('#cmbEmpleado').change(function () {
    var idEmpleado = $(this).val();
    $('#txfFechaCita').removeAttr('disabled');
    $.post('<?php echo URL_BASE; ?>agendasMedicas/listarFechasDisponibles', {idEmpleado: idEmpleado}, function (data) {
        var f=0;
        var fechasDisponibles=[]; 
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            if (hoy < v.fechaAgendaMedica) {
                fechasDisponibles[f]=v.fechaAgendaMedica;
                f++;
            }
            console.log(hoy);
        });
        if(fechasDisponibles.length !== 0){
            $('#txfFechaCita').datetimepicker({
	            timepicker: false,
	            format: 'Y-m-d',
	            allowDates: fechasDisponibles, 
	            formatDate:'Y-m-d'
	            
            });
        }else{
           $('#txfFechaCita').datetimepicker({
	            timepicker: false,
	            format: 'Y-m-d',
	            allowDates: ['1900-01-01'], 
	            formatDate:'Y-m-d'
            });
        }
    });
});

//Lista las horas disponible de un medico en una fecha especifica   //agregar una consulta al modelo
$('#txfFechaCita').change(function (){
    var fecha = $(this).val();
    var idEmpleado = $('#cmbEmpleado').val();
    $('#cmbHoraCita').removeAttr('disabled');
    $('.fuera').remove();
    $.post('<?php echo URL_BASE; ?>agendasMedicas/listarHorasDisponibles', {fecha:fecha, idEmpleado:idEmpleado}, function (data) { 
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbHoraCita').append('<option class="fuera" value="' + v.idAgendaMedica + '">' + v.hora + '</option>')
        });
    });
});

//Lista todos los consultorios de la base de datos
     $.post('<?php echo URL_BASE; ?>consultorios/listarConsultorios', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbConsultorio').append('<option value="' + v.idConsultorio + '">' + v.numeroConsultorio + '</option>');
        });
    });

//Lista todos los beneficiarios de la base de datos
    $.post('<?php echo URL_BASE; ?>beneficiarios/listarBeneficiarios', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbBeneficiario').append('<option value="' + v.idBeneficiario + '">'+ v.numeroIdentificacionBeneficiario + " : " + v.nombresBeneficiario + " " +v.apellidosBeneficiario + '</option>');
        });
    });
</script>