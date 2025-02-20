<?php
$host = 'localhost';
$dbname = 'guayracamp';
$username = 'root';
$password = '1234';

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    $status = "Conexión exitosa";
}
?>
