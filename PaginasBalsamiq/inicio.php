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
        <input class="buscador" type="text" placeholder="buscar...">
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
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main">
        <div class="publicaciones">
        <?php
            for($i = 1 ; $i < 3 ; $i++){
                /* Hay que optimizar esto. No debería consultarse la base de datos en bucle. Tiene que ser una unica consulta y luego recorrer el array obtenido */
                $consulta = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = $i"); 
                $consulta ->execute();
                $resultadoCon = $consulta->fetch(PDO::FETCH_ASSOC);

                $consulta = $conn->prepare("SELECT * FROM usuario WHERE id_us= :id_us"); 
                $consulta -> bindParam("id_us",$resultadoCon['id_us'],PDO::PARAM_STR);
                $consulta ->execute();
        
                $resultadoUser = $consulta->fetch(PDO::FETCH_ASSOC);

                echo'
                <div class="publicacion_preview">
                <div class="data">
                    <div class="foto">
                        A
                    </div>
                    <div class="usuario">
                        <h4>Nombre</h4>
                        <h5>@'.$resultadoUser["username"].'</h5>
                    </div>
                    <div class="recoyvenc">
                        <h4>Recompensa: $'.$resultadoCon["recompensa"].'</h4>
                        <!--Para el vencimiento un simbolito de reloj y el tiempo restante-->
                        <h4>Vencimiento: 23:49</h4>
                    </div>
                </div>
                <div class="cuerpo">
                    <h2>'.$resultadoCon['titulo'].'</h2>
                    <!--Descripcion-->
                    <p>'.$resultadoCon['descripcion'].'</p>
                </div>
                <div class="tags">
                    <!--Que aparezcan iconos de archivos en caso de haberlos, similar a gmail-->
                    <h4>Etiquetas: </h4>
                </div>
            </div>
                ';
            }
        ?>
        </div> 
    </div>
</body>
</html>