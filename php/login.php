<?php
// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir archivo de conexión
require 'conexion.php';

// Verificar si el formulario fue enviado
if (isset($_POST['Ingresar'])) {

    // Obtener valores del formulario
    $usuario = trim($_POST['usuario']);  // Corregido según el HTML
    $contrasena = trim($_POST['password']);  // Corregido según el HTML

    // Evitar inyección SQL
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $contrasena = mysqli_real_escape_string($conexion, $contrasena);

    // Depuración: Verificar que los valores lleguen correctamente
    echo "Usuario ingresado: $usuario <br>";
    echo "Contraseña ingresada: $contrasena <br>";

    // Consulta SQL (Asegurar que el campo correcto se usa en la base de datos)
    $sql = "SELECT * FROM users WHERE nombre_user = '$usuario' AND contrasena_user = '$contrasena'";
    echo "Consulta SQL: $sql <br>"; // Para depuración

    $resultado = mysqli_query($conexion, $sql);

    // Verificar errores en la consulta
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    // Comprobar si el usuario existe
    if (mysqli_num_rows($resultado) > 0) {
        echo "✅ Inicio de sesión exitoso. Redirigiendo...";
        echo "<script>window.location.href = '../inicio.php';</script>";
        exit();
    } else {
        echo "❌ Usuario o contraseña incorrectos.";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>
