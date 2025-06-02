<form action="procesar_recuperacion.php" method="post">
    <fieldset>
        <h2>Recuperar contraseña</h2>

        <p>Para recuperar tu contraseña debes ingresar el correo electronico con el que te registraste en taskin:</p>

        <label for="email">Ingresa tu email registrado:</label>
        <input type="email" name="email_registrado" id="email_registrado"  required>

        <div class="error_cuenta">
            <?php if (isset($_SESSION['error_email']) && $_SESSION['error_email']): ?>
                <p><?php echo $_SESSION['error_email']; ?></p>
                <?php unset($_SESSION['error_email']); ?>
            <?php endif; ?>
        </div>

        <div class="botones">
            <button type="submit">Recuperar contraseña</button>
            <button><a href="login.php">Cancelar</a></button>
            
        </div>
        <a href="login.php">Ya recorde la contraseña</a>
        
    </fieldset>
</form>