<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    $stmt = $pdo->prepare('INSERT INTO contacto (fecha, nombre, apellido, correo, asunto, comentario) VALUES (NOW(), ?, ?, ?, ?, ?)');
    $stmt->execute([$nombre, $apellido, $correo, $asunto, $comentario]);

    // Redireccionar o mostrar un mensaje de éxito
    header('Location: contacto2.php?status=success');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Formulario de Contacto</h1>
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
        <p>¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.</p>
    <?php else: ?>
        <form action="contacto2.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br>
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required><br>
            <label for="comentario">Comentario:</label><br>
            <textarea id="comentario" name="comentario" required></textarea><br>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</body>
</html>
