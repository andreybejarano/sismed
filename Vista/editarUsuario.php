<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
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
        <form action="<?php echo URL_BASE . 'usuarios/editarUsuario'; ?>" method="POST" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <legend>Editar usuario</legend>
            
            <div class="form-group">
                <label for="cmbRoles">Rol: </label>
                <select class="form-control" name="cmbRoles">
                    <?php
                    foreach ($usuario as $usuario):
                        ?>
                        <option value="<?php echo $usuario['roles_idRol']; ?>"><?php echo $usuario['nombreRol']; ?></option> 
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button>
            <button type="button" class="btn btn-primary" name="btnContrasena" data-toggle="modal" data-target="#ModalCambiarContrasenia" id="btnContrasena">CAMBIAR CONTRASEÑA</button> 
            <button type="button" class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'usuarios/usuarios'; ?>">ATRAS</a></button>
            <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">
        </form>
        <div class="row" style="margin-top: 22%"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalCambiarContrasenia" aria-labelledby="ModalCambiarContrasenia">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="<?php echo URL_BASE. 'usuarios/editarContrasenia'  ?>" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Cambiar Contraseña</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txfContraseniaActual">Contraseña actual: </label>
                                <input class="form-control" type="password" name="txfContraseniaActual" id="txfContraseniaActual" placeholder="Contraseña actual">
                            </div>
                            <div class="form-group">
                                <label for="txfNuevaContrasenia">Contraseña nueva: </label>
                                <input class="form-control" type="password" name="txfNuevaContrasenia" id="txfNuevaContrasenia" placeholder="Contraseña nueva">
                            </div>
                            <div class="form-group">
                                <label for="txfContraseniaConf">Confirmar contraseña</label>
                                <input type="password" id="txfContraseniaConf" name="txfContraseniaConf" class="form-control" placeholder="Confirmar Contraseña">
                                <span id="errorPasswors" hidden style="color: red"></span>
                                <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="btnCambiarContrasenia" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript">
    $('#btnContrasena').click(function () {
        event.preventDefault();
        $('#txfContrasenia').removeAttr('readonly');
        $('#txfContraseniaConf').removeAttr('readonly');
    });

    $('#txfContraseniaConf').keyup(function () {
        var pass1 = $('#txfNuevaContrasenia').val();
        var pass2 = $('#txfContraseniaConf').val();
        if (pass1 != pass2) {
            if (pass2 === '') {
                $('#errorPasswors').removeAttr('hidden');
                $('#btnGuardar').prop('disabled', true);
                $('#errorPasswors').html(' ');
            } else {
                $('#errorPasswors').removeAttr('hidden');
                $('#btnGuardar').prop('disabled', true);
                $('#errorPasswors').html('Las contraseñas no coinciden');
            }
        } else {
            $('#btnGuardar').removeAttr('disabled');
            $('#errorPasswors').html(' ');
        }
    });
    
    
    
    
</script>

