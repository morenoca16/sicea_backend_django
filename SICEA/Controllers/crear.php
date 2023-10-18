<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once('../Models/conexion.php');

// Proteger contra SQL Injection
$nombre = $_GET['nombre'];
$documento = $_GET['documento'];
$email = $_GET['Correo_Electronico'];
$password = $_GET['passwor'];

// Es importante encriptar la contraseña
$password_encriptada = $hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO tbusuario (nombre, documento, Correo_Electronico, passwor) VALUES ('$nombre', '$documento', '$email', '$password_encriptada')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>