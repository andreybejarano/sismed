<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <!-- encabezado wrapper -->
        <div class="row" >
            <div class="col-lg-10">
                <h1 class="page-header bg-info letraTitulos">
                    SISMED <small>Cuidarte es nuestro deber</small>
                </h1>
                <ul >
                    <li class="letraTitulos">
                        Sistema de gestión de citas y formulación médica
                    </li>
                </ul>
            </div>
            <div class="col-lg-2">
                <img src="<?php echo URL_BASE; ?>Vista/img/logo2.png" alt="" class="img-responsive" style="max-widht:150px; max-height:150px;">
            </div>
        </div>
        <div class="row" style="margin-top: 20px"></div>
        
        <div class="row">
            <form class="form-group" action="<?php echo URL_BASE . 'reportes/consultasFechas'; ?>" method="POST" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                <legend>Reporte por fecha</legend>
                <div class="form-group col-xs-5">
                    <input type="text" id="txfechaInicio" name="txfechaInicio" class="form-control" placeholder="Fecha inicio" required>
                </div>
                <div class="form-group col-xs-5">
                    <input type="text" id="txfechaFin" name="txfechaFin" class="form-control" placeholder="Fecha fin" required>
                </div>
                <div class="form-group col-xs-2">
                    <button type="submit" class="btn btn-primary" name="btnGenerar" id="btnGenerar"> GENERAR </button>
            
                </div>
            </form>
        </div>
        

        
        <div class="row" style="margin-top: 10px"></div>
        <div class="row">
            <form action="<?php echo URL_BASE . 'reportes/consultaDoctor'; ?>" method="POST" class="col-xs-12">
                <legend>Reporte por fecha y medico</legend>
                <div class="form-group col-xs-3">
                    <input type="text" id="txfechaInicio1" name="txfechaInicio1" class="form-control" placeholder="Fecha inicio" required>
                </div>
                <div class="form-group col-xs-3">
                    <input type="text" id="txfechaFin1" name="txfechaFin1" class="form-control" placeholder="Fecha fin" required>
                </div>
                <div class="form-group col-xs-3">
                    <input type="text" id="txfDocumentoMedico" name="txfDocumentoMedico" class="form-control" placeholder="Documento medico" required>
                </div>
                <div class="form-group col-xs-2 col-xs-offset-1">
                    <button type="submit" class="btn btn-primary" name="btnGenerar1" id="btnGenerar1"> GENERAR </button>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top: 10px"></div>
        <div class="row">
            <form action="<?php echo URL_BASE . 'reportes/consultaFuncionario'; ?>" method="POST" class="col-xs-12">
                <legend>Reporte funcionarios por centro de formacion</legend>
                <div class="form-group col-xs-10">
                        <select class="form-control" name="cmbCentroFormacion" id="cmbCentroFormacion" required>
                            <option value="">Seleccione Centro de formacion</option>
                        </select>
                    </div>
                <div class="form-group col-xs-2">
                    <button type="submit" class="btn btn-primary" name="btnGenerar2" id="btnGenerar2"> GENERAR </button>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top: 10px"></div>
        <div class="row">
            <form action="<?php echo URL_BASE . 'reportes/consultaBeneficiario'; ?>" method="POST" class="col-xs-12 ">
                <legend>Reporte citas beneficiario</legend>
                <div class="form-group col-xs-10">
                    <input type="text" id="txfDocumentoBeneficiario" name="txfDocumentoBeneficiario" class="form-control" placeholder="Documento Beneficiario" required>
                </div>
                <div class="form-group col-xs-2">
                    <button type="submit" class="btn btn-primary" name="btnGenerar3" id="btnGenerar3"> GENERAR </button>
                </div>
            </form> 
        </div>
        <div class="row" style="margin-top: 10px"></div>
        <div class="row">
            <form action="<?php echo URL_BASE . 'reportes/consultaRemisiones'; ?>" method="POST" class="col-xs-12 ">
                <legend>Reporte remisiones</legend>
                <div class="form-group col-xs-5">
                    <input type="text" id="txfechaInicio2" name="txfechaInicio2" class="form-control" placeholder="Fecha inicio" required>
                </div>
                <div class="form-group col-xs-5">
                    <input type="text" id="txfechaFin2" name="txfechaFin2" class="form-control" placeholder="Fecha fin" required>
                </div>
                <div class="form-group col-xs-2">
                    <button type="submit" class="btn btn-primary" name="btnGenerar4" id="btnGenerar4"> GENERAR </button>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top: 10px"></div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie', $datos); ?>
<script type="text/javascript">
    $.post('<?php echo URL_BASE; ?>centrosFormacion/listarCentrosFormacion', {}, function (data) {
        var datos = JSON.parse(data);
        $.each(datos, function (ind, val) {
            $('#cmbCentroFormacion').append('<option value="' + val.idCentroFormacion + '">' + val.nombreCentroFormacion + '</option>');
        });
    });
    
    
        $('#txfechaInicio').datetimepicker({
    	timepicker: false,
	    format: 'Y-m-d', 
    });
    
        $('#txfechaFin').datetimepicker({
    	timepicker: false,
	    format: 'Y-m-d', 
    });
    
            $('#txfechaInicio1').datetimepicker({
    	timepicker: false,
	    format: 'Y-m-d', 
    });
    
        $('#txfechaFin1').datetimepicker({
    	timepicker: false,
	    format: 'Y-m-d', 
    });
    
            $('#txfechaInicio2').datetimepicker({
    	timepicker: false,
	    format: 'Y-m-d', 
    });
    
        $('#txfechaFin2').datetimepicker({
    	timepicker: false,
	    format: 'Y-m-d', 
    });

</script>