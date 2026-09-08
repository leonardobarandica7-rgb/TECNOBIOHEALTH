<?php
// Incluir el archivo de conexión
require 'conexion.php';

if (isset($_POST['registro'])) {

    // Obtener los valores del formulario
    $usuario = trim($_POST['nombre_user']);
    $contrasena = trim($_POST['contrasena_user']);
    $correo = trim($_POST['correo_user']);

    if (!empty($usuario) && !empty($contrasena) && !empty($correo)) {

        // Evitar inyección SQL
        $usuario = mysqli_real_escape_string($conexion, $usuario);
        $contrasena = mysqli_real_escape_string($conexion, $contrasena);
        $correo = mysqli_real_escape_string($conexion, $correo);

        // Guardar contraseña en texto plano (no recomendado)
        $sql = "INSERT INTO users (nombre_user, contrasena_user, correo_user) VALUES ('$usuario', '$contrasena', '$correo')";
        
        if (mysqli_query($conexion, $sql)) {
            header("Location: ../login.html");
            exit();
        } else {
            echo "Error en la inserción: " . mysqli_error($conexion);
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

mysqli_close($conexion);
?>
