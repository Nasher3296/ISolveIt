<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="publicacion_plantilla.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
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
        <div class="publicaciones">
            <?php
                

                $consulta = $conn->prepare("SELECT tag_us FROM tag_usuario WHERE id_us = '".$_SESSION['id_us']."'");
                $consulta ->execute();
                while($resultadoTagUsr = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $consulta2 = $conn->prepare("SELECT id_cons FROM tag_cons WHERE tag_cons = '".$resultadoTagUsr['tag_us']."'");
                    $consulta2 ->execute();
                    if($resultadoTag = $consulta2->fetch(PDO::FETCH_ASSOC)){

                        $consulta3 = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = '".$resultadoTag['id_cons']."'");
                        $consulta3 ->execute();
                        if($resultadoCon = $consulta3->fetch(PDO::FETCH_ASSOC)){
                            

                            $consulta4 = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resultadoCon['id_us']."'");
                            $consulta4 ->execute();
                            $resultadoUser = $consulta4->fetch(PDO::FETCH_ASSOC);
                        
                        


                            echo'
                                <div class="publicacion_preview">
                                    <div class="data">
                                        <div class="foto">
                                            A
                                            <!--<img class="fotoPerfil" src="recursos/fotoPerfil/'.$resultadoUser['imagen'].'.png" alt="'.$resultadoUser['username'].'">-->
                                        </div>
                                        <div class="usuario">
                                            <h4>'.$resultadoUser["nombre"].'</h4>
                                            <h5>@'.$resultadoUser["username"].'</h5>
                                        </div>
                                        <div class="recoyvenc">
                                            <h4>Recompensa: $'.$resultadoCon["recompensa"].'</h4>
                                            <!--Para el vencimiento un simbolito de reloj y el tiempo restante-->
                                            <h4>Vencimiento: '.$resultadoCon["fecha_limite"].'</h4>
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
                                        <ul class="tags_list">
                            ';
                                        
                            $consulta5 = $conn->prepare("SELECT tag_cons FROM tag_cons WHERE id_cons = '".$resultadoCon['id_consulta']."'");
                            $consulta5 ->execute();
                            while($resultadoTagCons = $consulta5->fetch(PDO::FETCH_ASSOC)){
                                $consulta6 = $conn->prepare("SELECT tag FROM tag WHERE id = '".$resultadoTagCons['tag_cons']."'");
                                $consulta6 ->execute();
                                while($resultadoTag = $consulta6->fetch(PDO::FETCH_ASSOC)){
                                    echo'<li class="tag">'.$resultadoTag['tag'].'</li>';
                                }
                            }
                                           
                                                    
                            echo'
                                        </ul>
                                    </div>
                                </div>
                            ';
                        }
                    }
                }
            ?>
        </div> 
    </div>
</body>
</html>