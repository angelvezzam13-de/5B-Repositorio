<?php
$servername = "localhost";
$username = "root";     // tu usuario de MySQL
$password = "";         // tu contraseña (si tienes)
$dbname = "carro de luces";     // nombre de tu base de datos

// Crear conexión
$conn = new mysqli($carro, $producto, $cantidad, $precio, $Material);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
// Guardar en base de datos
$sql = "INSERT INTO usuarios (producto, precio, cantidad) VALUES ('$nombre', '$precio', '$cantida')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {<label>Nombre del Material</label>
        <input type="text" name="producto" required>
        <br><br>


    echo "Error: " . $conn->error;
}

$conn->close();
?>