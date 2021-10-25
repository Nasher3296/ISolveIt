<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="NO_TOCAR.css"> 
    <!-- recordar poner el buscador en style2.css -->
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
            echo'
                <section class="seccion-perfil-usuario">
                    <div class="perfil-usuario-header">
                        <div class="perfil-usuario-portada">
                            <div class="perfil-usuario-avatar">
                                <img class="fotoPerfil" src="recursos/fotoPerfil/'.$_SESSION['imagen'].'.png" alt="'.$_SESSION['username'].'">
                                <button type="button" class="boton-avatar">
                                    <i class="far fa-image"></i>
                                </button>
                            </div>
                            <!-- <button type="button" class="boton-portada">
                                <i class="far fa-image"></i> Cambiar fondo
                            </button> -->
                        </div>
                    </div>
                    <div class="perfil-usuario-body">
                        <div class="perfil-usuario-bio">
                            <h3 class="titulo">Juan Perez</h3>
                            <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="perfil-usuario-footer">
                            <ul class="lista-datos">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam voluptatibus vel rem, cumque facere itaque. Nisi excepturi magni placeat quasi at ipsum, illum, est quas molestias, iste labore! Natus, iusto.
                                <!-- <li><i class="icono fas fa-map-signs"></i> Direccion de usuario:</li>
                                <li><i class="icono fas fa-phone-alt"></i> Telefono:</li>
                                <li><i class="icono fas fa-briefcase"></i> Trabaja en.</li>
                                <li><i class="icono fas fa-building"></i> Cargo</li> -->
                            </ul>
                            <ul class="lista-datos">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis cumque eveniet sunt atque, ipsa nulla laudantium, quasi saepe inventore, harum id delectus perspiciatis iusto alias quisquam voluptas officia sint exercitationem?
                                <!-- <li><i class="icono fas fa-map-marker-alt"></i> Ubicacion.</li>
                                <li><i class="icono fas fa-calendar-alt"></i> Fecha nacimiento.</li>
                                <li><i class="icono fas fa-user-check"></i> Registro.</li>
                                <li><i class="icono fas fa-share-alt"></i> Redes sociales.</li> -->
                            </ul>
                        </div>
                    </div>
                </section>
            ';
        ?>
     </div>
        

</body>
</html>