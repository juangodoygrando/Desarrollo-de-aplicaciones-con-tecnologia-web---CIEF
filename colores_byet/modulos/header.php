<header>
    <div>
        <h1>Nuestros colores preferidos</h1>
        <div>

            <?php if (isset($_COOKIE['usuario'])): ?>
                <span>¡Hola <?= htmlspecialchars($_COOKIE['usuario']) ?></span>
                <?php else : ?>
                    <span>Por favor, inicia sesion</span>
            <?php endif; ?>

            <?php if (isset($_SESSION['usuario'])): ?>
                <!-- <span>¡Hola <?= htmlspecialchars($_SESSION['usuario']) ?></span> -->
                <form action="../logout.php" method="post">
                    <button id="btnLogout" type="submit"><i class="fa-solid fa-door-open"></i></button>
                </form>
            <?php endif; ?>

            <?php
            $rutaIdioma = "modulo/idioma.php";
            if (isset($_SESSION["usuario"])) {
                $rutaIdioma = "../modulo/idioma.php";
            }
            ?>
            <form action="<?= $rutaIdioma ?>" name="form-idioma" method="post">
                <select name="select-idioma" id="select-idioma">
                    <option value="es">ESP</option>
                    <option value="ca">CAT</option>
                    <option value="en">ENG</option>
                </select>
            </form>
        </div>
    </div>
</header>