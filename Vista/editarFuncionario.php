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
        <form method="POST" action="<?php echo URL_BASE . 'funcionarios/editarFuncionario'; ?>">
            <div class="form-group">
                <label for="txfIdentificacionFuncionario">Numero de Documento</label>
                <input type="text" id="txfIdentificacionFuncionario" name="txfIdentificacionFuncionario" class="form-control" value="<?php echo $funcionario[0]['numeroIdentificacionFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbTipoDocumento">Tipo Documento</label>
                <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                    <option value="<?php echo $funcionario[0]['tipos_documentos_idTipoDocumento']; ?>"><?php echo $funcionario[0]['tipoDocumento']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfNombresFuncionario">Nombres</label>
                <input type="text" id="txfNombresFuncionario" name="txfNombresFuncionario" class="form-control" value="<?php echo $funcionario[0]['nombresFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfApellidosFuncionario">Apellidos</label>
                <input type="text" id="txfApellidosFuncionario" name="txfApellidosFuncionario" class="form-control" value="<?php echo $funcionario[0]['apellidosFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbGenero">Genero</label>
                <select class="form-control" name="cmbGenero" id="cmbGenero" required>
                    <option value="<?php echo $funcionario[0]['generos_idGenero']; ?>"><?php echo $funcionario[0]['tipoGenero']; ?></option>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfFechaNacimientoFuncionario">Fecha nacimiento</label>
                <input type="text" id="txfFechaNacimientoFuncionario" name="txfFechaNacimientoFuncionario" class="form-control" value="<?php echo $funcionario[0]['fechaNacimientoFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbRegional">Regional</label>
                <select class="form-control" name="cmbRegional" id="cmbRegional" required>
                    <option value="<?php echo $funcionario[0]['regionales_idRegional']; ?>"><?php echo $funcionario[0]['nombreRegional']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="cmbCentroFormacion">Especialidad</label>
                <select class="form-control" name="cmbCentroFormacion" id="cmbCentroFormacion" required>
                    <option value="<?php echo $funcionario[0]['centros_formacion_idCentroFormacion']; ?>"><?php echo $funcionario[0]['nombreCentroFormacion']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfDireccionFuncionario">Direccion</label>
                <input type="text" id="txfDireccionFuncionario" name="txfDireccionFuncionario" class="form-control" value="<?php echo $funcionario[0]['direccionFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfTelefonoFuncionario">Telefono</label>
                <input type="text" id="txfTelefonoFuncionario" name="txfTelefonoFuncionario" class="form-control" value="<?php echo $funcionario[0]['telefonoFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfMovilFuncionario">Movil</label>
                <input type="text" id="txfMovilFuncionario" name="txfMovilFuncionario" class="form-control" value="<?php echo $funcionario[0]['movilFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="txfCorreoFuncionario">Correo electronico</label>
                <input type="text" id="txfCorreoFuncionario" name="txfCorreoFuncionario" class="form-control" value="<?php echo $funcionario[0]['correoFuncionario']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbEstadoFuncionario">Estado</label>
                <select class="form-control" name="cmbEstadoFuncionario" id="cmbEstadoFuncionario">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button>
            <button class="btn btn-primary" name="btnContrasena" id="btnContrasena">CAMBIAR CONTRASEÑA</button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'funcionarios/funcionarios'; ?>">ATRAS</a></button>
            <input type="hidden" name="idFuncionario" value="<?php echo $funcionario[0]['idFuncionario']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript">
    
</script>

