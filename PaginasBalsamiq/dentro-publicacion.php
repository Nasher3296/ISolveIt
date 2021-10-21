<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>I solve it</title>
        <link rel="stylesheet" href="style2.css">
        <meta name="author" content="Santiago Corvalan, Ignacio Fernandez, Belen Arrota, Ulises Argañaraz, Gonzalo Escobar">
        <meta name="description" content="Publicacion">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="grid_container">
        <?php
            include('../ImplementarPHP/config.php');
            session_start();

            $consulta = $conn->prepare("SELECT * FROM usuario WHERE username= :username"); 
            $consulta -> bindParam("username",$_SESSION['username'],PDO::PARAM_STR);
            $consulta ->execute();
            $usuarioSession =  $consulta->fetch(PDO::FETCH_ASSOC);

            $_SESSION['nombre'] = $usuarioSession['nombre'];
            $_SESSION['id_us'] = $usuarioSession['id_us'];
            $_SESSION['descripcion'] = $usuarioSession['descripcion'];
            $_SESSION['imagen'] = $usuarioSession['imagen'];
        ?>
        <header class="header">
            <h1 class="ISolveIt">I solve it</h1>
            <input class="buscador" type="text" placeholder="buscar...">
        </header>
        <aside class="sidebar">
            <div class="sidebar_usuario">
                <h4 class="h4"><?php echo $_SESSION['nombre']?></h4>
                <h5 class="h5">@<?php echo $_SESSION['username']?></h5>
            </div>
            <div class="sidebar_menu">
                <ul>
                    <li class="botones_sidebar"><a class="a" href="inicio.php"><i class="fas fa-home"></i> Inicio</a></li>
                    <li class="botones_sidebar"><a class="a" href="misdudas.php"><i class="fas fa-question"></i> Dudas</a></li>
                    <li class="botones_sidebar"><a class="a" href="postulaciones.php"><i class="fas fa-hands-helping"></i> Postulaciones</a></li>
                    <li class="botones_sidebar"><a class="a" href=""><i class="fas fa-users"></i> Seguidos</a></li>
                    <li class="botones_sidebar"><a class="a" href=""><i class="far fa-envelope"></i> Mensajes</a></li>
                    <li class="botones_sidebar"><a class="a" href="perfil.php"><i class="far fa-user-circle"></i> Mi perfil</a></li>
                </ul>
            </div>
            <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
        </aside>
        <div class="main">
            <div>
                <div>
                    <img src=Foto.usuario.publicacion width=píxelespx height=píxelespx alt="Foto del Usuario que publicó">
                </div>
                <div><p>nombre de usuario que publico</p></div>
                <div><p>arroba del usuario que publico</p></div>
                <div><p>titulo</p></div>
                <div>fecha de carga/fecha limite</div>
                <div>descripcion</div>
                <div>archivos</div>
                <div>tags</div>
            </div>
        </div>
    </body>
</html>