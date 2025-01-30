<?php
include 'BBDD_connection/conexion.php';
$consulta = "SELECT COUNT(*) AS total_plazas FROM plazas WHERE identificador_zona LIKE 'T%' AND ocupada = 0";
$total = mysqli_query($conn, $consulta);
$total_plazas_tiendas = 0;
if ($total) {
    $fila = $total->fetch_assoc();
    $total_plazas_tiendas = $fila['total_plazas'];
}
?>