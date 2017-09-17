<?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=RemisionesBeneficiarios.xls");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table width="100%" border="1">
    <thead>
        <th>Id</th>
        <th>Fecha Hora orden</th>
        <th>Cantidad Orden</th>
        <th>Observacion Orden</th>
        <th>Tipo</th>
        <th>Identificacion Beneficiario</th>
        <th>Nombres beneficiario</th>
        <th>Apellidos Beneficiario</th>
    </thead>
    <tbody>
        <?php 
            foreach ($regitros as $v) {
                echo "<tr>";
                echo "<td>".$v['idOrden']."</td>";
                echo "<td>".$v['fechaHoraOrden']."</td>";
                echo "<td>".$v['cantidadOrden']."</td>";
                echo "<td>".$v['descripcionTipoOrden']."</td>";
                echo "<td>".$v['numeroIdentificacionBeneficiario']."</td>";
                echo "<td>".$v['nombresBeneficiario']."</td>";
                echo "<td>".$v['apellidosBeneficiario']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html> 