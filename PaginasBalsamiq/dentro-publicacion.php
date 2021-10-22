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
                <?php
                    $fotoperfil=$GET["varFotoperfil"];
                    $nombre=$GET["varNombre"];
                    $arroba=$GET["varArroba"];
                    $titulo=$GET["varTitulo"];
                    $recompensa=$GET["varRecompensa"];
                    $arroba=$GET["varArroba"];
                    $descripcion=$GET["varDescripcion"];
                    $fechasubida=$GET["varFechasubida"];
                    $fechalimite=$GET["varFechalimite"];



                    $consulta5 = $conn->prepare("SELECT tag_cons FROM tag_cons WHERE id_cons = '".$resultadoCon['id_consulta']."'");
                    $consulta5 ->execute();
                    while($resultadoTagCons = $consulta5->fetch(PDO::FETCH_ASSOC)){
                        $consulta6 = $conn->prepare("SELECT tag FROM tag WHERE id = '".$resultadoTagCons['tag_cons']."'");
                        $consulta6 ->execute();
                        while($resultadoTag = $consulta6->fetch(PDO::FETCH_ASSOC)){
                            echo'<li class="tag">'.$resultadoTag['tag'].'</li>';
                        }
                    }
                ?>
                <div><p>nombre de usuario que publico</p></div>
                <div><p>arroba del usuario que publico</p></div>
                <div><p>titulo</p></div>
                <div>fecha de carga/fecha limite</div>
                <div>RECOMPENSA</div>
                <div>descripcion</div>
                <div>archivos</div>
                <div>tags</div>
            </div>
        </div>
    </body>
</html>