<?php

$token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
?>

<form action="cambiar_contraseña.php" method="post">
    <fieldset>
        <h2>Crear nueva contraseña</h2>

        <p>Ingresa tu nueva contraseña para continuar con el acceso a tu cuenta Taskin.</p>

        <label for="nueva_contraseña">Nueva contraseña:</label>
        <input type="password" name="nueva_contraseña" id="nueva_contraseña" required>

        <label for="repetir_contraseña">Repite la contraseña:</label>
        <input type="password" name="repetir_contraseña" id="repetir_contraseña" required>

        <!-- Campo oculto con el token de recuperación -->
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <!-- Mensajes de error si existen -->
        <div class="error_cuenta">
            <?php if (isset($_SESSION['error_contraseña'])): ?>
                <p><?php echo $_SESSION['error_contraseña']; ?></p>
                <?php unset($_SESSION['error_contraseña']); ?>
            <?php endif; ?>
        </div>

        <div class="botones">
            <button type="submit">Cambiar contraseña</button>
            <button><a href="login.php">Cancelar</a></button>
        </div>
        
    </fieldset>
</form>
