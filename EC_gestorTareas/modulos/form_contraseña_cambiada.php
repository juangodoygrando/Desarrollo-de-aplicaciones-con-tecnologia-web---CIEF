<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña Actualizada - Taskin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="mensaje-exito-container">
        <div class="contenido-exito">
            <div class="icono-exito">
                <i class="fas fa-check-circle"></i>
            </div>
            
            <h2>¡Contraseña actualizada!</h2>
            
            <div class="mensaje-principal">
                <p>Tu contraseña ha sido cambiada exitosamente.</p>
                <p>Ya puedes iniciar sesión con tu nueva contraseña en <strong>Taskin</strong>.</p>
            </div>
            
            <div class="mensaje-confirmacion">
                <div class="check-item">
                    <i class="fas fa-key"></i>
                    <span>Nueva contraseña configurada</span>
                </div>
                <div class="check-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Seguridad actualizada correctamente</span>
                </div>
            </div>
            
            <div class="acciones">
                <a href="login.php" class="btn btn-primary">
                    
                    Iniciar sesión
                </a>
                
                <a href="index.php" class="btn btn-secundario">
                    
                    Volver al inicio
                </a>
            </div>
            
            <div class="info-adicional">
                <div class="nota-seguridad">
                    <i class="fas fa-info-circle"></i>
                    <p>Por seguridad, hemos cerrado todas las sesiones activas en otros dispositivos.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        
        .mensaje-exito-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 2px solid #e8f0ff;
            border-radius: 20px;
        }

        .contenido-exito {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 550px;
            width: 100%;
            border: 2px solid #e8f5e8;
        }

        .icono-exito {
            margin-bottom: 25px;
        }

        .icono-exito i {
            font-size: 5rem;
            color: #28a745;
        }

        @keyframes checkAnimation {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .contenido-exito h2 {
            color: #28a745;
            margin-bottom: 25px;
            font-size: 2rem;
            font-weight: bold;
        }

        .mensaje-principal {
            background-color: #d4edda;
            color: #28a745;
            padding: 20px;
            border-radius: 12px;
            margin: 25px 0;
            border: 1px solid #c3e6cb;
        }

        .mensaje-principal p {
            margin: 8px 0;
            font-size: 1.1rem;
        }

        .mensaje-confirmacion {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
        }

        .check-item {
            display: flex;
            align-items: center;
            margin: 15px 0;
            color: #495057;
        }

        .check-item i {
            color: #28a745;
            font-size: 1.2rem;
            margin-right: 15px;
            width: 20px;
        }

        .check-item span {
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
        }

        .btn-primary {
            background-color: #00c853;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #007b33;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 200, 83, 0.3);
        }

        .btn-secundario {
            background-color: #2196f3;
            color: white;
            border: none;
        }

        .btn-secundario:hover {
            background-color: #0b66c3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        .info-adicional {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e9ecef;
        }

        .nota-seguridad {
            background-color: #e7f3ff;
            color: #0c5aa6;
            padding: 15px 20px;
            border-radius: 10px;
            border: 1px solid #b3d9ff;
            display: flex;
            align-items: flex-start;
            text-align: left;
        }

        .nota-seguridad i {
            margin-right: 12px;
            margin-top: 2px;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .nota-seguridad p {
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            .contenido-exito {
                padding: 40px 25px;
                margin: 15px;
            }
            
            .contenido-exito h2 {
                font-size: 1.6rem;
            }
            
            .icono-exito i {
                font-size: 4rem;
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
            .contenido-exito {
                padding: 30px 20px;
            }
            
            .mensaje-principal, .mensaje-confirmacion {
                padding: 15px;
            }
            
            .nota-seguridad {
                padding: 12px 15px;
            }
        }
    </style>
