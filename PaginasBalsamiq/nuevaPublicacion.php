<!DOCTYPE html>
<html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>I solve it</title>
        </head>
    <body>
        <!-- Falta configurar el boton de publicar en el inicio -->
        
    </body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="plantilla.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body class="grid_container">
    <?php
        include('../ImplementarPHP/config.php');
        session_start();
    ?>

<header class="header">
        <h1 class="ISolveIt">I solve it</h1>
        <div class="buscador">
        <input type="text" placeholder="Buscar..." required>
            <div class="btn">
                <i class="fas fa-search icon"></i>
            </div>
        </div>
    </header>
    <aside class="sidebar">
        <div class="sidebar_usuario">
            <h4 class="h4">Nombre</h4>
            <h5 class="h5">@<?php echo $_SESSION['username']?></h5>
        </div>
        <div class="sidebar_menu">
            <ul>
                <li class="botones_sidebar"><a class="a" href="inicio.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="fas fa-question"></i> Dudas</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="fas fa-hands-helping"></i> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="fas fa-users"></i> Seguidos</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="far fa-envelope"></i> Mensajes</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="far fa-user-circle"></i> Mi perfil</a></li>
            </ul>
        </div>
        <a href=""><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main">
        <form action="../ImplementarPHP/publicar.php" method="POST">
            Titulo: <input type="text" name="title"><br>    
            Descripcion: <input type="text" name="desc"><br>
            Recompensa: <input type="number" name="rec"><br>
            Fecha Limite: <input type="date" name="lim"><br>
            Tags: <input type="text" name="tag"><br>
            <input type="submit" name="postear">
        </form>
    </div>
</body>
</html>