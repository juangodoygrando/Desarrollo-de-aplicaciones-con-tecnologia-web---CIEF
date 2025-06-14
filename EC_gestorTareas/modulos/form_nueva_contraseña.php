<div class="cambiar-contraseña">
    <div class="contenido-form">
        <div class="icono-form">
            <i class="fas fa-key"></i>
        </div>

        <h2>Crear nueva contraseña</h2>

        <p class="descripcion">Ingresa tu nueva contraseña para continuar con el acceso a tu cuenta <strong>Taskin</strong>. Asegúrate de que sea segura y fácil de recordar.</p>

        <!-- Requisitos de seguridad -->
        <div class="requisitos-seguridad">
            <h4><i class="fas fa-shield-alt"></i> Requisitos de seguridad:</h4>
            <div class="requisito-item">
                <i class="fas fa-check-circle"></i>
                <span>Mínimo 8 caracteres de longitud</span>
            </div>
            <div class="requisito-item">
                <i class="fas fa-check-circle"></i>
                <span>Incluir mayúsculas y minúsculas</span>
            </div>
            <div class="requisito-item">
                <i class="fas fa-check-circle"></i>
                <span>Al menos un número o símbolo</span>
            </div>
        </div>

        <form action="cambiar_contraseña.php" method="post">
            <div class="campo-grupo">
                <label for="nueva_contraseña">
                    <i class="fas fa-lock"></i>
                    Nueva contraseña:
                </label>
                <div class="input-container">
                    <input type="password" name="nueva_contraseña" id="nueva_contraseña" placeholder="Ingresa tu nueva contraseña" required>
                    <span class="toggle-password" onclick="togglePassword('nueva_contraseña')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="campo-grupo">
                <label for="repetir_contraseña">
                    <i class="fas fa-lock"></i>
                    Repite la contraseña:
                </label>
                <div class="input-container">
                    <input type="password" name="repetir_contraseña" id="repetir_contraseña" placeholder="Confirma tu nueva contraseña" required>
                    <span class="toggle-password" onclick="togglePassword('repetir_contraseña')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>


            <input type="hidden" name="token" value="<?php echo $token; ?>">


            <div class="error_cuenta">
                <?php if (isset($_SESSION['error_contraseña'])): ?>
                    <div class="mensaje-error">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p><?php echo $_SESSION['error_contraseña']; ?></p>
                    </div>
                    <?php unset($_SESSION['error_contraseña']); ?>
                <?php endif; ?>
            </div>

            <div class="acciones">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-key"></i>
                    Cambiar contraseña
                </button>

                <a href="login.php" class="btn btn-secundario">
                    <i class="fas fa-times"></i>
                    Cancelar
                </a>
            </div>
        </form>

        <div class="info-adicional">
            <div class="nota-seguridad">
                <i class="fas fa-info-circle"></i>
                <p>Por tu seguridad, todas las sesiones activas en otros dispositivos serán cerradas automáticamente al cambiar la contraseña.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .cambiar-contraseña {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .contenido-form {
        background: white;
        padding: 50px 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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
        animation: keyAnimation 0.8s ease-in-out;
    }

    @keyframes keyAnimation {
        0% {
            transform: scale(0) rotate(0deg);
            opacity: 0;
        }

        25% {
            transform: scale(0.5) rotate(90deg);
            opacity: 0.5;
        }

        50% {
            transform: scale(1.1) rotate(180deg);
            opacity: 0.8;
        }

        75% {
            transform: scale(0.9) rotate(270deg);
            opacity: 0.9;
        }

        100% {
            transform: scale(1) rotate(360deg);
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
        margin-bottom: 25px;
        font-size: 1.1rem;
        line-height: 1.5;
    }

    .requisitos-seguridad {
        background-color: #e7f3ff;
        padding: 20px;
        border-radius: 12px;
        margin: 25px 0;
        border: 1px solid #b3d9ff;
        text-align: left;
    }

    .requisitos-seguridad h4 {
        color: #0c5aa6;
        margin-bottom: 15px;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .requisito-item {
        display: flex;
        align-items: center;
        margin: 10px 0;
        color: #0c5aa6;
    }

    .requisito-item i {
        color: #28a745;
        font-size: 0.9rem;
        margin-right: 10px;
        width: 16px;
    }

    .requisito-item span {
        font-size: 0.95rem;
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

    .input-container {
        position: relative;
    }

    .campo-grupo input[type="password"] {
        width: 100%;
        padding: 15px 50px 15px 20px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
    }

    .campo-grupo input[type="password"]:focus {
        outline: none;
        border-color: #2196f3;
        background-color: white;
        box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
    }

    .campo-grupo input[type="password"]::placeholder {
        color: #adb5bd;
        font-style: italic;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }

    .toggle-password:hover {
        color: #2196f3;
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

    .btn-secundario {
        background-color: #2196f3;
        color: white;
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
        background-color: #fff3cd;
        color: #856404;
        padding: 15px 20px;
        border-radius: 10px;
        border: 1px solid #ffeaa7;
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

        .campo-grupo input[type="password"] {
            padding: 12px 45px 12px 15px;
        }

        .requisitos-seguridad {
            padding: 15px;
        }
    }
</style>

<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = input.nextElementSibling.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>