<?php session_start();
if (isset($_SESSION['elusuario'])) { // VALIDAMOS QUE EXISTA LA SESIÓN
    echo sha1('123');
?>
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
        <div class="container">
            <h1>Lista de Tareas</h1>
            <p>Bienvenido (a) <?php echo $_SESSION['elusuario']; ?></p>
            <p><a href="salir.php">Cerrar sesión [x]</a></p>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Fecha de Entrega</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require_once('conexion.php');
                    $sql = "SELECT * FROM Tarea where Estatus>0";
                    $consulta = $conexion->prepare($sql);
                    $consulta->execute();
                    $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
                    $i = 1;
                    if ($consulta->rowCount() > 0) {
                        foreach ($resultado as $registro) {
                            echo "
          <tr>
            <td>" . $i++ . "</td>
            <td>" . $registro->Titulo . "</td>
            <td>" . $registro->FechaCaducidad . "</td>
            <td><a href='editar.php?id=" . $registro->ID . "'>Editar</a></td>
            <td><a onclick='eliminar(" . $registro->ID . ")'>Eliminar</a></td>
          </tr>  ";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <a href="agregar.php" class="btn">Agregar</a>
        </div>
        <script>
            function eliminar(valor) {
                if (confirm("Desea eliminar el ID " + valor)) {
                    location.href = "eliminar.php?id=" + valor;
                }
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('location:index.php');
}
?>