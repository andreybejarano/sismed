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
        <form method="POST" action="<?php echo URL_BASE . 'medicamentos/editarMedicamento'; ?>" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="form-group">
                <label for="txfCodigoMedicamento">Código </label>
                <input type="text" id="txfCodigoMedicamento" name="txfCodigoMedicamento" class="form-control" placeholder="Código" value="<?php echo $medicamento[0]['codigoMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfNombreGenericoMedicamento">Nombre generico</label>
                <input type="text" id="txfNombreGenericoMedicamento" name="txfNombreMedicamento" class="form-control" placeholder="Nombre generico" value="<?php echo $medicamento[0]['nombreGenericoMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfDescripcionMedicamento">Descripcion</label>
                <input type="text" id="txfDescripcionMedicamento" name="txfDescripcionMedicamento" class="form-control" placeholder="Descripcion" value="<?php echo $medicamento[0]['descripcionMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfFormaFarmaceuticaMedicamento">Forma Farmaceutica</label>
                <input type="text" id="txfFormaFarmaceuticaMedicamento" name="txfFormaFarmaceuticaMedicamento" class="form-control" placeholder="Forma Farmaceutica" value="<?php echo $medicamento[0]['formaFarmaceuticaMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfConcentracionMedicamento">Concentracion</label>
                <input type="text" id="txfConcentracionMedicamento" name="txfConcentracionMedicamento" class="form-control" placeholder="Concentracion" value="<?php echo $medicamento[0]['concentracionMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfDosisMedicamento">Dosis</label>
                <input type="text" id="txfDosisMedicamento" name="txfDosisMedicamento" class="form-control" placeholder="Dosis" value="<?php echo $medicamento[0]['dosisMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfViaFrecuenciaAdministracionMedicamento">Via Frecuancia administracion</label>
                <input type="text" id="txfViaFrecuenciaAdministracionMedicamento" name="txfViaFrecuenciaAdministracionMedicamento" class="form-control" placeholder="Via Frecuancia administracion" value="<?php echo $medicamento[0]['viaFrecuenciaAdministracionMedicamento']; ?>">
            </div>
            <div class="form-group">
                <label for="txfRegistroInvimaMedicamento">Registro invima</label>
                <input type="text" id="txfRegistroInvimaMedicamento" name="txfRegistroInvimaMedicamento" class="form-control" placeholder="Registro invima" value="<?php echo $medicamento[0]['registroInvimaMedicamento']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button> 
            <button class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'medicamentos/medicamentos'; ?>">ATRAS</a></button>
            <input type="hidden" name="idMedicamento" value="<?php echo $medicamento[0]['idMedicamento']; ?>">
        </form>
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>