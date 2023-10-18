<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once('../Models/conexion.php');

// Proteger contra SQL Injection

$fecha=$_GET['fecha'];
$horaInicio = $_GET['horaInicio'];
$horaFin = $_GET['horaFin'];
$cupoEstudiantes = $_GET['cupoEstudiantes'];

$sql = "INSERT INTO tbexamenteo(fecha, horaInicio, horaFin,cupoEstudiantes) VALUES ('$fecha', '$horaInicio', '$horaFin','$cupoEstudiantes')";

if ($conn->query($sql) === TRUE) {
    echo "Examen teorico creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>