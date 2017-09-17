<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan'); ?>
        <form method="POST" action="<?php echo URL_BASE . 'enfermedades/editarEnfermedad'; ?>">
            <div class="form-group">
                <label for="txfNombreEnfermedad">Nombre </label>
                <input type="text" id="txfNombreEnfermedad" name="txfNombreEnfermedad" class="form-control" placeholder="Nombre enfermedad" value="<?php echo $enfermedad[0]['nombreEnfermedad']; ?>">
            </div>
            <div class="form-group">
                <label for="txfSintomatologiaEnfermedad">Sintomatologia</label>
                <textarea maxlength="100" id="txfSintomatologiaEnfermedad" name="txfSintomatologiaEnfermedad" class="form-control" placeholder="Sintomatologia"><?php echo $enfermedad[0]['sintomatologiaEnfermedad']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="txfTratamientoEnfermedad">Tratamiento</label>
                <textarea maxlength="100" id="txfTratamientoEnfermedad" name="txfTratamientoEnfermedad" class="form-control" placeholder="Tratamiento"><?php echo $enfermedad[0]['tratamientoEnfermedad']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar"> GUARDAR </button> 
            <button type="button" class="btn btn-primary" name="btnAtras" id="btnAtras"><a style="text-decoration: none;color:#fff" href="<?php echo URL_BASE . 'enfermedades/enfermedades'; ?>">ATRAS</a></button>
            <input type="hidden" name="idEnfermedad" value="<?php echo $enfermedad[0]['idEnfermedad']; ?>">
        </form>

    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie'); ?>