<?php
header('Access-Control-Allow-Origin: *');

include_once('../Models/conexion.php');

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query("SELECT fecha, Nom_Clase FROM tbclaseteoria WHERE MONTH(fecha) = 10");
$clases = $stmt->fetchAll();

echo json_encode($clases);
?>
