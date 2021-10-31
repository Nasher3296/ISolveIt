<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>I solve it</title>
        <link rel="stylesheet" href="NO_TOCAR.css"> 
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" href="dentro-publicacion.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <meta name="author" content="Santiago Corvalan, Ignacio Fernandez, Belen Arrota, Ulises Argañaraz, Gonzalo Escobar">
        <meta name="description" content="Publicacion">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
    <script>
        function Alternar(){
            let cancelar = document.getElementById("entregarCanvas");
            if(cancelar.style.display == "block"){
                    cancelar.style.display = "none";          
                }
                else{
                    cancelar.style.display = "block";
                }
            }
    </script>
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
                <li class="botones_sidebar"><a class="a" href="inicio.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="botones_sidebar"><a class="a" href="misdudas.php"><i class="fas fa-question"></i> Dudas</a></li>
                <li class="botones_sidebar"><a class="a" href="postulaciones.php"><i class="fas fa-hands-helping"></i> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href="recibidos.php"><i class="fas fa-users"></i> Recibidos</a></li>
                <li class="botones_sidebar"><a class="a" href="entregados.php"><i class="far fa-envelope"></i> Entregados</a></li>
                <li class="botones_sidebar"><a class="a" href="perfil.php"><i class="far fa-user-circle"></i> Mi perfil</a></li>
            </ul>
        </div>
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main">
        <?php
            $i = 0;
            $conCon = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = '".$_GET['id']."'");
            $conCon ->execute();
            if($resCon = $conCon->fetch(PDO::FETCH_ASSOC)){

            

            $conus = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resCon['id_us']."'");
            $conus ->execute();
            $resus = $conus->fetch(PDO::FETCH_ASSOC);

            
            echo' 
                <div class="generalCont">
                    <div class="publicacion">
                        <div class="data">
                            <div class="envolvedor">
                                <div class="envolvedor">
                                    <img class="foto" src="recursos/fotoPerfil/0.png" alt="">
                                    <div class="posteo_datosusuario">
                                        <h4>'.$resus['nombre'].'</h4>
                                        <h5>@'.$resus['username'].'</h5>
                                    </div>
                                </div>
                                <div class="posteo_recompensa_fecha">
                                    <h4>Recompensa: $'.$resCon['recompensa'].'</h4>
                                    <h4>Subida: '.$resCon['fecha_subida'].'</h4>
                                    <h4>Limite: '.$resCon['fecha_limite'].'</h4>
                                </div>
                            </div>
                        </div>
                        <div class="cuerpo">
                            <h2 class="tituPub">'.$resCon['titulo'].'</h2>
                            <p class="desc">'.$resCon['descripcion'].'
                            <div class="archivo_consulta">
                                <a href="'.$resCon['archivo'].'" download>Descargar archivo</a>
                            </div>
                        </div>
                        <div class="envolvedor">
                            <div class="tags">
                                <h4>Etiquetas: </h4>
                                <ul class="tags_list">
            ';
            $conTagCons = $conn->prepare("SELECT tag_cons FROM tag_cons WHERE id_cons = '".$resCon['id_consulta']."'");
            $conTagCons ->execute();
            while($resultadoTagCons = $conTagCons->fetch(PDO::FETCH_ASSOC)){
                $conTag = $conn->prepare("SELECT tag FROM tag WHERE id = '".$resultadoTagCons['tag_cons']."'");
                $conTag ->execute();
                while($resTag = $conTag->fetch(PDO::FETCH_ASSOC)){
                                echo'<li class="tag">'.$resTag['tag'].'</li>';
                }
            }                      
            echo'
                                </ul>
                            </div>
            ';

            /* Hasta aca todo igual para todos */


            /* Si está terminado */
