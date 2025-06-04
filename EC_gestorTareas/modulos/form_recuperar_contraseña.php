<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Taskin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="recuperar-contraseña">
        <div class="contenido-form">
            <div class="icono-form">
                <i class="fas fa-envelope-open-text"></i>
            </div>
            
            <h2>Recuperar contraseña</h2>
            
            <p class="descripcion">Para recuperar tu contraseña debes ingresar el correo electrónico con el que te registraste en <strong>Taskin</strong>:</p>
            
            <form action="procesar_recuperacion.php" method="post">
                <div class="campo-grupo">
                    <label for="email_registrado">
                        <i class="fas fa-at"></i>
                        Ingresa tu email registrado:
                    </label>
                    <input type="email" name="email_registrado" id="email_registrado" placeholder="ejemplo@correo.com" required>
                </div>
                
                <!-- Mensajes de error si existen -->
                <div class="error_cuenta">
                    <?php if (isset($_SESSION['error_email']) && $_SESSION['error_email']): ?>
                        <div class="mensaje-error">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p><?php echo $_SESSION['error_email']; ?></p>
                        </div>
                        <?php unset($_SESSION['error_email']); ?>
                    <?php endif; ?>
                </div>
                
                <div class="acciones">
                    <button type="submit" class="btn btn-primary">
                        
                        Recuperar contraseña
                    </button>
                    
                    <a href="login.php" class="btn btn-secundario">

                        Cancelar
                    </a>
                </div>
            </form>
            
            <div class="enlace-adicional">
                <a href="login.php" class="enlace-recuerdo">
                    
                    Ya recordé la contraseña
                </a>
            </div>
        </div>
    </div>

    <style>
        
        

        .recuperar-contraseña {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .contenido-form {
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 550px;
            width: 100%;
            border: 2px solid #e8f0ff;
        }

        .icono-form {
            margin-bottom: 25px;
        }

        .icono-form i {
            font-size: 4rem;
            color: #2196f3;
            animation: envelopeAnimation 0.8s ease-in-out;
        }

        @keyframes envelopeAnimation {
            0% {
                transform: scale(0) translateY(-20px);
                opacity: 0;
            }
            50% {
                transform: scale(1.1) translateY(5px);
                opacity: 0.8;
            }
            100% {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }

        .contenido-form h2 {
            color: #2196f3;
            margin-bottom: 20px;
            font-size: 2rem;
            font-weight: bold;
        }

        .descripcion {
            color: #6c757d;
            margin-bottom: 30px;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .campo-grupo {
            margin-bottom: 25px;
            text-align: left;
        }

        .campo-grupo label {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
            font-size: 1rem;
        }

        .campo-grupo label i {
            margin-right: 10px;
            color: #2196f3;
            width: 20px;
        }

        .campo-grupo input[type="email"] {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #2196f3;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .campo-grupo input[type="email"]:focus {
            outline: none;
            border-color: #2196f3;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
        }

        .campo-grupo input[type="email"]::placeholder {
            color: #adb5bd;
            font-style: italic;
        }

        .error_cuenta {
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
        }

        .mensaje-error i {
            margin-right: 10px;
            font-size: 1.2rem;
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
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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

        .btn-secundario {
            background-color: #2196f3;
            color: white;
        }

        .btn-secundario:hover {
            background-color: #0b66c3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        .enlace-adicional {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e9ecef;
        }

        .enlace-recuerdo {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #2196f3;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 8px;
        }

        .enlace-recuerdo:hover {
            
            transform: translateY(px);
        }

        .enlace-recuerdo i {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .contenido-form {
                padding: 40px 25px;
                margin: 15px;
            }
            
            .contenido-form h2 {
                font-size: 1.6rem;
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
            
            .campo-grupo input[type="email"] {
                padding: 12px 15px;
            }
        }
    </style>
</body>
</html>