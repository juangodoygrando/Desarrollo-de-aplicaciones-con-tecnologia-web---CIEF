<?php

session_start();
require_once 'pdo_bind_connection.php';

$num_random = random_int(0, 4);
$imagenes = [
    [
        'src' => 'img/colores.jpg',
        'alt' => 'imagenes de colores de pureba'
    ],
    [
        'src' => 'img/colores1.jpg',
        'alt' => 'imagenes de colores de pureba'
    ],
    [
        'src' => 'img/colores2.jpg',
        'alt' => 'imagenes de colores de pureba'
    ],
    [
        'src' => 'img/colores3.jpg',
        'alt' => 'imagenes de colores de pureba'
    ],
    [
        'src' => 'img/colores4.jpg',
        'alt' => 'imagenes de colores de pureba'
    ]
];

include_once 'modulos/idiomas.php';


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'modulos/etiquetas_meta.php' ?>

    <title>Colores</title>

</head>

<body>
    <?php include_once './modulos/header.php'; ?>

    <main class="index-main">

        <section>

            <img src="<?= $imagenes[$num_random]['src'] ?>" alt="<?= $imagenes[$num_random]['alt'] ?>" class="img-colores">
        </section>
        <section>
            <?php
            $formulario = $_GET['formulario'] ?? 'login';
            switch ($formulario) {
                case 'login':
                    include_once 'modulos/form_login.php';
                    break;
                case 'crear-cuenta':
                    include_once 'modulos/form_crear_cuenta.php';
                    break;
                case 'reset':
                    include_once 'modulos/form_reset.php';
                    break;
                case 'revisar_correo':
                    include_once 'modulos/revisar_cuenta_correo.php';
                    break;
                case 'token_caducado':
                    include_once 'modulos/token_caducado.php';
                    break;
                default:
                    include_once 'modulos/form_login.php';
                    break;
            }



            ?>
        </section>



    </main>


</body>
<script src="js/index.js"></script>

</html>
<?php
