<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            <input type="hidden" name="metodo" value="insertarUsuario">
            <fieldset id="fieldsetRegistrar">
                <legend>Registrar usuario</legend>
                <table>
                    <thead>    
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label for="txfNombresUsuario">Nombres</label>
                            </td>
                            <td>
                                <input type="text" name="txfNombresUsuario" placeholder="Nombres" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txfApellidosUsuario">Apellidos</label>
                            </td>
                            <td>
                                <input type="text" name="txfApellidosUsuario" placeholder="Apellidos" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txfLogin">Login</label>
                            </td>
                            <td>
                                <input type="text" name="txfLogin" placeholder="Login" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txfContrasenia">Contraseña</label>
                            </td>
                            <td>
                                <input type="text" name="txfContrasenia" placeholder="Contraseña" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txfContraseniaConf">Confirmar contraseña</label>
                            </td>
                            <td>
                                <input type="text" name="txfContraseniaConf" placeholder="Confirmar" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cmbRol">Rol</label>
                            </td>
                            <td>
                                <select name="cmbRol">
                                    <option value="">Seleccione Rol</option>
                                        <?php
                                        foreach ($roles as $rol):?>
                                        <option value="<?php echo $rol['idRol']; ?>"><?php echo $rol['nombreRol'] ;?></option>
                                        <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cmbIdentificacionEmpleado">Identifiación Empleado</label>
                            </td>
                            <td>
                                <select name="cmbIdentificacionEmpleado">
                                    <option value="">Seleccione empleado</option>
                                    <?php
                                        foreach ($empleados as $empleado):?>
                                        <option value="<?php echo $empleado['idEmpleado']; ?>"><?php echo $empleado['numeroIdentificacionEmpleado'] ;?></option>
                                        <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type="submit" name="btnRegistrarUsuario" value="Registrar">
                                <a href="../index.php"><input type="button" value="Atras" name="btnAtras"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </body>
</html>