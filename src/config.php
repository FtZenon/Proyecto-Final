<?php
$host = 'sql311.infinityfree.com';
$dbname = 'if0_36309214_dblibreria';
$username = 'if0_36309214';
$password = 'mCuxZV2rID';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>
