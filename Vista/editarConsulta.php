<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan'); ?>
        <div>
            <form action="<?php echo URL_BASE . 'consultas/editarConsulta'; ?>" method="POST">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Episodio" aria-controls="home" role="tab" data-toggle="tab">Episodio</a></li>
                    <li role="presentation"><a href="#Diagnostico" aria-controls="profile" role="tab" data-toggle="tab">Diagnostico</a></li>
                    <li role="presentation"><a href="#Ordenes" aria-controls="messages" role="tab" data-toggle="tab">Ordenes</a></li>
                    <li role="presentation"><a href="#FormulaMedica" aria-controls="settings" role="tab" data-toggle="tab">Formula Medica</a></li>
                    <li><button style="margin-left:20%;" type="submit" class="btn btn-primary" name="btnGrabarConsulta" id="btnGrabarConsulta">Actualizar</button></li>
                </ul>
                <div style="margin-top:2%;"></div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Tab para los episodios -->
                    <div role="tabpanel" class="tab-pane active row" id="Episodio">
                        <div class="form-group col-xs-3">
                            <label for="txfFechaHora">Fecha / Hora de la atencion:</label>
                            <input type="text" id="txfFechaHora"  maxlength="30" name="txfFechaHora" class="form-control" placeholder="" value="<?php echo $episodio[0]['fechaHoraAtencionEpisodio'];?>" >
                        </div>
                        <div class="form-group col-xs-3">
                            <label for="txfPeso">Peso: </label>
                            <input type="text" id="txfPeso"  maxlength="30" name="txfPeso" class="form-control" placeholder=""  value="<?php echo $episodio[0]['pesoEpisodio'];?>">
                        </div>
                        <div class="form-group col-xs-3">
                            <label for="txfTemperatura">Temperatura: </label>
                            <input type="text" id="txfTemperatura"  maxlength="30" name="txfTemperatura" class="form-control" placeholder="" value="<?php echo $episodio[0]['temperaturaEpisodio'];?>">
                        </div>
                        <div class="form-group col-xs-3">
                            <label for="txfPresion">Presion: </label>
                            <input type="text" id="txfPresion"  maxlength="30" name="txfPresion" class="form-control" placeholder="" value="<?php echo $episodio[0]['presionArterialEpisodio'];?>" >
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="txfAnamnesis">Anamnesis: </label>
                            <textarea class="form-control" rows="3" maxlength="300" id="txfAnamnesis" name="txfAnamnesis" ><?php echo $episodio[0]['anamnesisEpisodio'];?></textarea>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="txfExploracion">Exploracion: </label>
                            <textarea class="form-control" rows="3" maxlength="300" id="txfExploracion" name="txfExploracion" ><?php echo $episodio[0]['exploracionEpisodio'];?></textarea>
                        </div>
                        <input type="hidden" name="idCitaMedica" value="<?php echo $idCitaMedica ?>"/>
                        <input type="hidden" name="idBeneficiario" value="<?php echo $idBeneficiario ?>"/>
                        <input type="hidden" id="idEpisodio" name="idEpisodio" value="<?php echo $episodio[0]['idEpisodio'] ?>"/>
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                    <!-- Tab para los diagnosticos --------------------------------------------------------------------------------------------------------------------->
                    <div role="tabpanel" class="tab-pane row" id="Diagnostico">
                        <div class="form-group col-xs-12">
                            <label for="cmbEnfermedad">Enfermedad: </label>
                            <select class="form-control" name="cmbEnfermedad" id="cmbEnfermedad">
                                <option value="<?php echo $diagnostico[0]['enfermedades_idEnfermedad'];?>"><?php echo $diagnostico[0]['nombreEnfermedad'];?></option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="txfDescripcionDiagnostico">Descripcion: </label>
                            <textarea class="form-control" rows="5" maxlength="300" id="txfDescripcionDiagnostico" name="txfDescripcionDiagnostico" ><?php echo $diagnostico[0]['descripcionDiagnostico'];?></textarea>
                        </div>
                        <input type="hidden" name="idEpisodio" value=""/>
                    </div>
                    
    <!--EndForm--></form>
                    <!-- Tab para las ordenes ------------------------------------------------------------------------------------------------------------------------->
                    <div role="tabpanel" class="tab-pane" id="Ordenes">
                        <div class="row">
                            <button type="button" class="btn btn-primary col-xs-2" data-toggle="modal" data-target="#modalOrden">Agregar Orden</button>
                        </div>
                        <div id="modalOrden" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content--><!-- Modal para crear ordenes --> 
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Insertar Orden</h4>
                                    </div>
                                    <div class="modal-body">
                        <form id="frmOrden" action="<?php echo URL_BASE;?>consultas/insertarOrden" method="POST">
                                        
                                        <div class="form-group">
                                            <label for="txfFechaHoraOrden">Fecha/Hora orden</label>
                                            <input type="text" id="txfFechaHoraOrden"  maxlength="30" name="txfFechaHoraOrden" class="form-control" placeholder="Fecha/Hora orden">  
                                        </div>
                                        <div class="form-group">
                                            <label for="txfCantidadOrden">Cantidad</label>
                                            <input type="text" id="txfCantidadOrden"  maxlength="30" name="txfCantidadOrden" class="form-control" placeholder="Cantidad">  
                                        </div>
                                        <div class="form-group">
                                            <label for="txfObservacionOrden">Observacion</label>
                                            <textarea class="form-control" rows="5" maxlength="300" id="txfObservacionOrden" name="txfObservacionOrden"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="cmbTipoOrden">Tipo orden</label>
                                            <select class="form-control" name="cmbTipoOrden" id="cmbTipoOrden">
                                                <option value="">Seleccione Tipo Orden</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="idEpisodio" value="<?php echo $episodio[0]['idEpisodio']?>"/>
                                        <input type="hidden" name="idCitaMedica" value="<?php echo $citaMedica; ?>"/>
                                        <button type="submit" class="btn btn-primary" name="frmOrden2" id="frmOrden2"> ENVIAR </button>
                                    </div>

                        </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tblOrdenes" class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Fecha / Hora
                                        </th>
                                        <th>
                                            Cantidad
                                        </th>
                                        <th>
                                            Observaciones
                                        </th>
                                        <th>
                                            Tipo de Orden
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>              
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tab para las formulas medicas ----------------------------------------------------------------------------------------------------------------->
                    <div role="tabpanel" class="tab-pane" id="FormulaMedica">
                        <input type="hidden" name="idDiagnostico" value=""/>
                        <div class="row">
                            <button type="button" class="btn btn-primary col-xs-2" data-toggle="modal" data-target="#modalMedicamento">Agregar Medicamento</button>
                        </div>
                        <div id="modalMedicamento" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Insertar Medicamento</h4>
                                    </div>
                    <form id="frmMedicamento" action="<?php echo URL_BASE;?>consultas/insertarMedicamento" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="cmbMedicamento">Medicamento</label>
                                            <select class="form-control" name="cmbMedicamento" id="cmbMedicamento">
                                                <option value="">Seleccione medicamento</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="txfCantidadedicamento">Cantidad</label>
                                            <input type="text" id="txfCantidadedicamento"  maxlength="30" name="txfCantidadedicamento" class="form-control" placeholder="Cantidad">  
                                        </div>
                                        <div class="form-group">
                                            <label for="txfDosis">Dosis o posologia</label>
                                            <input type="text" id="txfDosis"  maxlength="30" name="txfDosis" class="form-control" placeholder="Dosis o posologia">  
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="btnAgregarMedicamento" id="btnAgregarMedicamento"> ENVIAR </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                                <input type="hidden" name="idFormula" id="idFormula" value="<?php echo $formula[0]['idFormulaMedica']?>"/>
                                <input type="hidden" name="idCitaMedica" value="<?php echo $citaMedica; ?>"/>
                            </div>
                    </form>
                        </div>
                        <div class="table-responsive">
                            <table id="tblMedicamentos" class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Codigo Medicamento
                                        </th>
                                        <th>
                                            Nombre Generico
                                        </th>
                                        <th>
                                            Descripcion
                                        </th>
                                        <th>
                                            Cantidad
                                        </th>
                                        <th>
                                            Dosificacion
                                        </th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>              
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="txfObservacionesFormula">Observaciones: </label>
                                <textarea class="form-control" rows="3" maxlength="300" id="txfObservacionesFormula" name="txfObservacionesFormula"><?php echo $formula[0]['observacionesFormulaMedica'];?></textarea>
                            </div>
                        </div>    
                    </div>
                </div>

        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------->
    </div>
