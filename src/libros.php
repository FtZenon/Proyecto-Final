<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM titulos');
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query('SELECT DISTINCT nombre FROM autores');
$autores = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Listado de Libros</h1>
    <ul class="estu">
        <?php foreach ($libros as $libro): ?>
            <li><?php echo $libro['titulo']; ?></li>
        <?php endforeach; ?>
    </ul>
    <ul class="estu">
        <?php foreach ($autores as $autor): ?>
            <li><?php echo $autor; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
