<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>
        <form action="../Controladores/usuariosControlador.php" method="POST">
            <button type="submit" name="btnCrearUsuario">Crear usuario</button>
            <input type="hidden" name="metodo" value="insertarUsuario">
        </form>
        <form action="../Controladores/usuariosControlador.php" method="POST">
            <button type="submit" name="btnConsultarUsuarios">Consultar usuarios</button>
            <input type="hidden" name="metodo" value="listarUsuarios">
        </form>
    </body>
</html>
