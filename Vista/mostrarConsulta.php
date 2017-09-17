<?php
Vista::mostrar('plantillas/_encabezado', $datos);
Vista::mostrar('plantillas/_menuSuperior', $datos);
Vista::mostrar('plantillas/_menuLateral');
?>

<div id="page-wrapper" style=" min-height:30em ">
    <div class="container-fluid fondoFluid" id="formArea">
        <!-- encabezado wrapper -->
        <?php Vista::mostrar('plantillas/_eslogan'); ?>
        <div class="panel panel-info">
            <div class="panel-heading">Cita Medica</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Datos del beneficiario: </td>
                        <td>Cita medica programada para el beneficiario 
                        <strong><?php  echo $beneficiario[0]['nombresBeneficiario']." ". $beneficiario[0]['apellidosBeneficiario']; ?></strong>
                        con numero de identificacion <strong><?php echo$beneficiario[0]['numeroIdentificacionBeneficiario'];?></strong> de tipo 
                        <strong><?php echo $beneficiario[0]['tipoDocumento'] ?></strong>, vinculado al funcionario 
                        <strong><?php  echo $beneficiario[0]['nombresFuncionario']." ". $beneficiario[0]['apellidosFuncionario']; ?></strong> identificado con el numero de identificacion "<strong><?php echo  $beneficiario[0]['numeroIdentificacionFuncionario']?></strong> de tipo <strong><?php echo $beneficiario[0]['tipoDocumento'] ?></strong> perteneciente al 
                        <strong><?php echo $beneficiario[0]['nombreCentroFormacion']?></strong></td>
                    </tr>
                    <tr>
                        <td>Datos del Medico: </td>
                        <td>Cita medica programada para ser atendida por el medico 
                        <strong><?php echo $empleado[0]['nombresEmpleado']. " ". $empleado[0]['apellidosEmpleado']; ?></strong>
                        con numero de identificacion <strong><?php echo $empleado[0]['numeroIdentificacionEmpleado'] ?></strong> de tipo <strong><?php echo $empleado[0]['tipoDocumento'] ?></strong> perteneciente al sistema medico de sena</td>
                    </tr>
                    <tr>
                        <td>Fecha y Hora del registro: </td>
                        <td><?php echo $citaMedica[0]['fechaHoraRegistroCitaMedica'];?></td>
                    </tr>
                    <tr>
                        <td>duracion: </td>
                        <td><?php echo $citaMedica[0]['duracionCitaMedica'];?></td>
                    </tr>
                    <tr>
                        <td>comentarios: </td>
                        <td><?php echo $citaMedica[0]['comentariosCitaMedica'];?></td>
                    </tr>
                    <tr>
                        <td>Fecha y Hora de la cita medica: </td>
                        <td><?php echo "". $citaMedica[0]['fechaAgendaMedica'] ." a las ".$citaMedica[0]['hora'];?></td>
                    </tr>
                    <tr>
                        <td>consultorio: </td>
                        <td><?php echo "". $citaMedica[0]['numeroConsultorio']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading">Episodio</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Fecha y hora del episodio</td>
                        <td><?php echo $episodio[0]['fechaHoraAtencionEpisodio'] ?></td>
                    </tr>
                    <tr>
                        <td>peso: </td>
                        <td><?php echo $episodio[0]['pesoEpisodio'] ?></td>
                    </tr>
                    <tr>
                        <td>temperatura: </td>
                        <td><?php echo $episodio[0]['temperaturaEpisodio'] ?></td>
                    </tr>
                    <tr>
                        <td>Presion Arterial: </td>
                        <td><?php echo $episodio[0]['presionArterialEpisodio'] ?></td>
                    </tr>
                    <tr>
                        <td>Anamnesis: </td>
                        <td><?php echo $episodio[0]['anamnesisEpisodio'] ?></td>
                    </tr>
                    <tr>
                        <td>Exploracion: </td>
                        <td><?php echo $episodio[0]['exploracionEpisodio'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading">Diagnostico</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Descripcion del diagnostico: </td>
                        <td><?php echo $diagnostico[0]['descripcionDiagnostico'] ?></td>
                    </tr>
                    <tr>
                        <td>Enfermedad asociada: </td>
                        <td><?php echo $diagnostico[0]['nombreEnfermedad'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading">Ordenes</div>
            <div class="panel-body">
                <table id="tblOrdenes" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Fecha / Hora
                            </th>
                            <th>
                                Cantidad
                            </th>
                            <th>
                                Observaciones
                            </th>
                            <th>
                                Tipo de Orden
                            </th>
                        </tr>
                    </thead>
                    <tbody>              
                    </tbody>
                </table>
            </div>
        </div>
        
        <div id="formulaMedica" class="panel panel-info">
            

        <div class="panel-heading">Formula Medica</div>
        
            <div class="responsive">
                <img src="<?php echo URL_BASE; ?>Vista/img/logo2.png" alt="" class="img-responsive" style="max-widht:150px; max-height:150px;">
                <ul>
                    <li class="letraTitulos">
                    Sistema de gestión de citas y formulación médica
                    </li>
                </ul>
            </div>
            
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Observaciones de la formula medica:</td>
                        <td><?php echo $formula[0]['observacionesFormulaMedica'] ?></td>
                    </tr>
                </table>
                <table id="tblMedicamentos" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Codigo Medicamento
                            </th>
                            <th>
                                Nombre Generico
                            </th>
                            <th>
                                Descripcion
                            </th>
                            <th>
                                Cantidad
                            </th>
                            <th>
                                Dosificacion
                            </th>
                        </tr>
                    </thead>
                    <tbody>              
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" id="idEpisodio" name="idEpisodio" value="<?php echo $episodio[0]['idEpisodio'] ?>"/>
        <input type="hidden" id="idFormula" name="idFormula" value="<?php echo $formula[0]['idFormulaMedica'] ?>"/>
        
        <!--Funcion para imprimir el documento fisico-->
        
        <style type='text/css' media='print'> 
            .noimp {display:none} 
        </style>
        <button class="btn btn-primary noimp" id="btnImprimir" type="button" onclick="javascript:imprSelec('page-wrapper')" ><i class='fa fa-print fa-10x'></i> Imprimir</button>
        
        <button type="button" id="btnImprimirFormula" class="btn btn-primary noimp" onclick="javascript:imprSelec('formulaMedica')"><i class='fa fa-print fa-10x'></i> Imprimir Formula</button>
    </div>

</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php Vista::mostrar('plantillas/_pie', $datos); ?>

<script type="text/javascript">

// Funcion para imprimir un div content

	function imprSelec(el){
    	var restorepage = document.body.innerHTML;
    	var imprSelec = document.getElementById(el).innerHTML;
    	document.body.innerHTML = imprSelec;
    	window.print();
    	document.body.innerHTML = restorepage;
    }

    var idEpisodio = $('#idEpisodio').val();
    $.post('<?php echo URL_BASE; ?>consultas/listarOrdenes', {idEpisodio:idEpisodio}, function(data) {
        var datos= JSON.parse(data);
        var fila='';
        var cont=0;
        $.each(datos, function(i, v) {
            fila +='<tr>';
            fila += "<td>" + v.fechaHoraOrden + "</td>";
            fila += "<td>" + v.cantidadOrden + "</td>";
            fila += "<td>" + v.observacionOrden + "</td>";
            fila += "<td>" + v.descripcionTipoOrden + "</td>";
            fila += "</tr>";
        });
        $('#tblOrdenes').append(fila);
    });
    
    var idFormula = $('#idFormula').val();
    $.post('<?php echo URL_BASE; ?>consultas/listarMedicamentos', {idFormula:idFormula}, function(data) {
        var datos= JSON.parse(data);
        var fila='';
        var cont=0;
        $.each(datos, function(i, v) {
            fila +='<tr>';
            fila += "<td>" + v.codigoMedicamento + "</td>";
            fila += "<td>" + v.nombreGenericoMedicamento + "</td>";
            fila += "<td>" + v.descripcionMedicamento + "</td>";
            fila += "<td>" + v.cantidadMedicamento + "</td>";
            fila += "<td>" + v.dosificacionMedicamento  + "</td>";
            fila += "</tr>";
        });
        $('#tblMedicamentos').append(fila);
    });
</script>

<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }
    
    ;
    function Popup(data) 
    {
        var mywindow = window.open('', 'Historial Medico', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Historial Medico</title>');
        /*optional stylesheet*/ 
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>