<div id="modalRegistrarMedicamento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar medicamento</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'medicamentos/insertarMedicamento'; ?>">
                    <div class="form-group">
                        <label for="txfCodigoMedicamento">Codigo</label>
                        <input type="text" id="txfCodigoMedicamento" name="txfCodigoMedicamento" class="form-control" placeholder="Codigo" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="txfNombreMedicamento">Nombre Generico</label>
                        <input type="text" id="txfNombreMedicamento" name="txfNombreMedicamento" class="form-control" placeholder="Nombre Generico" required maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="txfDescripcionMedicamento">Descripcion</label>
                        <input type="text" id="txfDescripcionMedicamento" name="txfDescripcionMedicamento" class="form-control" placeholder="Descripcion" required maxlength="300">
                    </div>
                    <div class="form-group">
                        <label for="txfFormaFarmaceuticaMedicamento">Formula farmaceutica</label>
                        <input type="text" id="txfFormaFarmaceuticaMedicamento" name="txfFormaFarmaceuticaMedicamento" class="form-control" placeholder="Formula farmaceutica" required maxlength="60">
                    </div>
                    <div class="form-group">
                        <label for="txfConcentracionMedicamento">Concentracion</label>
                        <input type="text" id="txfConcentracionMedicamento" name="txfConcentracionMedicamento" class="form-control" placeholder="Concentracion" required maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="txfDosisMedicamento">Dosis</label>
                        <input type="text" id="txfDosisMedicamento" name="txfDosisMedicamento" class="form-control" placeholder="Dosis" required maxlength="16">
                    </div>
                    <div class="form-group">
                        <label for="txfViaFrecuenciaAdministracionMedicamento">Via frecuencia administracion</label>
                        <input type="text" id="txfViaFrecuenciaAdministracionMedicamento" name="txfViaFrecuenciaAdministracionMedicamento" class="form-control" placeholder="Via frecuencia administracion" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="txfRegistroInvimaMedicamento">Registro invima</label>
                        <input type="text" id="txfRegistroInvimaMedicamento" name="txfRegistroInvimaMedicamento" class="form-control" placeholder="Registro invima" required maxlength="20">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarMedicamento" id="btnRegistrarMedicamento"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>