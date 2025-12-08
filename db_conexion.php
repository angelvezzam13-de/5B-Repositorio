<?php
// Archivo de conexión pura a la base de datos
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "localhost";
$usuario = "root";
$contra = "";
$BDname = "carro_de_luces";

// Conexión
$con = new mysqli($servidor, $usuario, $contra, $BDname);

// Verificar conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
}

// Establecer charset para evitar problemas con acentos
$con->set_charset("utf8");
?>