$conEnt = $conn->prepare("SELECT * FROM entregado WHERE id_cons = '".$_GET['id']."'");
$conEnt ->execute();
if($resEnt = $conEnt->fetch(PDO::FETCH_ASSOC)){
    echo'
                        </div>
                            <div class="resolucion">
                                <h3 class="resolucionText">Resolucion</h3>
                                <p class="explicacion">
                                    '.$resEnt['descripcion'].'
                                </p>
                                <div class="archivo">
                                    <a href="'.$resEnt['archivo'].'" download>Descargar solucion</a>
                                </div>
                            </div>
                        </div>
                        <div class="postulantesDiv">
                            <div class="postulantesCuerpo">
                                <h4 class="postulados_dudas">Resolvió</h4>
                                <ul class="postuladosLista">
    ';
    $conEntUs = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resEnt['id_us']."'");
    $conEntUs ->execute();
    while($resEntUs = $conEntUs->fetch(PDO::FETCH_ASSOC)){
        echo'
        
                                    <li class="postulanteLi">
                                        <div class="envolvedor">
                                            <div class="userdata">
                                                <!--<img src="recursos/fotoPerfil/'.$resEntUs['imagen'].'.png" alt="">-->
                                                <h5 class="nombre_postulado">'.$resEntUs['nombre'].'</h5>
                                                <h6 class="usuario_postulado">@'.$resEntUs['username'].'</h6>
                                            </div>
                                        </div>
                                    </li>
        ';
    }
    echo'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    ';
}else if($resCon['id_us'] != $_SESSION['id_us']){   /*Si la publiacion no es mia*/

    $conConcAsig = $conn->prepare("SELECT id FROM asignado WHERE id_consulta = '".$_GET['id']."'");
    $conConcAsig ->execute();
    if($resConcAsig = $conConcAsig->fetch(PDO::FETCH_ASSOC)){
        echo'
            </div>
            <div class="entrega">
                <button class="btnEntrega" onclick="Alternar()">entregar</button>
                <div class="entregarCanvas" style="display:none" id="entregarCanvas">
                    <div class="entregarDiv">
                        <form class="formulario" action="../ImplementarPHP/entregar.php" method="POST" id="formEntregar" enctype="multipart/form-data"> 
                            <h2 class="entregar_trabajo">Entregar trabajo</h2>
                            <div class="contenedor">
                                <div class="envolvedor">
                                    <div class="input-contenedor">
                                        <label for="descripcion_entrega"></label>
                                        <input type="text" id="descripcion_entrega" name="descripcion" placeholder="Explica un poco la resolucion del problema" required>
                                    </div> 
                                    <div class="trash">
                                        <div class="input-contenedor-2">
                                            <label class="archivo-entrega" for="archivo">Subir archivo</label>
                                            <input type="file" id="archivo" name="fileToUpload" id="fileToUpload" required style="display:none">
                                        </div>
                                        <input name="id_cons" type="hidden" value="'.$_GET['id'].'"></input> <!--Agregar las variables para pasar el parametro-->
                                        <div class="boton_canvas_definitivo">
                                            <input class="boton_canvas" name="entregar" type="submit" value="entregar" id="entregar" form="formEntregar"></input>
                                            <input class="boton_canvas" type="submit" value="cancelar" onclick="Alternar()"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>       
                    </div>
                </div>
            </div>
        ';
    }else{
        $conConc = $conn->prepare("SELECT id_concurso FROM concurso WHERE (id_us = '".$_SESSION['id_us']."' AND id_consulta = '".$_GET['id']."')");
        $conConc ->execute();
        if($resConc = $conConc->fetch(PDO::FETCH_ASSOC)){
        echo'
                        <div class="cancelar_postulante">
                            <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="cancelar'.$i.'">     
                                <input type="hidden" name="id_cons" value="'.$_GET['id'].'">
                                <input type="hidden" name="dir" value="Location:../PaginasBalsamiq/dentro-publicacion.php?id='.$_GET['id'].'">          
                                <input value="Cancelar postulacion" type="submit" class="postularBtn2" name="cancelar" form="cancelar'.$i.'" style="cursor:pointer">
                            </form>
                        </div>
                    </div>
                </div>       
            ';
        }else{
            echo'
                        <div class="cancelar_postulante">
                            <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="postular'.$i.'">
                                <input type="hidden" name="id_cons" value="'.$_GET['id'].'">
                                <input type="hidden" name="dir" value="Location:../PaginasBalsamiq/dentro-publicacion.php?id='.$_GET['id'].'">   
                                <input value="Postularme" type="submit" class="postularBtn2" name="postular" form="postular'.$i.'" style="cursor:pointer">
                            </form>
                        </div>
                    </div>
                </div>       
            ';
        }
    

    }
}else{ /*Si la publicacion SI es mia*/
    $conAsig = $conn->prepare("SELECT * FROM asignado WHERE id_consulta = '".$_GET['id']."'");
    $conAsig ->execute();
    if($resAsig = $conAsig->fetch(PDO::FETCH_ASSOC)){
        $conEntUs = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resAsig['id_us']."'");
        $conEntUs ->execute();
        $resEntUs = $conEntUs->fetch(PDO::FETCH_ASSOC);

        echo'
            </div>
            </div>
            <div class="postulantesDiv">
                <div class="postulantesCuerpo">
                    <h4 class="postulados_dudas">Postulado</h4>
                    <ul class="postuladosLista">
                        <li class="postulanteLi">
                            <div class="envolvedor">
                                <div class="userdata">
                                    <!--<img src="recursos/fotoPerfil/'.$resEntUs['imagen'].'.png" alt="">-->
                                    <h5 class="nombre_postulado">'.$resEntUs['nombre'].'</h5>
                                    <h6 class="usuario_postulado">@'.$resEntUs['username'].'</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        ';

    }else{
    
    echo'
        </div>
        </div>
        <div class="postulantesDiv">
            <div class="postulantesCuerpo">
                <h4 class="postulados_dudas">Postulados</h4>
                <ul class="postuladosLista">
    ';
    $conConc = $conn->prepare("SELECT * FROM concurso WHERE id_consulta = '".$_GET['id']."'");
    $conConc ->execute();
    while($resConc = $conConc->fetch(PDO::FETCH_ASSOC)){
        $conEntUs = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resConc['id_us']."'");
        $conEntUs ->execute();
        $resEntUs = $conEntUs->fetch(PDO::FETCH_ASSOC);
        echo'
                    <li class="postulanteLi">
                        <form class="envolvedor" action="../ImplementarPHP/aceptarPostulante.php" method="POST" id="aceptar'.$i.'">
                            <div class="userdata">
                                <!--<img src="recursos/fotoPerfil/'.$resEntUs['imagen'].'.png" alt="">-->
                                <h5 class="nombre_postulado">'.$resEntUs['nombre'].'</h5>
                                <h6 class="usuario_postulado">@'.$resEntUs['username'].'</h6>
                            </div>
                            <input type="hidden" name="id_cons" value="'.$_GET['id'].'">
                            <input type="hidden" name="id_us" value="'.$resEntUs['id_us'].'">
                            <input value="Aceptar" type="submit" class="postularBtn aceptar" name="aceptar" form="aceptar'.$i.'">
                        </form>
                    </li>
        ';
        $i++;
    }
    echo'
                </ul>
            </div>
        </div>
    ';
    }
}
}else{
    header("Location:../PaginasBalsamiq/inicio.php");
}






                           /*  <div class="cancelar_postulante">
                                <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="postular'.$i.'">               
                                    <input value="Cancelar postulacion" type="submit" class="postularBtn2" name="cancelar" form="postular'.$i.'">
                                </form>
                                <form action="../ImplementarPHP/postular-cancelar.php" method="POST" id="postular'.$i.'">
                                    <input value="Postularme" type="submit" class="postularBtn2" name="postular" form="postular'.$i.'">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            '; */
        ?>
    </div>
</body>
</html>