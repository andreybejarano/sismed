<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral'); //Cambiar por controlador segun el rol
?>


<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
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
        <form method="POST" action="<?php echo URL_BASE . 'CentrosFormacion/editarCentroFormacion'; ?>" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="form-group">
                <label for="txfNombreCentroFormacion">Nombre </label>
                <input type="text" id="txfNombreCentroFormacion" name="txfNombreCentroFormacion" class="form-control" placeholder="Nombre centro de formacion" value="<?php echo $centroFormacion[0]['nombreCentroFormacion']; ?>">
            </div>
            <div class="form-group">
                <label for="txfSigla">Sigla</label>
                <input type="text" id="txfSigla" name="txfSigla" class="form-control" placeholder="Sigla" value="<?php echo $centroFormacion[0]['sigla']; ?>">
            </div>
            <div class="form-group">
                <label for="txfDireccionCentroFormacion">Direccion</label>
                <input type="text" id="txfDireccionCentroFormacion" name="txfDireccionCentroFormacion" class="form-control" placeholder="Direccion" value="<?php echo $centroFormacion[0]['direccionCentroFormacion']; ?>">
            </div>
            <div class="form-group">
                <label for="txfTelefonoCentroFormacion">Telefono</label>
                <input type="text" id="txfTelefonoCentroFormacion" name="txfTelefonoCentroFormacion" class="form-control" placeholder="Telefono" value="<?php echo $centroFormacion[0]['telefonoCentroFormacion']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbRegionales">Regional</label>
                <select class="form-control" name="cmbRegionales" id="cmbRegionales">
                    <option value="<?php echo $centroFormacion[0]['regionales_idRegional']; ?>"><?php echo $centroFormacion[0]['nombreRegional']; ?></option>
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'centrosFormacion/centrosFormacion'; ?>">ATRAS</a></button>
            <input type="hidden" name="idCentroFormacion" value="<?php echo $centroFormacion[0]['idCentroFormacion']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript">
    
</script>

