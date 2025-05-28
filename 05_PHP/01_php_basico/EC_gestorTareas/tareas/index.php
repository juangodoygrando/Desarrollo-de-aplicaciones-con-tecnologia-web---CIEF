<?php
require_once 'conexion.php';
require_once 'helpers.php';


session_start();
$_SESSION['sesion-token'] = bin2hex(random_bytes(32));

if (!isset($_SESSION['id_usuario'])) {

    header('Location: ../login.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

$select = "SELECT tareas.*, estado.nombre AS nombre_estado, estado.color, categorias.nombre_categoria AS nombre_categoria
           FROM tareas 
           JOIN estado ON tareas.id_estado = estado.id_estado
           JOIN categorias ON tareas.id_categoria = categorias.id_categoria
           WHERE tareas.id_usuario = :id_usuario";

$preparacion = $pdo->prepare($select);
$preparacion->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$preparacion->execute();
$array_tareas = $preparacion->fetchAll();



$select_estados = "SELECT * FROM estado";
$prep_estados = $pdo->prepare($select_estados);
$prep_estados->execute();
$array_estados = $prep_estados->fetchAll();

$select_categorias = "SELECT * FROM categorias";
$prep_categorias = $pdo->prepare($select_categorias);
$prep_categorias->execute();
$array_categorias = $prep_categorias->fetchAll();

$pdo = null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <header class="header">
        <div class="header-left">
            <img src="../img/taskinBajo.svg" alt="Logo" class="logo">
            <div class="title-group">
                <p>Administra tus tareas fácilmente</p>
            </div>
        </div>

        <div class="header-right">
            <?php if (isset($_SESSION['usuario'])): ?>
                <span>¡Hola <?= htmlspecialchars($_SESSION['usuario']) ?></span>
                <form action="../logout.php" method="post">
                    <button id="btnLogout" type="submit"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            <?php endif; ?>
        </div>
    </header>


    <div class="main-layout">

        <?php if ($_GET) : ?>
            <aside class="form-panel">
                <h2>Aqui tiene la tarea para modificar:</h2>
                <form action="update.php" method="POST" class="task-form">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="<?= h($_GET['titulo']) ?>" required>

                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" required><?= h($_GET['descripcion']) ?></textarea>

                    <label for="estado">Estado:</label>
                    <select name="id_estado" id="estado" value="<?= h($_GET['estado']) ?>" required>
                        <?php foreach ($array_estados as $estado): ?>
                            <option value="<?= h($estado['id_estado']) ?>" <?= h($estado['id_estado']) == h($_GET['estado']) ? 'selected' : '' ?>>
                                <?= h($estado['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="categorias">Categoria:</label>
                    <select name="id_categoria" id="categoria" value="<?= h($_GET['categoria']) ?>" required>
                        <?php foreach ($array_categorias as $categoria): ?>
                            <option value="<?= h($categoria['id_categoria']) ?>" <?= isset($_GET['categoria']) && $categoria['id_categoria'] == h($_GET['categoria']) ? 'selected' : '' ?>>

                                <?= ($categoria['nombre_categoria']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="id" value="<?= h($_GET['id']) ?>">

                    <button type="submit">Modificar tarea</button>
                    <button><a href="index.php"></a>Cancelar</button>
                </form>
            </aside>
        <?php else: ?>
            <aside class="form-panel">
                <h2>Agregar Nueva Tarea</h2>
                <form action="insert.php" method="POST" class="task-form">


                    <input type="hidden" name="sesion-token" value="<?= $_SESSION['sesion-token'] ?>">
                    <input type="text" name="web" style="display: none">


                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" required>

                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" required></textarea>

                    <label for="estado">Estado:</label>
                    <select name="id_estado" id="estado" required>
                        <?php foreach ($array_estados as $estado): ?>
                            <option value="<?= h($estado['id_estado']) ?>">
                                <?= h($estado['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="categorias">Categoria:</label>
                    <select name="id_categoria" id="categoria" required>
                        <?php foreach ($array_categorias as $categoria): ?>
                            <option value="<?= h($categoria['id_categoria']) ?>">
                                <?= h($categoria['nombre_categoria']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit">Agregar Tarea</button>
                </form>
            </aside>
        <?php endif ?>

        <div class="column-container">
            <?php foreach ($array_estados as $estado): ?>
                <div class="column">
                    <h3><?= h($estado['nombre']) ?></h3>
                    <div>
                        <?php foreach ($array_tareas as $tarea): ?>
                            <?php if ($tarea['nombre_estado'] == $estado['nombre']): ?>
                                <div class="tarea" style="border-left: 8px solid <?= $tarea['color'] ?>">
                                    <h3><?= h($tarea['titulo']) ?></h3>
                                    <p><?= h($tarea['descripcion']) ?></p>
                                    <p class="categoria-label"><?= $tarea['nombre_categoria'] ?></p>

                                    <span class="tarea-footer">
                                        <div class="fecha-tarea">
                                            <p>Actualizado el </p>
                                            <p><?= date('d M Y', strtotime($tarea['fecha_actualizacion'])) ?></p>
                                            <p>a las <?= date('H:i', strtotime($tarea['fecha_actualizacion'])) ?></p>
                                        </div>
                                        <div class="acciones-tarea">
                                            <a href="index.php?id=<?= $tarea['id_tarea'] ?>&titulo=<?= urlencode($tarea['titulo']) ?>&descripcion=<?= urlencode($tarea['descripcion']) ?>&estado=<?= $tarea['id_estado'] ?>&categoria=<?= $tarea['id_categoria'] ?>">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="delete.php?id=<?= $tarea['id_tarea'] ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>




    </div>



</body>

</html>