<?php
include 'config.php';

$stmt = $pdo->query('SELECT nombre, apellido FROM autores');
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Autores</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <ul class="list-group float-left">
                        <?php foreach ($autores as $autor): ?>
                            <li class="list-group-item"><?php echo $autor['nombre'] . ' ' . $autor['apellido']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
    </section>
</body>
</html>
