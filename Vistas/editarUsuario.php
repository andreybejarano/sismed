<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
                <input type="hidden" name="metodo" value="editarUsuario">
                <div>
                    <label for="idUsuario">ID usuario: </label> 
                    <input type="text" name="txfIdUsuario" value="" readonly>
                </div>
                <div>
                    <label for="txfNombresUsuario">Nombres Usuario: </label>
                    <input type="text" name="txfNombresUsuario" value="" >
                </div>
                <div>
                    <label for="txfApellidosUsuario">Apellidos usuario: </label>
                    <input type="text" name="txfApellidosUsuario" value="" >
                </div>
                <div>
                    <label for="txfLoginUsuario">Login: </label>
                    <input type="text" name="txfLogin" value="" >
                </div>
                <div>
                    <label for="txfContraseniaUsuario">Contraseña: </label>
                    <input type="text" name="txfContrasenia" value="" >
                </div>
                <div>
                    <label for="cmbRoles">Rol: </label>
                    <select name="cmbRoles">
                        <option value="">
                            
                        </option>
                        <option value="">
                            
                        </option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="btnGrabar" value="Grabar">
                    <a href="../Vistas/Usuarios.php"><input type="button" value="Atras" name="btnAtras"></a>
                </div>
        </form>
    </body>
</html>
