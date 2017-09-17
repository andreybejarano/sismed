<div id="modalRegistrarEnfermedad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Insertar Enfermedad</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URL_BASE . 'enfermedades/insertarEnfermedad'; ?>">
                    <div class="form-group">
                        <label for="txfNombreEnfermedad">Nombre </label>
                        <input type="text" id="txfNombreEnfermedad" name="txfNombreEnfermedad" class="form-control" placeholder="Nombre enfermedad" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="txfSintomatologiaEnfermedad">Sintomatologia</label>
                        <textarea maxlength="100" id="txfSintomatologiaEnfermedad" name="txfSintomatologiaEnfermedad" class="form-control" placeholder="Sintomatologia" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txfTratamientoEnfermedad">Tratamiento</label>
                        <textarea maxlength="100" id="txfTratamientoEnfermedad" name="txfTratamientoEnfermedad" class="form-control" placeholder="Tratamiento" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnRegistrarEnfermedad" id="btnRegistrarEnfermedad"> ENVIAR </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>