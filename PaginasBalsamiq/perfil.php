<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="perfil.css">
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
            <h4 class="h4"><?php echo $_SESSION['nombre']?></h4>
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
        <div class="cont_perfil">
            <div class="perfil">
                <div class="cuerpo_perfil">
                    <div class="img">
                        <img src="recursos/imagenEjemplo.png" alt="foto de perfil">
                    </div>
                    <div class="datos_perfil">
                        <div class="subcont_perfil">
                            <div class="UsuarioNombre">
                                <div class="nombre"><?php echo $_SESSION['nombre']?></div>
                                <div class="usuario">@<?php echo $_SESSION['username']?></div>
                            </div>
                            <div class="estrellas">
                                aaaaaaaaaaaaaaaa
                            </div>
                        </div>
                        <div class="tags">
                            <ul class=Taglist>
                                <?php
                                    
                                    $consulta = $conn->prepare("SELECT tag_us FROM tag_usuario WHERE id_us = '".$_SESSION['id_us']."'");
                                    $consulta ->execute();
                                    while($resultadoTagUs = $consulta->fetch(PDO::FETCH_ASSOC)){
                                        $consulta2 = $conn->prepare("SELECT tag FROM tag WHERE id = '".$resultadoTagUs['tag_us']."'");
                                        $consulta2 ->execute();
                                        while($resultadoTag = $consulta2->fetch(PDO::FETCH_ASSOC)){
                                            echo'<li>'.$resultadoTag['tag'].'</li>';
                                        }
                                    }


                                    if($_SESSION['tag']){
                                        $tags = explode(",", $_SESSION['tag']);
                                        foreach($tags as $t){
                                            echo'<li>'.$t.'</li>';
                                        }
                                    }
                                ?>    
                                <li>EDITAR</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="descripcion">
                    <?php echo '<p>'.$_SESSION['descripcion'].'</p>'?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>