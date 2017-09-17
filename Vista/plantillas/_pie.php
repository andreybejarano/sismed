<?php if (isset($mensaje)) { ?>
    <div class="modal fade bs-example-modal-sm" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Mensaje</h4>
                </div>
                <div class="modal-body">
                    <?php echo $mensaje; ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

</div><!-- /#wrapper -->


<!-- jQuery -->
<script src="<?php echo URL_BASE; ?>Vista/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL_BASE; ?>Vista/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo URL_BASE; ?>Vista/js/plugins/morris/raphael.min.js"></script>

<!-- DateTimePicker -->
<script src="<?php echo URL_BASE; ?>Vista/js/jquery.datetimepicker.full.min.js"></script>

<script type="text/javascript">
    $('#modalMensaje').modal('show');
    
    $('#btnAtras').click(function () {
        history.back();
    });
    
    $.datetimepicker.setLocale('es');
</script>
<!--Jquery form ajax-->
<script src="<?php echo URL_BASE; ?>Vista/js/jquery.form.js"></script>
</body>
</html>
