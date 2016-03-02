<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Inicia Sesión</title>
        <link rel="stylesheet" href="<?php echo URL_BASE; ?>Vista/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo URL_BASE; ?>Vista/css/login-logo.css">
        <link rel="shortcut icon" href="<?php echo URL_BASE; ?>Vista/img/favicon.png" type="image/x-icon">
    </head>
    <body>
        <div class="container container-fluid">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12" style="margin-top: 10px">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="page-header" style="margin-top: 0px">
                                <div class="login-logo" >
                                    <img class="img-responsive" src="<?php echo URL_BASE; ?>Vista/img/Logo.png" alt="Company Logo" style="max-width: 100%; max-height: 100%;"/>
                                </div>
                            </div>
                            <form role="form" action="<?php echo URL_BASE; ?>sesion/principal" method="POST">
                                <div class="form-group">
                                    <label for="">Correo electronico</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="email" name="txtLogin" class="form-control" placeholder="Correo electronico" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" name="txtContrasenia" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <p class="text-center">
                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Iniciar sesión</button>
                                </p>
                            </form>
                            <?php if (isset($mensaje)): ?>
                                <p class="text-muted"><?php echo $mensaje; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center" id="footer-text"><small>Sismed &copy; 2015 </small></p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo URL_BASE; ?>Vista/js/jquery.js"></script>
        <script src="<?php echo URL_BASE; ?>Vista/js/bootstrap.min.js"></script>
    </body>
</html>
