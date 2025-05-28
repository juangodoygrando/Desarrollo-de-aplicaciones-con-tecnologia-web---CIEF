<?php
session_start();
require_once 'pdo_connection.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión - Taskin</title>
    <link rel="stylesheet" href="css/login.css" />
</head>

<body class="index_login">
    <main class="index-main">
        <div class="logo-container">
            <img src="./img/taskinBajo.svg" alt="Logo Taskin" />

        </div>

        <div class="login-box">
            <form action="procesar_login.php" method="post">
                <fieldset>
                    <h2>Iniciar sesión</h2>

                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario" />

                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password" />

                    <div class="error_cuenta">
                        <?php if (isset($_SESSION['error_cuenta']) && $_SESSION['error_cuenta']): ?>
                            <p>Por favor, completa todos los campos.</p>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['user_inexistente']) && $_SESSION['user_inexistente']): ?>
                            <p>Usuario o contraseña incorrectos.</p>
                        <?php endif; ?>
                    </div>

                    <div class="botones">
                        <button type="submit">Enviar</button>
                        <button type="reset">Borrar</button>
                    </div>
                    <a href="crear_cuenta.php">¿Olvidaste tu contraseña?</a>
                    <a href="crear_cuenta.php">¿No tienes cuenta? Regístrate aquí</a>
                </fieldset>
            </form>
        </div>
    </main>
</body>

</html>

<?php

$_SESSION['error_cuenta'] = false;
$_SESSION['user_inexistente'] = false;
?>