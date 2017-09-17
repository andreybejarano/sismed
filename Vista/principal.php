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
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-spinner fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" id="ContadorCitas"></div>
                                <div>Citas del día</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo URL_BASE; ?>citasMedicas/citas">
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
                                <?php $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre','Octubre', 'Noviembre', 'Diciembre'); ?>
                                <div class="huge" id="dia"><?php echo date('d') ?></div>
                                <?php echo " de ".$arrayMeses[date('m')-1]." de ".date('Y'); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo URL_BASE; ?>agendasMedicas/agenda">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Agendas Medicas</span>
                            <span class="pull-right glyphicon glyphicon-info-sign"></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->       
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="input-group">
                    <input type="text" name="txtBuscar" id="txtBuscar" class="form-control" placeholder="Buscar paciente">
                    <span class="input-group-btn">
                        <button class="btn btn-info" id="btnBuscar" type="button">Buscar</button>
                    </span>
                </div>
            </div>
            <div class="row" style="margin-bottom:5px;"></div>
            
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Citas para hoy</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                    <table id="tblCitasMedicas" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Registro
                                </th>
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Hora
                                </th>
                                <th>
                                    Duracion
                                </th>
                                <th>
                                    Comentarios
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Cedula
                                </th>
                                <th>
                                    Beneficiario
                                </th>
                                <th>
                                    Consultorio
                                </th>
                                <th>
                                    Médico
                                </th>
                                <th colspan="3" class='text-center'>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>              
                        </tbody>
                    </table>
                    <div id="oculto"></div>
                </div>
                </div>
            </div>
        </div><!-- /.row -->
        <!-- row para pruebas e includes -->
        <div class="row">
            <?php //Vista::mostrar('crearAyudaDiagnostica'); ?>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>
<script type="text/javascript" src="<?php echo URL_BASE; ?>Vista/js/principal.js"></script>