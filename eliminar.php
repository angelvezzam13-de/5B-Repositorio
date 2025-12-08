<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db_conexion.php');

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['producto'])) {
    // Recibir el nombre del producto
    $producto = $_POST['producto'];

    // Consulta preparada para evitar SQL injection
    $consulta = "DELETE FROM Material WHERE producto = ?";
    $stmt = $con->prepare($consulta);
    $stmt->bind_param("s", $producto);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "<h2>Registro eliminado correctamente</h2>";
            echo "<p>Producto eliminado: " . htmlspecialchars($producto) . "</p>";
        } else {
            echo "<h2>No se encontró el producto</h2>";
            echo "<p>El producto '" . htmlspecialchars($producto) . "' no existe en la base de datos.</p>";
        }
    } else {
        echo "<h2>Error al eliminar</h2>";
        echo "<p>" . $con->error . "</p>";
    }

    $stmt->close();

    echo "<br><a href='eliminar.html'>Eliminar otro producto</a>";
    echo "<br><a href='index.html'>Volver al inicio</a>";
} else {
    echo "<h2>Error: No se recibió ningún producto</h2>";
    echo "<a href='eliminar.html'>Volver</a>";
}

$con->close();
?>
