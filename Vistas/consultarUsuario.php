<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombres
                    </th>
                    <th>
                        Apellidos
                    </th>
                    <th>
                        Login
                    </th>
                    <th>
                        Rol
                    </th>
                    <th>
                        Identificacion empleado
                    </th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php echo $usuario['idUsuario']; ?></td>
                    <td><?php echo $usuario['nombresUsuario']; ?></td>
                    <td><?php echo $usuario['apellidosUsuario']; ?></td>
                    <td><?php echo $usuario['inicioSesion']; ?></td>
                    <td><?php echo $usuario['nombreRol']; ?></td>
                    <td><?php echo $usuario['numeroIdentificacionEmpleado']; ?></td>
                    <td>
                        <form action="" method="POST">
                            <button type="submit" name="btnEditarUsuario">Editar</button>
                            <input type="hidden" name="metodo" value="editarUsuario">
                            <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <button type="submit" name="btnEliminarUsuario">Eliminar</button>
                            <input type="hidden" name="metodo" value="eliminarUsuario">
                            <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
