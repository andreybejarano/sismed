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
        <form method="POST" action="<?php echo URL_BASE . 'empleados/editarEmpleado'; ?>">
            <div class="form-group">
                <label for="txfIdentificacionEmpleado">Numero de Documento</label>
                <input type="text" id="txfIdentificacionEmpleado" name="txfIdentificacionEmpleado" class="form-control" value="<?php echo $empleado[0]['numeroIdentificacionEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbTipoDocumento">Tipo Documento</label>
                <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento" required>
                    <option value="<?php echo $empleado[0]['tipos_documentos_idTipoDocumento']; ?>"><?php echo $empleado[0]['tipoDocumento']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfNombresEmpleado">Nombres</label>
                <input type="text" id="txfNombresEmpleado" name="txfNombresEmpleado" class="form-control" value="<?php echo $empleado[0]['nombresEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="txfApellidosEmpleado">Apellidos</label>
                <input type="text" id="txfApellidosEmpleado" name="txfApellidosEmpleado" class="form-control" value="<?php echo $empleado[0]['apellidosEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbGenero">Genero</label>
                <select class="form-control" name="cmbGenero" id="cmbGenero" required>
                    <option value="<?php echo $empleado[0]['generos_idGenero']; ?>"><?php echo $empleado[0]['tipoGenero']; ?></option>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfFechaNacimientoEmpleado">Fecha nacimiento</label>
                <input type="text" id="txfFechaNacimientoEmpleado" name="txfFechaNacimientoEmpleado" class="form-control" value="<?php echo $empleado[0]['fechaNacimientoEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="txfTarjetaProfesional">Tarjeta profesional</label>
                <input type="text" id="txfTarjetaProfesional" name="txfTarjetaProfesional" class="form-control" value="<?php echo $empleado[0]['tarjetaProfesionalEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbCargo">Cargo</label>
                <select class="form-control" name="cmbCargo" id="cmbCargo" required>
                    <option value="<?php echo $empleado[0]['cargos_idCargo']; ?>"><?php echo $empleado[0]['descripcionCargo']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="cmbEspecialidad">Especialidad</label>
                <select class="form-control" name="cmbEspecialidad" id="cmbEspecialidad" required>
                    <option value="<?php echo $empleado[0]['especialidades_idEspecialidad']; ?>"><?php echo $empleado[0]['descripcionEspecialidad']; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="txfDireccionEmpleado">Direccion</label>
                <input type="text" id="txfDireccionEmpleado" name="txfDireccionEmpleado" class="form-control" value="<?php echo $empleado[0]['direccionEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="txfTelefonoEmpleado">Telefono</label>
                <input type="text" id="txfTelefonoEmpleado" name="txfTelefonoEmpleado" class="form-control" value="<?php echo $empleado[0]['telefonoEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="txfMovilEmpleado">Movil</label>
                <input type="text" id="txfMovilEmpleado" name="txfMovilEmpleado" class="form-control" value="<?php echo $empleado[0]['movilEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="txfCorreoEmpleado">Correo electronico</label>
                <input type="text" id="txfCorreoEmpleado" name="txfCorreoEmpleado" class="form-control" value="<?php echo $empleado[0]['correoEmpleado']; ?>">
            </div>
            <div class="form-group">
                <label for="cmbEstadoEmpleado">Estado</label>
                <select class="form-control" name="cmbEstadoEmpleado" id="cmbEstadoEmpleado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button>
            <button class="btn btn-primary" name="btnContrasena" id="btnContrasena">CAMBIAR CONTRASEÑA</button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'empleados/empleados'; ?>">ATRAS</a></button>
            <input type="hidden" name="idEmpleado" value="<?php echo $empleado[0]['idEmpleado']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript">
    
</script>

