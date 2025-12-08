<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_conexion.php";

$productoSeleccionado = "";
$cantidad = "";
$precio = "";

// CONSULTAR el producto seleccionado
if (isset($_POST['consultar'])) {
    $productoSeleccionado = $_POST['producto'];

    $sql = "SELECT * FROM Material WHERE producto = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $productoSeleccionado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $cantidad = $fila['cantidad'];
        $precio = $fila['precio'];
    }
}

// ACTUALIZAR el registro (sin insertar uno nuevo)
if (isset($_POST['actualizar'])) {
    $productoSeleccionado = $_POST['producto'];
    $nuevoNombre = $_POST['nuevo_nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $sql = "UPDATE Material SET producto=?, cantidad=?, precio=? WHERE producto=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sdis", $nuevoNombre, $cantidad, $precio, $productoSeleccionado);

    if ($stmt->execute()) {
        echo "<script>alert('Registro actualizado correctamente');</script>";
        $productoSeleccionado = $nuevoNombre; // Actualizar para mostrar el nuevo nombre
    } else {
        echo "<script>alert('Error al actualizar');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Actualizar Producto</title>
<link rel="stylesheet" href="actualizar.css">
</head>
<body>

<h2>Actualizar Producto</h2>

<form method="POST">

    <!-- COMBOBOX DE PRODUCTOS -->
    <label>Selecciona un producto:</label>
    <select name="producto">
        <?php
        $query = "SELECT producto FROM Material";
        $res = $con->query($query);

        while ($row = $res->fetch_assoc()) {
            $selected = ($row['producto'] == $productoSeleccionado) ? "selected" : "";
            echo "<option $selected>" . htmlspecialchars($row['producto']) . "</option>";
        }
        ?>
    </select>

    <button type="submit" name="consultar">Consultar</button>
</form>

<br><hr><br>

<!-- FORMULARIO DE ACTUALIZACIÓN -->
<form method="POST">
    <!-- Mantener el producto original oculto -->
    <input type="hidden" name="producto" value="<?php echo htmlspecialchars($productoSeleccionado); ?>">

    <label>Nombre del producto:</label>
    <input type="text" name="nuevo_nombre" value="<?php echo htmlspecialchars($productoSeleccionado); ?>" required>
    <br><br>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" value="<?php echo htmlspecialchars($cantidad); ?>" required>
    <br><br>

    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" value="<?php echo htmlspecialchars($precio); ?>" required>
    <br><br>

    <button type="submit" name="actualizar">Actualizar</button>
</form>

<br>
<a href="index.html">Volver al inicio</a>

</body>
</html>