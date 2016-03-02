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
        <form action="<?php echo URL_BASE . 'usuarios/editarUsuario'; ?>" method="POST" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <legend>Editar usuario</legend>
            <div class="form-group">
                <label for="idUsuario">ID usuario: </label> 
                <input class="form-control" type="text" name="txfIdUsuario" value="<?php echo $usuario[0]['idUsuario']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="txfContraseniaUsuario">Contraseña: </label>
                <input class="form-control" type="password" name="txfContrasenia" id="txfContrasenia" value="<?php echo $usuario[0]['contrasenia']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="txfContraseniaConf">Contraseña</label>
                <input type="password" id="txfContraseniaConf" name="txfContraseniaConf" value="<?php echo $usuario[0]['contrasenia']; ?>" class="form-control" placeholder="Contraseña: " readonly>
                <span id="errorPasswors" hidden style="color: red"></span>
            </div>
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
            <button class="btn btn-primary" name="btnContrasena" id="btnContrasena">CAMBIAR CONTRASEÑA</button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'usuarios/usuarios'; ?>">ATRAS</a></button>
            <input type="hidden" name="idUsuario" value="<?php echo $usuario[0]['idUsuario']; ?>">
        </form>
        <div class="row" style="margin-top: 22%"></div>
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
        var pass1 = $('#txfContrasenia').val();
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

