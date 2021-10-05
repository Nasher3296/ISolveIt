<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="plantilla.css">
</head>
<body class="grid_container">

    <?php
        include('../ImplementarPHP/config.php');
    ?>

    <header class="header">
            <h1 class="ISolveIt">I solve it</h1>
            <input class="buscador" type="text" placeholder="buscar...">
    </header>
    <aside class="sidebar">
        <div class="sidebar_usuario">
            <div class="cont_sidebar_usuario">
                <h4>Nombre</h4>
                <h5>@nombre</h5>
                <div class="valoracion">
                    <!--Aca van las estrellas. Dejo esto para hacer un AFTER en css-->
                </div>
            </div>
        </div>
        <div class="sidebar_menu">
            <div class="cont_sidebar_menu">
                <ul type="none">
                    <li class="botones_sidebar"><a href="">Inicio</a></li>
                    <li class="botones_sidebar"><a href="">Dudas</a></li>
                    <li class="botones_sidebar"><a href="">Postulaciones</a></li>
                    <li class="botones_sidebar"><a href="">Seguidos</a></li>
                    <li class="botones_sidebar"><a href="">Mensajes</a></li>
                    <li class="botones_sidebar"><a href="">Mi perfil</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar_nuevaDuda">
            <h2 id="cont_nuevaDuda">Nueva duda</h2>
        </div>
    </aside>
    <div class="main">
        <button type="submit" value="consultar" id="consultar" name="consultar" form="formPostPreview">Consultar</button>
        <div class="publicaciones">
        <?php
            for($i = 1 ; $i < 3 ; $i++){
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
    <footer class="footer">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quasi earum praesentium pariatur obcaecati. Vero quidem odit ipsa id incidunt
    </footer>
</body>
</html>