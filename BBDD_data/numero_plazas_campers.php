<?php
include 'BBDD_connection/conexion.php';
$consulta = "SELECT COUNT(*) AS total_plazas FROM plazas WHERE identificador_zona LIKE 'C%' AND ocupada = 0";
$total = mysqli_query($conn, $consulta);
$total_plazas_campers = 0;
if ($total) {
    $fila = $total->fetch_assoc();
    $total_plazas_campers = $fila['total_plazas'];
}
?>