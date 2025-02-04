<?php
include "BBDD_connection/conexion.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if($_POST['matricula'] == ""){
        $_POST['matricula'] = "Sin vehículo";
    }
    $campos = [
        'nombre' => trim($_POST['nombre']),
        'apellido' => trim($_POST['apellido']),
        'dni' => trim($_POST['dni']),
        'correo' => trim($_POST['correo']),
        'password' => trim($_POST['password']),
        'telefono' => trim($_POST['telefono']),
        'matricula' => trim($_POST['matricula'])
    ];

    // Filtrar los valores vacíos
    $campo_vacio = array_filter($campos, function ($valor) {
        return empty($valor);
    });

    // Si hay campos vacíos, mostrar mensaje y detener ejecución
    if (!empty($campo_vacio)) {
        $codError = array_key_first($campo_vacio);
        header("Location: registro.php?codError=$codError");
        exit;
    }

    // Comprobar si el dni ya está registrado
    $stmt = $conn->prepare("SELECT dni FROM usuarios WHERE dni = ?");
    $stmt->bind_param("s", $campos['dni']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        header("Location: registro.php?codError=7");
        exit;
    }

    // Hashear la contraseña
    $campos['password'] = password_hash($campos['password'], PASSWORD_DEFAULT);

    // Preparar la consulta
    $sql = "INSERT INTO usuarios (nombre, apellido, dni, correo, contrasena, telefono, matricula_vehiculo) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
        // Enlazamos los parámetros
        $stmt->bind_param("sssssss", 
        $campos['nombre'], 
        $campos['apellido'], 
        $campos['dni'], 
        $campos['correo'], 
        $campos['password'], 
        $campos['telefono'], 
        $campos['matricula']
);
        // Ejecutamos la consulta
        if ($stmt->execute()) {
            session_start();
            $_SESSION["correo"] = $campos['correo'];
            header("Location: espacio_personal/espacio_personal.php");
            exit;
        } else {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
    
        // Cerramos la conexión
        $stmt->close();
        $conn->close();
    

}
?>