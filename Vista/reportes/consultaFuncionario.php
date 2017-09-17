<?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=funcionariosCentroFormacion.xls");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table width="100%" border="1">
    <thead>
        <th>Numero identificacion</th>
        <th>Tipo de Documento</th>
        <th>Nombres Funcionario</th>
        <th>Apellidos Funcionario</th>
        <th>Genero</th>
        <th>Fecha Nacimiento</th>
        <th>Centro de Formacion</th>
        <th>Regional</th>
        <th>Estado</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Movil</th>
        <th>Correo</th>
    </thead>
    <tbody>
        <?php 
            foreach ($regitros as $v) {
                echo "<tr>";
                echo "<td>".$v['numeroIdentificacionFuncionario']."</td>";
                echo "<td>".$v['tipoDocumento']."</td>";
                echo "<td>".$v['nombresFuncionario']."</td>";
                echo "<td>".$v['apellidosFuncionario']."</td>";
                echo "<td>".$v['tipoGenero']."</td>";
                echo "<td>".$v['fechaNacimientoFuncionario']."</td>";
                echo "<td>".$v['nombreCentroFormacion']."</td>";
                echo "<td>".$v['nombreRegional']."</td>";
                echo "<td>".$v['estadoFuncionario']."</td>";
                echo "<td>".$v['direccionFuncionario']."</td>";
                echo "<td>".$v['telefonoFuncionario']."</td>";
                echo "<td>".$v['movilFuncionario']."</td>";
                echo "<td>".$v['correoFuncionario']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>