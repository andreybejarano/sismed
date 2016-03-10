<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral'); //Cambiar por controlador segun el rol
?>


<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan') ?>
        <form method="POST" action="<?php echo URL_BASE . 'beneficiarios/editarBeneficiario'; ?>">
            <div class="form-group">
                <label for="txfIdentificacionBeneficiario">Numero de Documento</label>
                <input type="text" id="txfIdentificacionBeneficiario" name="txfIdentificacionBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['numeroIdentificacionBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbTipoDocumento">Tipo Documento</label>
                <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                    <option value="<?php echo $beneficiario[0]['tipos_documentos_idTipoDocumento']; ?>"><?php echo $beneficiario[0]['tipoDocumento']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfNombresBeneficiario">Nombres</label>
                <input type="text" id="txfNombresBeneficiario" name="txfNombresBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['nombresBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfApellidosBeneficiario">Apellidos</label>
                <input type="text" id="txfApellidosBeneficiario" name="txfApellidosBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['apellidosBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbGenero">Genero</label>
                <select class="form-control" name="cmbGenero" id="cmbGenero" required>
                    <option value="<?php echo $beneficiario[0]['generos_idGenero']; ?>"><?php echo $beneficiario[0]['tipoGenero']; ?></option>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfFechaNacimientoBeneficiario">Fecha nacimiento</label>
                <input type="text" id="txfFechaNacimientoBeneficiario" name="txfFechaNacimientoBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['fechaNacimientoBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbIdFuncionario">Documento funcionario</label>
                <select class="form-control" name="cmbIdFuncionario" id="cmbIdFuncionario" required>
                    <option value="<?php echo $beneficiario[0]['funcionarios_idFuncionario']; ?>"><?php echo $beneficiario[0]['numeroIdentificacionFuncionario']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfDireccionBeneficiario">Direccion</label>
                <input type="text" id="txfDireccionBeneficiario" name="txfDireccionBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['direccionBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfTelefonoBeneficiario">Telefono</label>
                <input type="text" id="txfTelefonoBeneficiario" name="txfTelefonoBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['telefonoBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfMovilBeneficiario">Movil</label>
                <input type="text" id="txfMovilBeneficiario" name="txfMovilBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['movilBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfCorreoBeneficiario">Correo electronico</label>
                <input type="text" id="txfCorreoBeneficiario" name="txfCorreoBeneficiario" class="form-control" value="<?php echo $beneficiario[0]['correoBeneficiario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbCronico">Cronico</label>
                <select class="form-control" name="cmbCronico" id="cmbCronico">
                    <option value="0">Cronico</option>
                    <option value="0">No cronico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cmbEstadoBeneficiario">Estado</label>
                <select class="form-control" name="cmbEstadoBeneficiario" id="cmbEstadoBeneficiario">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button>
            <button class="btn btn-primary" name="btnContrasena" id="btnContrasena">CAMBIAR CONTRASEÑA</button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'beneficiarios/beneficiarios'; ?>">ATRAS</a></button>
            <input type="hidden" name="idBeneficiario" value="<?php echo $beneficiario[0]['idBeneficiario']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript">

</script>

