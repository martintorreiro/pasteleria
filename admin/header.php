<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.numeric.js"></script>
    <script src="js/funciones/cargarPreviews.js"></script>
    <script src="js/funciones/controlesFormularios.js"></script>
    <script src="js/funciones/borrarFoto.js"></script>
    <script src="js/funciones/cargarFotosForm.js"></script>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Bakerix</title>
</head>

<body>

    <header class="flex jc-sb ai-center header">
        <div><span>ADMINISTRACION</span></div>
        <nav>
            <ul class="flex">
                <li> <a href="listar-productos.php">Productos</a></li>
                <li> <a href="listar-categorias.php">Categorias</a></li>
                <li> <a href="listar-posts.php">Posts</a></li>
                <li> <a href="listar-usuarios.php">Usuarios</a></li>
                <li> <a href="logout.php">Logout</a></li>
                <span><?php echo $_SESSION['nombre_autor'];?></span>
            </ul>
        </nav>
    </header>