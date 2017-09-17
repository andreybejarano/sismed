<div id="modalRegistrarCentroMedico" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar centro Medico</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'centrosMedicos/insertarCentroMedico'; ?>">
                    <div class="form-group">
                        <label for="txfNombreCentroMedico">Nombre </label>
                        <input type="text" id="txfNombreCentroMedico" name="txfNombreCentroMedico" class="form-control" placeholder="Nombre centro de Medico" minlength="1" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="txfTelefonoCentroMedico">Telefono</label>
                        <input type="number" id="txfTelefonoCentroMedico" name="txfTelefonoCentroMedico" class="form-control" placeholder="Telefono" onKeyDown="if(this.value.length==20 && event.keyCode!=8) return false;" required maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="txfCelularCentroMedico">Celular</label>
                        <input type="number" id="txfCelularCentroMedico" name="txfCelularCentroMedico" class="form-control" placeholder="Celular" onKeyDown="if(this.value.length==20 && event.keyCode!=8) return false;" required maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="txfDireccionCentroMedico">Direccion</label>
                        <input type="text" id="txfDireccionCentroMedico" name="txfDireccionCentroMedico" class="form-control" placeholder="Direccion" minlength="1" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="txfCorreoCentroMedico">Correo electronico</label>
                        <input type="email" id="txfCorreoCentroMedico" name="txfCorreoCentroMedico" class="form-control" placeholder="Correo electronico" minlength="1" maxlength="30"  required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarCentroMedico" id="btnRegistrarCentroMedico"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>