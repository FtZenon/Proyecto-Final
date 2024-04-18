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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
</head>
<body>
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
        <p>¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.</p>
    <?php else: ?>
        <section class="d-flex justify-content-center align-items-center">
        <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
            <div class="mb-4 d-flex justify-content-start align-items-center">
              
                <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
            </div>
            <div class="mb-1">
                <form id = "contacto" action="contacto2.php" method="POST">
                    <div class="mb-4 d-flex justify-content-between"> 
                        <div>
                            <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder= "ej: Gabriel" required>
                            <div class="nombre text-danger "></div>
                        </div>
                        <div >
                            <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder= "ej: Pacheco" required>
                            <div class="apellido text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="correo"><i class="bi bi-envelope-fill"></i> Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder= "ej: gpmcheco@mail.com" required>
                        <div class="correo text-danger"></div>
                        
                    </div> 
                    <div class="mb-4">
                        <label for="asunto"> <i class="bi bi-chat-right-dots-fill" required></i> Asunto</label>
                        <textarea name="asunto" id="asunto" class="form-control" placeholder="ej: hola"></textarea>
                        <div class="asunto text-danger"></div>
                    </div> 
                    <div class="mb-4">
                        <label for="comentario"> <i class="bi bi-chat-right-dots-fill" required></i> Comentario</label>
                        <textarea name="comentario" id="comentario" class="form-control" placeholder="ej: hola"></textarea>
                        <div class="comentario text-danger"></div>
                    </div> 
                    
                    <div class="mb-2">
                        <button id ="botton" class="col-12 btn btn-primary d-flex justify-content-between ">
                            <span>Enviar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div> 
                              
                </form>
            </div>
        </div>
    </section>
    <script src="../js/scripts.js"></script>
</body>
    <?php endif; ?>
</body>
</html>
