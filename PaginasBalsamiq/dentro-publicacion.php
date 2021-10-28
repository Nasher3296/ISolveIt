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
                    $i = 0;
                    $conCon = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = '".$_GET['id']."'");
                    $conCon ->execute();
                    $resCon = $conCon->fetch(PDO::FETCH_ASSOC);

                    $conus = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resCon['id_us']."'");
                    $conus ->execute();
                    $resus = $conus->fetch(PDO::FETCH_ASSOC);

                    
                    echo' <div class="generalCont">';
                    echo'
                    <div class="publicacion">
                        <div class="data">
                            <div class="foto">
                                <!--<img src="recursos/fotoPerfil/'.$resus['imagen'].'.png" alt="'.$resus['nombre'].'">-->
                            </div>
                            <div>
                                <h4>'.$resus['nombre'].'</h4>
                                <h5>@'.$resus['username'].'</h5>
                            </div>
                            <div>
                            <h4>Recompensa: $'.$resCon['recompensa'].'</h4>
                            </div>
                            <div>
                                <h4>Subida: '.$resCon['fecha_subida'].'</h4>
                                <h4>Limite: '.$resCon['fecha_limite'].'</h4>
                            </div>
                        </div>
                        <div class="cuerpo">
                            <h2>'.$resCon['titulo'].'</h2>
                            <p class="desc">'.$resCon['descripcion'].'</p>
                        </div>
                        <div class="tags">
                            <h4>Etiquetas: </h4>
                            <ul class="tags_list">
                ';
                $consulta5 = $conn->prepare("SELECT tag_cons FROM tag_cons WHERE id_cons = '".$resCon['id_consulta']."'");
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
                
                if($resus['id_us'] == $_SESSION['id_us']){
                $conConcurso = $conn->prepare("SELECT id_us FROM concurso WHERE id_consulta = '".$_GET['id']."'");
                $conConcurso ->execute();
                

                
                    echo'
                    </div>
                        <div class="postulantesDiv">
                            <div class="postulantesCuerpo">
                                <h4>Postulados</h4>
                                <ul class="postuladosLista">
                    ';
                    $i = 0;
                    while ($resConcurso = $conConcurso->fetch(PDO::FETCH_ASSOC)) {
                        $conus2 = $conn->prepare("SELECT * FROM usuario WHERE id_us = '".$resConcurso['id_us']."'");
                        $conus2 ->execute();
                        $resus2 = $conus2->fetch(PDO::FETCH_ASSOC);
                        echo'
                                    <li class="postulanteLi">
                                        <form action="../ImplementarPHP/aceptarPostulante.php" method="POST" id="aceptar'.$i.'">
                                            <!--<img src="recursos/fotoPerfil/0.png" alt="">-->
                                            <h5>'.$resus2['nombre'].'</h5>
                                            <h6>'.$resus2['username'].'</h6>
                                            <input type="hidden" name="id_cons" value="'.$_GET['id'].'">
                                            <input type="hidden" name="id_us" value="'.$resus2['id_us'].'">
                                            <input value="Aceptar" type="submit" class="postularBtn aceptar" name="aceptar" form="aceptar'.$i.'">
                                        </form>
                                    </li>
                        ';
                    }
                    echo'
                                </ul>
                            </div>
                        </div>
                    ';
                }else{
                    
                    $conAsig = $conn->prepare("SELECT id_us FROM asignado WHERE id_consulta = '".$_GET['id']."'");
                    $conAsig ->execute();
                    if($resAsig = $conAsig->fetch(PDO::FETCH_ASSOC)){
                        if($_SESSION['id_us'] == $resAsig['id_us']){
                            echo'
                            <button onclick="Alternar()">entregar</button>
                            <div class="entregarCanvas" style="display:none" id="entregarCanvas">
                                <div class="entregarDiv">
                                    <form class="formulario" action="../ImplementarPHP/entregar.php" method="POST" id="formEntregar">
                                        <h2>Entregar trabajo</h2>
                                        <div class="contenedor">
                                            <div class="input-contenedor">
                                                <label for="descripcion"></label>
                                                <input type="text" id="descripcion" name="descripcion" placeholder="Explica un poco la resolucion del problema" required>
                                            </div>
                                            
                                            <div class="input-contenedor">
                                                <label for="archivo"></label>
                                                <input type="file" id="archivo" name="archivo" required>
                                            </div>
                                            <input name="id_cons" type="hidden" value="'.$_GET['id'].'"></input> <!--Agregar las variables para pasar el parametro-->
                                            <input name="entregar" type="submit" value="entregar" id="entregar" form="formEntregar"></input>
                                            <input type="submit" value="cancelar" onclick="Alternar()"></input>
                                        </div>
                                    </form>
                                    
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