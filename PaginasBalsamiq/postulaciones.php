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
                <li class="botones_sidebar"><a class="a" href="misdudas.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Dudas.svg" alt=""> Dudas</a></li>
                <li class="botones_sidebar"><a class="a" href="postulaciones.php" style="background-color: #5a5a9c"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Postulaciones.svg" alt=""> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href="recibidos.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Publicaciones_que_te_entregaron.svg" alt=""> Recibidos</a></li>
                <li class="botones_sidebar"><a class="a" href="entregados.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Publicaciones_Entregadas.svg" alt=""> Entregados</a></li>
                <li class="botones_sidebar"><a class="a" href="perfil.php"><img class="iconos_sidebar" id="icono_miperfil" src="../PagInicio/Recursos/iconos/Mi Perfil.svg" alt=""> Mi perfil</a></li>
            </ul>
        </div>
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main"> 
        <?php
            $i = 0;
            
            





            $consultaAsignado = $conn->prepare("SELECT id_consulta FROM asignado WHERE id_us = '".$_SESSION['id_us']."'");
            $consultaAsignado ->execute();
            while ($resultadoAsignado = $consultaAsignado->fetch(PDO::FETCH_ASSOC)) {
                $consultaConsulta = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = '".$resultadoAsignado['id_consulta']."'");
                $consultaConsulta ->execute();
                if($resultadoConsulta = $consultaConsulta->fetch(PDO::FETCH_ASSOC)){

                    
                    $consultaUsr = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resultadoConsulta['id_us']."'");
                    $consultaUsr ->execute();
                    $resultadoUsr = $consultaUsr->fetch(PDO::FETCH_ASSOC);
                


                    echo'
                    <div class="publicacion_preview" onclick="EntrarPublicacion(this.id);" id="'.$resultadoAsignado['id_consulta'].'">
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
                        <p class="desc">'.$resultadoConsulta['descripcion'].'</p>
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
                            echo'
                                <div class="postularDiv">
                                    <input value="Entrega pendiente" type="submit" class="postularBtn" name="verPostulantes" style="background-color:#5050ac">
                                </div>
                            ';
                        }
                        echo'
                            </div>
                        
                        ';
                }
            










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
                    <div class="publicacion_preview" onclick="EntrarPublicacion(this.id);" id="'.$resultadoConcurso['id_consulta'].'">
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
                        <p class="desc">'.$resultadoConsulta['descripcion'].'</p>
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
                            $i++;
                            $consultaConc = $conn->prepare("SELECT id_concurso FROM concurso WHERE (id_consulta = '".$resultadoConsulta["id_consulta"]."' AND id_us = '".$_SESSION['id_us']."')");
                            $consultaConc ->execute();
                            if($resultadoConc = $consultaConc->fetch(PDO::FETCH_ASSOC)){        
                                echo'
                                    <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="cancelar'.$i.'">
                                        <input type="hidden" name="id_cons" value="'.$resultadoConsulta['id_consulta'].'">
                                        <input type="hidden" name="dir" value="Location:../PaginasBalsamiq/postulaciones.php">
                                        <input value="Cancelar postulacion" type="submit" class="postularBtn cancelar" name="cancelar" form="cancelar'.$i.'">
                                    </form>
                                ';
                            }
                            else{
                                echo'
                                <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="postular'.$i.'">
                                    <input type="hidden" name="id_cons" value="'.$resultadoConsulta['id_consulta'].'">
                                    <input type="hidden" name="dir" value="Location:../PaginasBalsamiq/postulaciones.php">
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
            }
        ?>
    </div>
</body>
</html>