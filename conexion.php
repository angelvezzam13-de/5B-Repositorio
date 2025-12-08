<?php
$servername = "localhost";
$username = "root";     // tu usuario de MySQL
$password = "";         // tu contraseña (si tienes)
$dbname = "prueba";     // nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>