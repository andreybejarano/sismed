<div id="modalRegistrarRol" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Rol</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'roles/insertarRol'; ?>">
                    <div class="form-group">
                        <label for="txfNombreRol">Nombre Rol</label>
                        <input type="text" id="txfNombreRol" name="txfNombreRol" class="form-control" placeholder="Nombre Rol " maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label for="txfDescipcionRol">Descripcion Rol</label>
                        <input type="text" id="txfDescipcionRol" name="txfDescipcionRol" class="form-control" placeholder="Descripcion Rol " maxlength="45" required>
                        <span id="errorPasswors" hidden style="color: red"></span>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarCargo" id="btnRegistrarCargo"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>