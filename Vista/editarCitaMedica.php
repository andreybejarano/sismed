<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral'); //Cambiar por controlador segun el rol
?>


<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan') ?>
        <form method="POST" action="<?php echo URL_BASE . 'citasMedicas/editarCitasMedica'; ?>">
            <div class="form-group">
                <label for="txfIdentificacionCitasMedica">Numero de Documento</label>
                <input type="text" id="txfIdentificacionCitasMedica" name="txfIdentificacionCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['numeroIdentificacionCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbTipoDocumento">Tipo Documento</label>
                <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                    <option value="<?php echo $citaMedica[0]['tipos_documentos_idTipoDocumento']; ?>"><?php echo $citaMedica[0]['tipoDocumento']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfNombresCitasMedica">Nombres</label>
                <input type="text" id="txfNombresCitasMedica" name="txfNombresCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['nombresCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="txfApellidosCitasMedica">Apellidos</label>
                <input type="text" id="txfApellidosCitasMedica" name="txfApellidosCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['apellidosCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbGenero">Genero</label>
                <select class="form-control" name="cmbGenero" id="cmbGenero" required>
                    <option value="<?php echo $citaMedica[0]['generos_idGenero']; ?>"><?php echo $citaMedica[0]['tipoGenero']; ?></option>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfFechaNacimientoCitasMedica">Fecha nacimiento</label>
                <input type="text" id="txfFechaNacimientoCitasMedica" name="txfFechaNacimientoCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['fechaNacimientoCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbIdFuncionario">Documento funcionario</label>
                <select class="form-control" name="cmbIdFuncionario" id="cmbIdFuncionario" required>
                    <option value="<?php echo $citaMedica[0]['funcionarios_idFuncionario']; ?>"><?php echo $citaMedica[0]['numeroIdentificacionFuncionario']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfDireccionCitasMedica">Direccion</label>
                <input type="text" id="txfDireccionCitasMedica" name="txfDireccionCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['direccionCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="txfTelefonoCitasMedica">Telefono</label>
                <input type="text" id="txfTelefonoCitasMedica" name="txfTelefonoCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['telefonoCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="txfMovilCitasMedica">Movil</label>
                <input type="text" id="txfMovilCitasMedica" name="txfMovilCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['movilCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="txfCorreoCitasMedica">Correo electronico</label>
                <input type="text" id="txfCorreoCitasMedica" name="txfCorreoCitasMedica" class="form-control" value="<?php echo $citaMedica[0]['correoCitasMedica']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbCronico">Cronico</label>
                <select class="form-control" name="cmbCronico" id="cmbCronico">
                    <option value="0">Cronico</option>
                    <option value="0">No cronico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cmbEstadoCitasMedica">Estado</label>
                <select class="form-control" name="cmbEstadoCitasMedica" id="cmbEstadoCitasMedica">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button>
            <button class="btn btn-primary" name="btnContrasena" id="btnContrasena">CAMBIAR CONTRASEÑA</button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'citasMedicas/citasMedicas'; ?>">ATRAS</a></button>
            <input type="hidden" name="idCitasMedica" value="<?php echo $citaMedica[0]['idCitasMedica']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript">

</script>

