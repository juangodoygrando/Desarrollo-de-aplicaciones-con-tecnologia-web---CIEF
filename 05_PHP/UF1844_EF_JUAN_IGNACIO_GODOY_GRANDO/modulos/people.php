<!-- ** Aquí falta introducir el código para crear la "card" con la imagen y los datos de la persona -->

<a href="index.php?formulario=modificar&id_persona=<?= $fila['id_persona'] ?>">

    <div class="card" style="border: 2px solid <?= $fila['color_departamento']?>;">
        <img src="img/<?= $fila['nombre_persona'].".".$fila['apellido_persona']?>.png" alt="<?= $fila['nombre_persona']." ".$fila['apellido_persona'] ?>">
        <p class="nombre"><?= $fila['nombre_persona']." ".$fila['apellido_persona'] ?></p>
        <p class="email"><?= $fila['email'] ?></p>
    </div>
</a>

