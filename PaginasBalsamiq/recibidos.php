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
            <h5 class="h5">$<?php echo $_SESSION['tokens']?></h5>
        </div>
        <div class="sidebar_menu">
            <ul>
                <li class="botones_sidebar"><a class="a" href="inicio.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="botones_sidebar"><a class="a" href="misdudas.php"><i class="fas fa-question"></i> Dudas</a></li>
                <li class="botones_sidebar"><a class="a" href="postulaciones.php"><i class="fas fa-hands-helping"></i> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href="recibidos.php" style="background-color: #5a5a9c"><i class="fas fa-users"></i> Recibidos</a></li>
                <li class="botones_sidebar"><a class="a" href="entregados.php"><i class="far fa-envelope"></i> Entregados</a></li>
                <li class="botones_sidebar"><a class="a" href="perfil.php"><i class="far fa-user-circle"></i> Mi perfil</a></li>
            </ul>
        </div>
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main"> 
        <?php
            $i = 0;
            $consCons = $conn->prepare("SELECT id_consulta FROM consulta WHERE id_us = '".$_SESSION['id_us']."'");
            $consCons ->execute();
            while ($resCons = $consCons->fetch(PDO::FETCH_ASSOC)) {
                $consultaEntregado = $conn->prepare("SELECT id_cons FROM entregado WHERE id_cons = '".$resCons['id_consulta']."'");
                $consultaEntregado ->execute();
                while ($resultadoEntregado = $consultaEntregado->fetch(PDO::FETCH_ASSOC)) {
                    $consultaConsulta = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = '".$resultadoEntregado['id_cons']."'");
                    $consultaConsulta ->execute();
                    if($resultadoConsulta = $consultaConsulta->fetch(PDO::FETCH_ASSOC)){

                        
                        $consultaUsr = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resultadoConsulta['id_us']."'");
                        $consultaUsr ->execute();
                        $resultadoUsr = $consultaUsr->fetch(PDO::FETCH_ASSOC);
                    


                        echo'
                        <div class="publicacion_preview" onclick="EntrarPublicacion(this.id);" id="'.$resultadoEntregado['id_cons'].'">
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
                                        <input value="Recibido" type="submit" class="postularBtn" name="verPostulantes" style="background-color:red">
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