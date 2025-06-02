<div class="registro-exitoso">
    <div class="contenido-exito">
        <div class="icono-exito">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h2>¡Registro completado con éxito!</h2>
        
        <?php if (isset($_SESSION['usuario_registrado'])): ?>
            <div class="bienvenida">
                <p>¡Bienvenido/a, <strong><?php echo htmlspecialchars($_SESSION['usuario_registrado']); ?></strong>!</p>
                <p>Tu cuenta ha sido verificada correctamente.</p>
            </div>
        <?php endif; ?>
        
        <div class="mensaje-confirmacion">
            <div class="check-item">
                <i class="fas fa-envelope-open-text"></i>
                <span>Correo electrónico verificado</span>
            </div>
            <div class="check-item">
                <i class="fas fa-user-check"></i>
                <span>Cuenta activada correctamente</span>
            </div>
            <div class="check-item">
                <i class="fas fa-shield-alt"></i>
                <span>Datos registrados de forma segura</span>
            </div>
        </div>
        
        <div class="siguiente-paso">
            <p>Ya puedes iniciar sesión con tus credenciales y comenzar a usar <strong>Taskin</strong>.</p>
        </div>
        
        <div class="acciones">
            <a href="login.php" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> 
                Iniciar Sesión
            </a>
            
            <a href="index.php" class="btn btn-secundario">
                <i class="fas fa-home"></i> 
                Volver al Inicio
            </a>
        </div>
    </div>
</div>

<?php 
// Limpiar las variables de sesión después de mostrarlas
if (isset($_SESSION['registro_exitoso'])) {
    unset($_SESSION['registro_exitoso']);
}
if (isset($_SESSION['usuario_registrado'])) {
    unset($_SESSION['usuario_registrado']);
}
?>

<style>
.registro-exitoso {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 75vh;
    padding: 20px;
}

.contenido-exito {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 50px 40px;
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
    animation: checkAnimation 0.6s ease-in-out;
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
    color: #155724;
    margin-bottom: 25px;
    font-size: 2rem;
    font-weight: bold;
}

.bienvenida {
    background-color: #d4edda;
    color: #155724;
    padding: 20px;
    border-radius: 12px;
    margin: 25px 0;
    border: 1px solid #c3e6cb;
}

.bienvenida p {
    margin: 8px 0;
    font-size: 1.1rem;
}

.mensaje-confirmacion {
    background-color: #f8f9fa;
    padding: 25px;
    border-radius: 12px;
    margin: 25px 0;
    border-left: 4px solid #28a745;
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

.siguiente-paso {
    margin: 30px 0;
    padding: 20px;
    background-color: #fff3cd;
    border-radius: 8px;
    border: 1px solid #ffeaa7;
    color: #856404;
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
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #218838 0%, #1ea080 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
}

.btn-secundario {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    color: white;
    border: none;
}

.btn-secundario:hover {
    background: linear-gradient(135deg, #5a6268 0%, #343a40 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
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
    
    .bienvenida, .mensaje-confirmacion {
        padding: 15px;
    }
}
</style>