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
        <input class="buscador" type="text" placeholder="Buscar...">
    </header>
    <aside class="sidebar">
        <div class="sidebar_usuario">
            <h4 class="h4">Nombre</h4>
            <h5 class="h5">@nombre</h5>
        </div>
        <div class="sidebar_menu">
            <ul>
                <li class="botones_sidebar"><a class="a" href="inicio2.html"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="botones_sidebar"><a class="a" href="misdudas.html"><i class="fas fa-question"></i> Dudas</a></li>

                <li class="botones_sidebar"><a class="a" href=""><i class="fas fa-hands-helping"></i> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="fas fa-users"></i> Seguidos</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="far fa-envelope"></i> Mensajes</a></li>
                <li class="botones_sidebar"><a class="a" href=""><i class="far fa-user-circle"></i> Mi perfil</a></li>
            </ul>
        </div>
        <a href=""><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div>
        <!----- Esto es para los datos del usuario!!! ----->
    </div>
    <!----- Esto es para publicaciones ----->
    <div class="main"> 
        
        <?php
            $consulta = $conn->prepare("SELECT * FROM consulta WHERE id_us = '".$_SESSION['id_us']."'");
            $consulta ->execute();
            while ($resultadoUser = $consulta->fetch(PDO::FETCH_ASSOC)) {    
                echo'
                <div class="publicacion_preview">
                <div class="data">
                    <div class="foto">
                        A
                        <!--<img class="fotoPerfil" src="recursos/fotoPerfil/'.$_SESSION['imagen'].'.png" alt="'.$_SESSION['username'].'">-->
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
                    <p>'.$resultadoUser['descripcion'].'</p>
                </div>
                <div class="tags">
                    <!--Que aparezcan iconos de archivos en caso de haberlos, similar a gmail-->
                    <h4>Etiquetas: </h4>
                    <ul class="tags_list">
                ';
                if($resultadoUser['tag']){
                    $tags = explode(",", $resultadoUser['tag']);
                    foreach($tags as $t){
                        echo'<li class="tag">'.$t.'</li>';
                    }
                }
                            
                echo'
                            </ul>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</body>
</html>