</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie', $datos); ?>
<script type="text/javascript">
    $.post('<?php echo URL_BASE; ?>enfermedades/listarEnfermedades', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbEnfermedad').append('<option value="' + v.idEnfermedad + '">' + v.nombreEnfermedad + '</option>');
        });
    });
    $.post('<?php echo URL_BASE; ?>medicamentos/listarMedicamentos', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbMedicamento').append('<option value="' + v.idMedicamento + '">' + v.nombreGenericoMedicamento + '</option>');
        });
    });
    $.post('<?php echo URL_BASE; ?>tipoOrdenes/listarTipoOrdenes', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (i, v) {
            $('#cmbTipoOrden').append('<option value="' + v.idTipoOrden + '">' + v.descripcionTipoOrden + '</option>');
        });
    });
    
    
    //Ordenes
    var idEpisodio = $('#idEpisodio').val();
    $.post('<?php echo URL_BASE; ?>consultas/listarOrdenes', {idEpisodio:idEpisodio}, function(data) {
        var datos= JSON.parse(data);
        var fila='';
        var cont=0;
        $.each(datos, function(i, v) {
            cont = cont + 1;
            fila +='<tr>';
            fila += "<td>" + v.fechaHoraOrden + "</td>";
            fila += "<td>" + v.cantidadOrden + "</td>";
            fila += "<td>" + v.observacionOrden + "</td>";
            fila += "<td>" + v.descripcionTipoOrden + "</td>";
            fila += "</tr>";
        });
        $('#tblOrdenes').append(fila);
    });
    
    
    //Formula medica
    
    var idFormula = $('#idFormula').val();
    $.post('<?php echo URL_BASE; ?>consultas/listarMedicamentos', {idFormula:idFormula}, function(data) {
        var datos= JSON.parse(data);
        var fila='';
        var cont=0;
        $.each(datos, function(i, v) {
            
            fila +='<tr>';
            fila += "<td>" + v.codigoMedicamento + "</td>";
            fila += "<td>" + v.nombreGenericoMedicamento + "</td>";
            fila += "<td>" + v.descripcionMedicamento + "</td>";
            fila += "<td>" + v.cantidadMedicamento + "</td>";
            fila += "<td>" + v.dosificacionMedicamento  + "</td>";
            fila += "<td><button type='button' class='btn btn-xs btn-danger btnEliminarMedicamento' id='btnEliminarMedicamento" + cont + "'><i class='fa fa-close'></i></button></td>";
            fila += "</tr>";
        });
        $('#tblMedicamentos').append(fila);
    });
    
    
    
    $('#txfFechaHora').datetimepicker({
        timepicker: false,
        format: 'Y-m-d H:m:s'
    });
    $('#txfFechaHoraOrden').datetimepicker({
        format: 'Y-m-d H:m'
    });
    
</script>