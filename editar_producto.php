<?php
require 'php/conexion.php';

// Verificar si se ha recibido un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id=$id";
    $resultado = mysqli_query($conexion, $sql);
    $producto = mysqli_fetch_assoc($resultado);
}

// Si se envió el formulario para actualizar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = trim($_POST['precio']);
    $imagen_actual = trim($_POST['imagen_actual']); // Imagen previa

    // Manejar la nueva imagen si se sube una
    if (!empty($_FILES['imagen']['name'])) {
        $directorio = "uploads/";

        // Crear la carpeta si no existe
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $imagen_nombre = basename($_FILES["imagen"]["name"]);
        $imagen_ruta = $directorio . $imagen_nombre;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_ruta)) {
            // Si subió una nueva imagen, la usamos
            $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen_ruta' WHERE id=$id";
        } else {
            echo "❌ Error al subir la nueva imagen.";
            exit();
        }
    } else {
        // Si no subió nueva imagen, mantener la actual
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen_actual' WHERE id=$id";
    }

    if (mysqli_query($conexion, $sql)) {
        header("Location: productos.php");
        exit();
    } else {
        echo "Error al actualizar producto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Producto</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required class="form-control">
            
            <label>Descripción:</label>
            <textarea name="descripcion" required class="form-control"><?php echo $producto['descripcion']; ?></textarea>
            
            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required class="form-control">
            
            <label>Imagen Actual:</label>
            <br>
            <img src="<?php echo $producto['imagen']; ?>" width="150">
            <br><br>

            <label>Subir nueva imagen (opcional):</label>
            <input type="file" name="imagen" class="form-control">

            <!-- Guardar la imagen actual en un input oculto por si no se sube una nueva -->
            <input type="hidden" name="imagen_actual" value="<?php echo $producto['imagen']; ?>">

            <br>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    </div>
</body>
</html>
