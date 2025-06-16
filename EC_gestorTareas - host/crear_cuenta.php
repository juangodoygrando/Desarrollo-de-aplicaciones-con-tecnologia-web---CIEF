<?php
session_start();
require_once 'pdo_connection.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="./css/crear_cuenta.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="crear_cuenta">

    <main>
        <div>
            <?php
            $formulario = $_GET['formulario'] ?? 'crear_cuenta';
            switch ($formulario) {
                case 'crear_cuenta':
                    include_once 'modulos/form_crear_cuenta.php';
                    break;
                case 'revisar_correo':
                    include_once 'modulos/form_revisar_correo.php';
                    break;
                case 'token_caducado':
                    include_once 'modulos/form_token_caducado.php';
                    break;
                case 'registro_exitoso':
                    include_once 'modulos/form_registro_exitoso.php';
                    break;
                case 'recuperar_contraseña':
                    include_once 'modulos/form_recuperar_contraseña.php';
                    break;
                case 'contraseña_cambiada':
                    include_once 'modulos/form_contraseña_cambiada.php';
                    break;
                case 'nueva_contraseña':
                    include_once 'modulos/form_nueva_contraseña.php';
                    break;
                default:
                    include_once './login.php';
                    break;
            }
            ?>
        </div>
        <div>
            <img src="./img/taskinBajo.svg" alt="logo taskin" id="logoCrearCuenta">
        </div>
    </main>
</body>

</html>

<?php
?>