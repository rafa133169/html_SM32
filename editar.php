<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor de tareas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <?php
    require_once('conexion.php');
    if (isset($_GET['id'])) {
        $elID = $_GET['id'];
        $consulta = "select * from Tarea where ID=:elid";
        $sql = $conexion->prepare($consulta);
        $sql->bindParam(':elid', $elID);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        if ($sql->rowCount() > 0) {
            $eltitulo = $resultado[0]->Titulo;
            $ladescripcion = $resultado[0]->Descripcion;

    ?>
            <div class="container">
                <h1>Agregar Tareas</h1>
                <form action="procesar_editar.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $elID; ?>">
                    <label>Titulo</label>
                    <input name="titulo" value="<?php echo $eltitulo; ?> ">
                    <label>Descripcion</label>
                    <textarea name="descripcion"><?php echo $ladescripcion; ?></textarea>
                    <button type="submit" name="editar" class="btn">Guardar cambios</button>
                </form>
            </div>
    <?php
        } // fin del if de row count

    } // fin del isset
    ?>
</body>

</html>