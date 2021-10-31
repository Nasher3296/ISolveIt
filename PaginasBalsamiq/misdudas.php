<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <!--link para los iconos [NO BORRAR] -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="NO_TOCAR.css"> 
    <link rel="stylesheet" href="publicacion_plantilla.css">
    <script src="EntrarPublicacion.js"></script>
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
        $_SESSION['tokens'] = $usuarioSession['tokens'];
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
            <h5 class="tokens">$<?php echo $_SESSION['tokens']?></h5>
        </div>
        <div class="sidebar_menu">
            <ul>
                <li class="botones_sidebar"><a class="a" href="inicio.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Inicio.svg" alt=""> Inicio</a></li>
                <li class="botones_sidebar"><a class="a" href="misdudas.php" style="background-color: #5a5a9c"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Dudas.svg" alt=""> Dudas</a></li>
                <li class="botones_sidebar"><a class="a" href="postulaciones.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Postulaciones.svg" alt=""> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href="recibidos.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Publicaciones_que_te_entregaron.svg" alt=""> Recibidos</a></li>
                <li class="botones_sidebar"><a class="a" href="entregados.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Publicaciones_Entregadas.svg" alt=""> Entregados</a></li>
                <li class="botones_sidebar"><a class="a" href="perfil.php"><img class="iconos_sidebar" id="icono_miperfil" src="../PagInicio/Recursos/iconos/Mi Perfil.svg" alt=""> Mi perfil</a></li>
            </ul>
        </div>
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main"> 
        <div class="mainCont">

        
        <?php
            $i = 0;
            $consulta = $conn->prepare("SELECT * FROM consulta WHERE id_us = '".$_SESSION['id_us']."'");
            $consulta ->execute();
            while ($resultadoUser = $consulta->fetch(PDO::FETCH_ASSOC)) {    
                echo'
                <div class="publicacion_preview" onclick="EntrarPublicacion(this.id);" id="'.$resultadoUser['id_consulta'].'">
                <div class="data">
                    <div class="foto">
                        <img class="fotoPerfil" src="recursos/fotoPerfil/'.$_SESSION['imagen'].'.png" alt="'.$_SESSION['username'].'">
                    </div>
                    <div class="usuario">
                        <h4>'.$_SESSION["nombre"].'</h4>
                        <h5>@'.$_SESSION["username"].'</h5>
                    </div>
                    <div class="recoyvenc">
                        <h4>Recompensa: $'.$resultadoUser["recompensa"].'</h4>
                        <!--Para el vencimiento un simbolito de reloj y el tiempo restante-->
                        <h4>Vencimiento: '.$resultadoUser["fecha_limite"].'</h4>
                    </div>
                </div>
                <div class="cuerpo">
                    <h2>'.$resultadoUser['titulo'].'</h2>
                    <!--Descripcion-->
                    <p class="desc">'.$resultadoUser['descripcion'].'</p>
                </div>
                <div class="tags">
                    <!--Que aparezcan iconos de archivos en caso de haberlos, similar a gmail-->
                    <h4>Etiquetas: </h4>
                    <ul class="tags_list">
                ';
                $consulta5 = $conn->prepare("SELECT tag_cons FROM tag_cons WHERE id_cons = '".$resultadoUser['id_consulta']."'");
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
                                ';
                                
                                if($resultadoUser['id_us'] != $_SESSION['id_us']){
                                    echo'
                                        <div class="postularDiv">
                                    ';
                                    $i++;
                                    $consultaConcurso = $conn->prepare("SELECT id_concurso FROM concurso WHERE (id_consulta = '".$resultadoUser["id_consulta"]."' AND id_us = '".$_SESSION['id_us']."')");
                                    $consultaConcurso ->execute();
                                    if($resultadoConcurso = $consultaConcurso->fetch(PDO::FETCH_ASSOC)){        
                                        echo'
                                            <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="cancelar'.$i.'">
                                                <input type="hidden" name="id_cons" value="'.$resultadoUser['id_consulta'].'">
                                                <input value="Cancelar postulacion" type="submit" class="postularBtn cancelar" name="cancelar" form="cancelar'.$i.'">
                                            </form>
                                        ';
                                    }
                                    else{
                                        echo'
                                        <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="postular'.$i.'">
                                            <input type="hidden" name="id_cons" value="'.$resultadoUser['id_consulta'].'">
                                            <input value="Postularme" type="submit" class="postularBtn postular" name="postular" form="postular'.$i.'">
                                        </form>
                                        ';
                                    }
                                    echo'
                                        </div>
                                    ';
                                }
                                else{
                                    echo'
                                        <div class="postularDiv">
                                            <input value="Ver postulantes" type="submit" class="postularBtn verPostulantes" name="verPostulantes">
                                        </div>
                                    ';
                                }
                                echo'
                                    </div>
                                ';
            }
        ?>
        </div>
    </div>
</body>
</html>