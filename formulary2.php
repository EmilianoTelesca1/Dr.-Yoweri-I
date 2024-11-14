<?php
include_once('conectar.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$hora_in = $_POST['hora_in'];
$hora_sa = $_POST['hora_sa'];
$dia = $_POST['dia'];

// Validación de datos recibidos
if (isset($id, $nombre, $email, $hora_in, $hora_sa, $dia)) {
    $conectar = con();
    $sql = "INSERT INTO empleados (id, nombre_completo, email, horario_ingreso, horario_salida, dias_trabajo) VALUES ($id, '$nombre', '$email', '$hora_in', '$hora_sa', '$dia')";
    $resul = mysqli_query($conectar, $sql) or trigger_error("Error en la consulta: " . mysqli_error($conectar), E_USER_ERROR);

    echo "Empleado agregado: $nombre, ID: $id";
    header("Location: empleados.html");
} else {
    echo "Error: datos incompletos.";
}
?>