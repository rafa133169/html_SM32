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
        <h1>Agregar Tareas</h1> 
        <form action="procesar_guardar.php" method="post">
            <label>Titulo</label>
            <input name="titulo">
            <label>Descripcion</label>
            <textarea name="descripcion"></textarea>
            <button type="submit" name="guardar" class="btn">Guardar</button>
        </form>
    </div>
</body>
</html>