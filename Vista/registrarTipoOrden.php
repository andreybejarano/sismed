<div id="modalRegistrarTipoOrden" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar Tipo de Orden</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'tipoOrdenes/insertarTipoOrden'; ?>">
                    <div class="form-group">
                        <label for="txfTipoOrden">Tipo de Orden</label>
                        <input type="text" id="txfTipoOrden" name="txfTipoOrden" class="form-control" placeholder="Tipo de Orden " required>
                    </div>
                    <div class="form-group">
                        <label for="txfDescipcionRol">Descripcion Tipo de Orden</label>
                        <input type="text" id="txfDescripcionTipoOrden" name="txfDescripcionTipoOrden" class="form-control" placeholder="Descripcion Tipo de Orden " required>
                        <span id="errorPasswors" hidden style="color: red"></span>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarTipoOrden" id="btnRegistrarTipoOrden"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>