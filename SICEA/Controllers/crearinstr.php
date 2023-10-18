<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once('../Models/conexion.php');

// Proteger contra SQL Injection
$nombre = $_GET['Nom_Instructor'];
$documento = $_GET['documento'];
$correo = $_GET['Correo_Electronico'];
$password = $_GET['passwor'];
$categoria = $_GET['categoria_Prof'];

// Es importante encriptar la contraseña
$password_encriptada = $hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO tbinstructor (Nom_Instructor, documento, Correo_Electronico, passwor,categoria_Prof) VALUES ('$nombre', '$documento', '$correo', '$password_encriptada','$categoria')";

if ($conn->query($sql) === TRUE) {
    echo "Instructor creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>