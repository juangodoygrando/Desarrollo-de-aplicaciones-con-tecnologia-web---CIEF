<form action="insert_temporal.php" method="post">
    <fieldset>
        <h1>Crear cuenta</h1>
        <div>
            <label for="usuario">Nombre:</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password2">Repite la contraseña:</label>
            <input type="password" name="password2" id="password2" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" id="telefono">
        </div>
        
        <!-- ERRORES -->
        <div class="error_cuenta">
            <?php if (isset($_SESSION['error_cuenta']) && $_SESSION['error_cuenta']): ?>
                <p>Por favor, completa todos los campos correctamente</p>
                <?php unset($_SESSION['error_cuenta']); ?>
            <?php endif; ?>
        </div>
        
        <div class="error_cuenta">
            <?php if (isset($_SESSION['user_repe']) && $_SESSION['user_repe']): ?>
                <p>Este nombre de usuario ya está en uso. Elige otro nombre.</p>
                <?php unset($_SESSION['user_repe']); ?>
            <?php endif; ?>
        </div>
        
        <div class="error_cuenta">
            <?php if (isset($_SESSION['email_repe']) && $_SESSION['email_repe']): ?>
                <p>Este correo electrónico ya está registrado. ¿Ya tienes una cuenta?</p>
                <?php unset($_SESSION['email_repe']); ?>
            <?php endif; ?>
        </div>
        
        <div class="error_cuenta">
            <?php if (isset($_SESSION['error_email']) && $_SESSION['error_email']): ?>
                <p><?php echo $_SESSION['error_email']; ?></p>
                <?php unset($_SESSION['error_email']); ?>
            <?php endif; ?>
        </div>
        
        <div class="botones">
            <button class="btnFom btnEnviar" type="submit">Enviar</button>
            <button class="btnFom btnBorrar" type="reset">Borrar</button>
        </div>
        <a class="btnVolver" href="login.php">Ya tengo cuenta</a>
    </fieldset>
</form>