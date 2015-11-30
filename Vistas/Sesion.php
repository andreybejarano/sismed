<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../Vistas/css/style.css">
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        ?>
        <form action="../Controladores/sesionControlador.php" method="POST">
            <fieldset id="fieldsetLogin">
                <legend>Inicio de sesion</legend>
                <table id="table">
                    <tr>
                        <td>
                            <label for="txfLogin">Usuario</label>
                        </td>
                        <td>
                            <input type="text" name="txfLogin" placeholder="Usuario">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="txfContrasenia">Contraseña</label>
                        </td>
                        <td>
                            <input type="password" name="txfContrasenia" placeholder="Contraseña">
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            <button type="submit" name="btnIniciar">
                                Iniciar Sesion
                            </button>
                            <a href="Registrar.php">Registrar</a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>
