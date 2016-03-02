<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="principal.php"><img src="<?php echo URL_BASE; ?>Vista/img/Logo3.png" alt="" class="img-responsive" style="max-height:108px; max-width:108px;"></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav letraTitulos">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo URL_BASE . 'sesion/cerrarSesion'; ?>"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                    </li>
                </ul>
            </li>
        </ul>