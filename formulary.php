<?php
include_once('conectar.php');

$idemp = $_POST['idemp'];
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];

// Validación de datos recibidos
if (isset($idemp, $fecha, $tipo)) {
    $conectar = con();
    $sql = "INSERT INTO items (idemp, fecha, tipo) VALUES ($idemp, '$fecha', '$tipo')";
    $resul = mysqli_query($conectar, $sql) or trigger_error("Error en la consulta: " . mysqli_error($conectar), E_USER_ERROR);

    echo "Registro agregado: $idemp, Fecha: $fecha";
    header("Location: stock.html");
} else {
    echo "Error: datos incompletos.";
}
?>