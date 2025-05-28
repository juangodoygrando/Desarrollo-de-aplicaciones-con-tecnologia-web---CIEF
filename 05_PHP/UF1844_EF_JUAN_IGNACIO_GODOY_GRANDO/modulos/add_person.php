<h2>Formulario para añadir persona</h2>
<form action="../controladores/insert_person.php" method="POST">
    <label for="nombre_persona">Nombre:</label>
    <input type="text" name="nombre_persona" id="nombre_persona" required>

    <label for="apellido_persona">Apellido:</label>
    <input type="text" name="apellido_persona" id="apellido_persona" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>

    <label for="id_departamento">Departamento:</label>
    <select name="id_departamento" id="id_departamento" required>
        <option value="">-- Selecciona --</option>
        <option value="1">Dirección</option>
        <option value="2">Contabilidad</option>
        <option value="3">Ventas</option>
        <option value="4">Programación</option>
    </select>

    <div class="botones">
        <button type="submit">Añadir persona</button>
        <button type="reset">Borrar formulario</button>
    </div>
</form>