<?php
// Definir credenciales de base de datos
$servidor = "localhost"; // Servidor de base de datos
$usuario = "root"; // Usuario de base de datos
$contraseña = ""; // Contraseña de base de datos
$base_de_datos = "tecnobiohealt"; // Nombre de base de datos

// Crear conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

// Validar si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Cerrar conexión 
//mysqli_close($conexion);
?>
