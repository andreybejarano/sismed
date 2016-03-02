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
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-spinner fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>Citas del día</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ir a citas</span>
                            <span class="pull-right glyphicon glyphicon-thumbs-up"></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">10</div>
                                <div>FEBRERO, 2016</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ver calendario</span>
                            <span class="pull-right glyphicon glyphicon-info-sign"></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->       
        <div class="row letraForms">
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Busqueda rápida de beneficiario</h3>
                    </div>
                    <div class="panel-body">
                        <nav class="navbar navbar">
                            <form class="form-horizontal navbar-form" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Buscar paciente">
                                </div>
                                <button type="submit" class="btn btn-info">Buscar</button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Resultado de búsqueda</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>NickName</th>
                                        <th>Contraseña</th>
                                        <th>Rol</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gustavo</td>
                                        <td>Galindez</td>
                                        <td>GGALINDEZ</td>
                                        <td>123456</td>
                                        <td>ADMIN</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-xs btn-success">Editar Usuario</button>
                                                <button type="button" class="btn btn-xs btn-danger">Eliminar Usuario</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.row -->

        <!-- row para pruebas e includes -->
        <div class="row">
            <?php Vista::mostrar('crearAyudaDiagnostica'); ?>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <!--Para agregar mi carousel con bootstrap utilizo estas clases-->
                <div id="carousel-1" class="carousel slide" data-ride="carousel">
                    <!--Indicadores: son los circulos que me dicen a que imagen dirigirme-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                    <!--contenedor de los slide-->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?php echo URL_BASE; ?>Vista/img/slide0.jpg" alt="" class="img-responsive">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3>Sena Cali <small>Sede: Salomia</small></h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, molestiae. </p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo URL_BASE; ?>Vista/img/slide1.jpg" alt="" class="img-responsive">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3>Cristo <small>Rey</small></h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque </p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo URL_BASE; ?>Vista/img/slide2.jpg" alt="" class="img-responsive">
                            <div class="carousel-caption hidden-xs hidden-sm">
                                <h3>Mejorando nuestro servicio <small>Tu salud es importante</small></h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, molestiae. </p>
                            </div>
                        </div>
                    </div>
                    <!--Controles: flechas-->
                    <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div><!--row  -->
    </div><!-- /.container-fluid -->


</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>