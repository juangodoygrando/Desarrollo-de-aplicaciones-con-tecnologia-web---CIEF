<div class="mensaje-correo">
    <div class="contenido-mensaje">
        <i class="fas fa-envelope-open-text" style="font-size: 4rem; color: #2196f3; margin-bottom: 20px;"></i>
        
        <h2>¡Revisa tu correo electrónico!</h2>
        
        <?php if (isset($_SESSION['mensaje_exito'])): ?>
            <p class="mensaje-exito">
                <?php 
                echo $_SESSION['mensaje_exito']; 
                unset($_SESSION['mensaje_exito']);
                ?>
            </p>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['email_usuario'])): ?>
            <p>Hemos enviado un enlace de verificación a:</p>
            <p class="email-enviado"><strong><?php echo htmlspecialchars($_SESSION['email_usuario']); ?></strong></p>
            <?php unset($_SESSION['email_usuario']); ?>
        <?php endif; ?>
        
        <div class="instrucciones">
            <p>Revisa tu bandeja de entrada</p>
            <p>Si no lo encuentras, revisa la carpeta de spam</p>
            <p>El enlace expira en 2 horas</p>
        </div>
        
        <div class="acciones">
            <a href="login.php" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
            </a>
            
            <a href="crear_cuenta.php" class="btn btn-secundario">
                <i class="fas fa-user-plus"></i> Crear otra cuenta
            </a>
        </div>
        
        <div class="ayuda">
            <p><small>¿No recibiste el correo? <a href="crear_cuenta.php">Intenta registrarte nuevamente</a></small></p>
        </div>
    </div>
</div>

<style>
.mensaje-correo {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
    padding: 20px;
}

.contenido-mensaje {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    text-align: center;
    max-width: 500px;
    width: 100%;
}

.contenido-mensaje h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.8rem;
}

.mensaje-exito {
    background-color: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin: 20px 0;
    border: 1px solid #c3e6cb;
}

.email-enviado {
    background-color: #f8f9fa;
    color: #00c853;
    padding: 10px;
    border-radius: 8px;
    margin: 15px 0;
    font-size: 1.1rem;
}

.instrucciones {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 25px 0;
}

.instrucciones p {
    margin: 10px 0;
    color: #555;
}

.acciones {
    margin: 30px 0;
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: all 0.3s ease;
    min-width: 150px;
    justify-content: center;
}

.btn-primary {
    background-color: #00c853;
    color: white;
}

.btn-primary:hover {
    background-color: #007b33;
    transform: translateY(-2px);
}

.btn-secundario {
    background-color: #2196f3;
    color: white;
}

.btn-secundario:hover {
    background-color: #0b66c3;
    transform: translateY(-2px);
}

.ayuda {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.ayuda a {
  color: #2196f3;
    text-decoration: none;
}

.ayuda a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .contenido-mensaje {
        padding: 30px 20px;
        margin: 10px;
    }
    
    .acciones {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 100%;
        max-width: 250px;
    }
}
</style>