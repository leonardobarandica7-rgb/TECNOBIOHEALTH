<?php
require 'php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = trim($_POST['precio']);
    
    // Subir imagen
    $directorio = "uploads/"; // Carpeta donde se guardarán las imágenes
    $imagen_nombre = basename($_FILES["imagen"]["name"]); // Nombre del archivo
    $imagen_ruta = $directorio . $imagen_nombre; // Ruta completa
    
    // Validar y mover el archivo
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_ruta)) {
        // Guardar la información en la base de datos
        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$imagen_ruta')";
        
        if (mysqli_query($conexion, $sql)) {
            header("Location: productos.php");
            exit();
        } else {
            echo "Error al agregar producto: " . mysqli_error($conexion);
        }
    } else {
        echo "❌ Error al subir la imagen.";
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Agregar Producto</h2>
        <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
            <label>Nombre:</label>
            <input type="text" name="nombre" required class="form-control">
            
            <label>Descripción:</label>
            <textarea name="descripcion" required class="form-control"></textarea>
            
            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" required class="form-control">
            
            <label>Imagen:</label>
            <input type="file" name="imagen" required class="form-control">
            
            <br>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
</body>
</html>
