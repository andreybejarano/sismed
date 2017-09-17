<?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=citasMedico.xls");
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
        <th>Fecha Hora Registro</th>
        <th>Fecha cita</th>
        <th>Hora cita</th>
        <th>Comentarios</th>
        <th>EstadoCitaMedica</th>
        <th>Numero identificacion</th>
        <th>Nombres beneficiario</th>
        <th>Apellidos Beneficiario</th>
        <th>Nombres Medico</th>
        <th>Apellidos Medico</th>
        <th>Consultorio</th>
    </thead>
    <tbody>
        <?php 
            foreach ($regitros as $v) {
                echo "<tr>";
                echo "<td>".$v['idCitaMedica']."</td>";
                echo "<td>".$v['fechaHoraRegistroCitaMedica']."</td>";
                echo "<td>".$v['fechaAgendaMedica']."</td>";
                echo "<td>".$v['hora']."</td>";
                echo "<td>".$v['comentariosCitaMedica']."</td>";
                echo "<td>".$v['estadoCitaMedica']."</td>";
                echo "<td>".$v['numeroIdentificacionBeneficiario']."</td>";
                echo "<td>".$v['nombresBeneficiario']."</td>";
                echo "<td>".$v['apellidosBeneficiario']."</td>";
                echo "<td>".$v['nombresEmpleado']."</td>";
                echo "<td>".$v['apellidosEmpleado']."</td>";
                echo "<td>".$v['numeroConsultorio']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>