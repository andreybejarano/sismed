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
        <form method="POST" action="<?php echo URL_BASE . 'centrosMedicos/editarCentroMedico'; ?>" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="form-group">
                <label for="txfNombreCentroMedico">Nombre </label>
                <input type="text" id="txfNombreCentroMedico" name="txfNombreCentroMedico" class="form-control" placeholder="Nombre centro Medico" value="<?php echo $centroMedico[0]['nombreCentroMedico']; ?>" minlength="1" maxlength="60" required>
            </div>
            <div class="form-group">
                <label for="txfTelefonoCentroMedico">Telefono</label>
                <input type="number" id="txfTelefonoCentroMedico" name="txfTelefonoCentroMedico" class="form-control" placeholder="Telefono" value="<?php echo $centroMedico[0]['telefonoCentroMedico']; ?>" onKeyDown="if(this.value.length==20 && event.keyCode!=8) return false;" minlength="1" maxlength="60" required>
            </div>
            <div class="form-group">
                <label for="txfCelularCentroMedico">Celular</label>
                <input type="number" id="txfCelularCentroMedico" name="txfCelularCentroMedico" class="form-control" placeholder="Celular" value="<?php echo $centroMedico[0]['celularCentroMedico']; ?>" onKeyDown="if(this.value.length==20 && event.keyCode!=8) return false;" minlength="1" maxlength="60" required>
            </div>
            <div class="form-group">
                <label for="txfDireccionCentroMedico">Direccion</label>
                <input type="text" id="txfDireccionCentroMedico" name="txfDireccionCentroMedico" class="form-control" placeholder="Direccion" value="<?php echo $centroMedico[0]['direccionCentroMedico']; ?>" minlength="1" maxlength="60" required>
            </div>
            <div class="form-group">
                <label for="txfCorreoCentroMedico">Correo electronico</label>
                <input type="email" id="txfCorreoCentroMedico" name="txfCorreoCentroMedico" class="form-control" placeholder="Direccion" value="<?php echo $centroMedico[0]['correoCentroMedico']; ?>" minlength="1" maxlength="60" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'centrosMedicos/centrosMedicos'; ?>">ATRAS</a></button>
            <input type="hidden" name="idCentroMedico" value="<?php echo $centroMedico[0]['idCentroMedico']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>