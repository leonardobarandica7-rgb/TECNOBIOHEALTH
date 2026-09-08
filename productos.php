<?php
require 'php/conexion.php';
include 'header.php'; // Incluir el header
?>

<div class="container">
    <h2 class="text-center">Lista de Productos</h2>
    <a href="agregar_producto.php" class="btn btn-success">Agregar Producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM productos";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><img src="<?php echo $fila['imagen']; ?>" width="100"></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td>$<?php echo number_format($fila['precio'], 2); ?></td>
                <td>
                    <a href="editar_producto.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="eliminar_producto.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; // Incluir el footer ?>
