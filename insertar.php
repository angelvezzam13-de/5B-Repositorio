<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db_conexion.php');

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Preparar consulta para evitar SQL injection
    $sql = "INSERT INTO Material (producto, precio, cantidad) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sdi", $nombre, $precio, $cantidad);

    if ($stmt->execute()) {
        echo "<h2>Registro guardado correctamente</h2>";
        echo "<p>Producto: $nombre</p>";
        echo "<p>Precio: $precio</p>";
        echo "<p>Cantidad: $cantidad</p>";
        echo "<br><a href='Formulario.html'>Agregar otro producto</a>";
        echo "<br><a href='index.html'>Volver al inicio</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>
