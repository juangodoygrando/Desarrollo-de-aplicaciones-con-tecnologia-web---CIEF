<h2>Modificar persona</h2>
<form action="../controladores/modify_data.php" method="POST">
    <input type="hidden" name="id_persona" value="<?= $persona['id_persona'] ?? '' ?>">

    <label for="nombre_persona">Nombre:</label>
    <input type="text" name="nombre_persona" id="nombre_persona" value="<?= $persona['nombre_persona'] ?>" required>

    <label for="apellido_persona">Apellido:</label>
    <input type="text" name="apellido_persona" id="apellido_persona" value="<?= $persona['apellido_persona'] ?>" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" value="<?= $persona['email'] ?>" required>

    <label for="id_departamento">Departamento:</label>
    <select name="id_departamento" id="id_departamento" required>
        <?php foreach ($departamentos as $departamento): ?>
            <option value="<?= $departamento['id_departamento'] ?>" 
                <?= ($persona['id_departamento'] ?? '') == $departamento['id_departamento'] ? 'selected' : '' ?>>
                <?= ucfirst($departamento['nombre_departamento']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div class="botones">
        <button type="submit">Guardar cambios</button>
    </div>
</form>
