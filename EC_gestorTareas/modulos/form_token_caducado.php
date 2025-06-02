<div class="token-caducado">
    <div class="contenido-error">
        <div class="icono-error">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        
        <h2>Token de verificación inválido</h2>
        
        <div class="mensaje-error">
            <p>El enlace de verificación que has utilizado:</p>
            <ul>
                <li>Ha expirado (más de 2 horas)</li>
                <li>Ya fue utilizado anteriormente</li>
                <li>No es válido</li>
            </ul>
        </div>
        
        <div class="solucion">
            <p><strong>¿Qué puedes hacer?</strong></p>
            <p>Regístrate nuevamente para recibir un nuevo enlace de verificación.</p>
        </div>
        
        <div class="acciones">
            <a href="crear_cuenta.php" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> 
                Registrarse de nuevo
            </a>
            
            <a href="login.php" class="btn btn-secundario">
                <i class="fas fa-sign-in-alt"></i> 
                Iniciar Sesión
            </a>
        </div>
    </div>
</div>

<style>
.token-caducado {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
    padding: 20px;
}

.contenido-error {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    text-align: center;
    max-width: 500px;
    width: 100%;
    border: 2px solid #f5c6cb;
}

.icono-error i {
    font-size: 4rem;
    color: #dc3545;
    margin-bottom: 20px;
}

.contenido-error h2 {
    color: #721c24;
    margin-bottom: 25px;
    font-size: 1.8rem;
}

.mensaje-error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 20px;
    border-radius: 8px;
    margin: 20px 0;
    border: 1px solid #f5c6cb;
    text-align: left;
}

.mensaje-error ul {
    margin: 10px 0;
    padding-left: 20px;
}

.mensaje-error li {
    margin: 8px 0;
}

.solucion {
    background-color: #fff3cd;
    color: #856404;
    padding: 20px;
    border-radius: 8px;
    margin: 20px 0;
    border: 1px solid #ffeaa7;
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
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

.btn-secundario {
    background-color: #6c757d;
    color: white;
}

.btn-secundario:hover {
    background-color: #5a6268;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .contenido-error {
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