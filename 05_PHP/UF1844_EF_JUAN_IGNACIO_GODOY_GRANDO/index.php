<?php
require_once 'connection.php';

// ** SELECT para obtener las personas

$select = "SELECT personas.*, departamentos.nombre_departamento AS departamento,departamentos.color_departamento AS color_departamento
FROM personas
JOIN departamentos ON personas.id_departamento=departamentos.id_departamento
ORDER BY personas.apellido_persona ASC
";
$preparacion = $pdo->prepare($select);
$preparacion->execute();
$array_filas = $preparacion->fetchAll();

$dept_stmt = $pdo->prepare("SELECT * FROM departamentos");
$dept_stmt->execute();
$departamentos = $dept_stmt->fetchAll();

$persona = null;

if (isset($_GET['id_persona'])) {
    $id_persona = $_GET['id_persona'];

    $stmt = $pdo->prepare("SELECT * FROM personas WHERE id_persona = ?");
    $stmt->execute([$id_persona]);
    $persona = $stmt->fetch();
}


/* echo '<pre>';
print_r($array_filas);
echo '</pre>'; */

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <?php include_once 'header.php' ?>
    <main>

        <div>

            <section>

                <div class="people">

                    <h2>Dirección</h2>
                    <div>
                        <?php foreach ($array_filas as $fila) : ?>

                            <?php if ($fila['departamento'] == "direccion") : ?>

                                <?php include "modulos/people.php"; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>

                    <h2>Contabilidad</h2>
                    <div>
                        <?php foreach ($array_filas as $fila) : ?>

                            <?php if ($fila['departamento'] == "contabilidad") : ?>
                                <?php include "modulos/people.php"; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>

                    <h2>Ventas</h2>
                    <div>
                        <?php foreach ($array_filas as $fila) : ?>

                            <?php if ($fila['departamento'] == "ventas") : ?>
                                <?php include "modulos/people.php"; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>

                    <h2>Programación</h2>
                    <div>
                        <?php foreach ($array_filas as $fila) : ?>

                            <?php if ($fila['departamento'] == "programacion") : ?>
                                <?php include "modulos/people.php"; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>

                </div>
            </section>
            <section>
                <h2>Evaluación contínua</h2>
                <p>¡Completa los formularios!</p>
                <?php

            $formulario = $_GET['formulario'] ?? 'ingresar';
            switch ($formulario) {
                case 'modificar':
                    include_once 'modulos/editar_datos.php';
                    break;
                case 'ingresar':
                    include_once 'modulos/add_person.php';

                    break;
            }
            ?>

            </section>
        </div>

    </main>
</body>

</html>