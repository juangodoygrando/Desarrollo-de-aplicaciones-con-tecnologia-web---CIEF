<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Taskin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="registro-container">
        <div class="contenido-form">
            <div class="icono-form">
                <i class="fas fa-user-plus"></i>
            </div>

            <h1>Crear cuenta</h1>

            <p class="descripcion">Únete a <strong>Taskin</strong> y comienza a organizar tus tareas de manera eficiente.</p>

            <form action="insert_temporal.php" method="post">
                <div class="campos-container">
                    <div class="campo-grupo">
                        <label for="usuario">
                            <i class="fas fa-user"></i>
                            Nombre:
                        </label>
                        <input type="text" name="usuario" id="usuario" placeholder="Tu nombre completo" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="email">
                            <i class="fas fa-envelope"></i>
                            Email:
                        </label>
                        <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="telefono">
                            <i class="fas fa-phone"></i>
                            Teléfono:
                        </label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Número de teléfono (opcional)">
                    </div>

                    <div class="campo-grupo">
                        <label for="password">
                            <i class="fas fa-lock"></i>
                            Contraseña:
                        </label>
                        <input type="password" name="password" id="password" placeholder="Mínimo 8 caracteres" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="password2">
                            <i class="fas fa-lock"></i>
                            Repite la contraseña:
                        </label>
                        <input type="password" name="password2" id="password2" placeholder="Confirma tu contraseña" required>
                    </div>
                </div>

                <!-- ERRORES -->
                <div class="errores-container">
                    <?php if (isset($_SESSION['error_cuenta']) && $_SESSION['error_cuenta']): ?>
                        <div class="mensaje-error">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p>Por favor, completa todos los campos correctamente</p>
                        </div>
                        <?php unset($_SESSION['error_cuenta']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user_repe']) && $_SESSION['user_repe']): ?>
                        <div class="mensaje-error">
                            <i class="fas fa-user-times"></i>
                            <p>Este nombre de usuario ya está en uso. Elige otro nombre.</p>
                        </div>
                        <?php unset($_SESSION['user_repe']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['email_repe']) && $_SESSION['email_repe']): ?>
                        <div class="mensaje-error">
                            <i class="fas fa-envelope-open"></i>
                            <p>Este correo electrónico ya está registrado. ¿Ya tienes una cuenta?</p>
                        </div>
                        <?php unset($_SESSION['email_repe']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error_email']) && $_SESSION['error_email']): ?>
                        <div class="mensaje-error">
                            <i class="fas fa-at"></i>
                            <p><?php echo $_SESSION['error_email']; ?></p>
                        </div>
                        <?php unset($_SESSION['error_email']); ?>
                    <?php endif; ?>
                </div>

                <div class="acciones">
                    <button type="submit" class="btn btn-primary">

                        Crear cuenta
                    </button>

                    <button type="reset" class="btn btn-reset">

                        Limpiar campos
                    </button>
                </div>
            </form>

            <div class="enlace-adicional">
                <a href="login.php" class="enlace-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Ya tengo cuenta
                </a>
            </div>
        </div>
    </div>

    <style>
        .registro-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .contenido-form {
            background: white;
            
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
            border: 2px solid #e8f0ff;
        }

        .icono-form {
            margin-bottom: 25px;
        }

        .icono-form i {
            font-size: 4rem;
            color: #2196f3;
            animation: userAnimation 0.8s ease-in-out;
        }

        @keyframes userAnimation {
            0% {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }

            50% {
                transform: scale(1.1) rotate(0deg);
                opacity: 0.8;
            }

            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        .contenido-form h1 {
            color: #2196f3;
            margin-bottom: 15px;
            font-size: 2.2rem;
            font-weight: bold;
        }

        .descripcion {

            margin-bottom: 35px;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .campos-container {
            text-align: left;
            margin-bottom: 5px;
        }

        .campo-grupo label {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
            font-weight: 500;
            font-size: 1rem;
        }

        .campo-grupo label i {
            margin-right: 10px;
            color: #2196f3;
            width: 20px;
        }

        .campo-grupo input {
            border: 0.5px solid rgba(33, 149, 243, 0.61);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .campo-grupo input:focus {
            outline: none;
            border-color: #2196f3;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
        }

        .campo-grupo input::placeholder {
            color: #adb5bd;
            font-style: italic;
        }

        .errores-container {
            margin: 20px 0;
        }

        .mensaje-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px 20px;
            border-radius: 10px;
            border: 1px solid #f5c6cb;
            display: flex;
            align-items: center;
            text-align: left;
            margin-bottom: 15px;
        }

        .mensaje-error:last-child {
            margin-bottom: 0;
        }

        .mensaje-error i {
            margin-right: 12px;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .mensaje-error p {
            margin: 0;
            font-weight: 500;
        }

        .acciones {
            margin-top: 35px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease;
            min-width: 160px;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #00c853;
            color: white;
        }

        .btn-primary:hover {
            background-color: #007b33;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 200, 83, 0.3);
        }

        .btn-reset {
            background-color: #2196f3;
            color: white;
        }

        .btn-reset:hover {
            background-color: #0b66c3;
            transform: translateY(-2px);

        }

        .enlace-adicional {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e9ecef;
        }

        .enlace-login {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #2196f3;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .enlace-login:hover {
            color: #0b66c3;

        }

        .enlace-login i {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .contenido-form {
                padding: 40px 25px;
                margin: 15px;
                max-width: 500px;
            }

            .contenido-form h1 {
                font-size: 1.8rem;
            }

            .icono-form i {
                font-size: 3.5rem;
            }

            .acciones {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 280px;
            }
        }

        @media (max-width: 480px) {
            .contenido-form {
                padding: 30px 20px;
            }

            .descripcion {
                font-size: 1rem;
            }

            .campo-grupo input {
                padding: 12px 15px;
            }

            .mensaje-error {
                padding: 12px 15px;
            }
        }
    </style>