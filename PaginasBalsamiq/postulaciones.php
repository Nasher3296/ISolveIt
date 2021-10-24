<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <!--link para los iconos [NO BORRAR] -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="publicacion_plantilla.css">
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
        <?php
            $consultaConcurso = $conn->prepare("SELECT id_consulta FROM concurso WHERE id_us = '".$_SESSION['id_us']."'");
            $consultaConcurso ->execute();
            while ($resultadoConcurso = $consultaConcurso->fetch(PDO::FETCH_ASSOC)) {
                $consultaConsulta = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = '".$resultadoConcurso['id_consulta']."'");
                $consultaConsulta ->execute();
                if($resultadoConsulta = $consultaConsulta->fetch(PDO::FETCH_ASSOC)){

                    
                    $consultaUsr = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resultadoConsulta['id_us']."'");
                    $consultaUsr ->execute();
                    $resultadoUsr = $consultaUsr->fetch(PDO::FETCH_ASSOC);
                


                    echo'
                    <div class="publicacion_preview">
                    <div class="data">
                        <div class="foto">
                            <img class="fotoPerfil" src="recursos/fotoPerfil/'.$resultadoUsr['imagen'].'.png" alt="'.$resultadoUsr['username'].'">
                        </div>
                        <div class="usuario">
                            <h4>'.$resultadoUsr["nombre"].'</h4>
                            <h5>@'.$resultadoUsr["username"].'</h5>
                        </div>
                        <div class="recoyvenc">
                            <h4>Recompensa: $'.$resultadoConsulta["recompensa"].'</h4>
                            <!--Para el vencimiento un simbolito de reloj y el tiempo restante-->
                            <h4>Vencimiento: '.$resultadoConsulta["fecha_limite"].'</h4>
                        </div>
                    </div>
                    <div class="cuerpo">
                        <h2>'.$resultadoConsulta['titulo'].'</h2>
                        <!--Descripcion-->
                        <p>'.$resultadoConsulta['descripcion'].'</p>
                    </div>
                    <div class="tags">
                        <!--Que aparezcan iconos de archivos en caso de haberlos, similar a gmail-->
                        <h4>Etiquetas: </h4>
                        <ul class="tags_list">
                    ';
                    $consultaTagCons = $conn->prepare("SELECT tag_cons FROM tag_cons WHERE id_cons = '".$resultadoConsulta['id_consulta']."'");
                    $consultaTagCons ->execute();
                    while($resultadoTagCons = $consultaTagCons->fetch(PDO::FETCH_ASSOC)){
                        $consultaTag = $conn->prepare("SELECT tag FROM tag WHERE id = '".$resultadoTagCons['tag_cons']."'");
                        $consultaTag ->execute();
                        while($resultadoTag = $consultaTag->fetch(PDO::FETCH_ASSOC)){
                            echo'<li class="tag">'.$resultadoTag['tag'].'</li>';
                        }
                    }
                                    
                    echo'
                            </ul>
                        </div>
                    ';

                    if($resultadoConsulta['id_us'] != $_SESSION['id_us']){
                        echo'
                        <div class="postularDiv">
                        ';
                        
                        $consultaConcurso = $conn->prepare("SELECT id_us FROM concurso WHERE id_consulta = '".$resultadoConsulta["id_consulta"]."'");
                        $consultaConcurso ->execute();
                        if($resultadoConcurso = $consultaConcurso->fetch(PDO::FETCH_ASSOC)){      
                            if($resultadoConcurso['id_us'] == $_SESSION['id_us']){    
                                echo'
                                    <a class="postularBtn cancelar">Cancelar postulacion</a>
                                ';
                            }else{
                                echo'
                                    <a class="postularBtn postular">Quiero postularme</a>
                                ';
                            }
                        }
                        else{
                            echo'
                                <a class="postularBtn postular">Quiero postularme</a>
                            ';
                        }
                        echo'
                            </div>
                        ';
                        }
                    else{
                        echo'
                            <div class="postularDiv">
                                <a>Ver postulantes</a>
                            </div>
                        ';
                    }
                    echo'
                        </div>
                    ';
                }
            }
        ?>
    </div>
</body>
</html>