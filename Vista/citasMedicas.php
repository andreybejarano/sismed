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
        <div class="row" style="margin-top: 10px"></div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="input-group" style="">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                        <input type="text" name="txtBuscar" id="txtBuscar" class="form-control" placeholder="Identificacion benficiario">
                        <span style=""class="input-group-btn">
                        <button class="btn btn-info" id="btnBuscar" type="button">Buscar</button>
                        </span>
                        <div style="margin-left:5px;"></div>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                        <input type="text" name="txfFecha" id="txfFecha" class="form-control" placeholder="Fecha cita medica">
                        <span class="input-group-btn">
                        <button class="btn btn-info" id="btnFecha" type="button">Buscar</button>
                        </span>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-info col-xs-12" data-toggle="modal" data-target="#modalRegistrarCitaMedica">Crear Cita Medica</button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px"></div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Citas Medicas</h3>
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
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie', $datos); ?>
<script type="text/javascript" src="<?php echo URL_BASE; ?>Vista/js/citasMedicas.js"></script>
<?php Vista::mostrar('registrarCitaMedica', $datos); ?>