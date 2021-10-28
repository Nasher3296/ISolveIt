<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>I solve it</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="NO_TOCAR.css">
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
                <li class="botones_sidebar"><a class="a" href="recibidos.php"><i class="fas fa-users"></i> Recibidos</a></li>
                <li class="botones_sidebar"><a class="a" href="entregados.php"><i class="far fa-envelope"></i> Entregados</a></li>
                <li class="botones_sidebar"><a class="a" href="perfil.php"><i class="far fa-user-circle"></i> Mi perfil</a></li>
            </ul>
        </div>
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main">
        <div class="main_form">
                <div class="form">
                    <form action="../ImplementarPHP/publicar.php" method="POST" id="formPost">
                        <div class="contenedor">
                            <h2 id="h2">Crea tu consulta</h2>
                            <!-- <div class="cont"> -->
                                <center>
                            <div class="form2">
                                <input type="text" id="titulo" name="titulo" class="form__input" autocomplete="off" placeholder=" " required>
                                <label for="titulo" class="form__label">Título</label>
                            </div>
                                </center>
                            <!-- </div> -->
                            
                            <!-- <div class="cont" id="cont_grande"> -->
                                <center>
                                <div class="form2">
                                    <input type="text" id="desc" name="desc" class="form__input" autocomplete="off" placeholder=" " maxlength="280" required>
                                    <label for="desc" class="form__label">Descripción</label>
                                </div>
                                </center>
                                <!-- <textarea name="text" rows="14" cols="10" wrap="soft"> </textarea> -->
                            <!-- </div> -->
                    
                            <!-- <div class="cont"> -->
                                <center>
                               
                                <div class="form2">
                                    <input type="number" name="rec" id="rec" class="form__input" autocomplete="off" placeholder=" " required>
                                    <label for="rec" class="form__label">Recompensa</label>
                                </div>
                                </center>
                            <!-- </div> -->

                            <!-- <div class="cont"> -->
                                <center>
                                <div class="form2">
                                    <input type="datetime-local" id="lim" name="lim" class="form__input" autocomplete="off" placeholder=" " required>
                                    <label for="lim" class="form__label">Vencimiento</label>
                                </div>
                                </center>
                            <!-- </div> -->

                            <!-- <div class="cont"> -->
                                <center>
                                <div class="form2">
                                    <input type="text" name="tag" id="tag" class="form__input" autocomplete="off" placeholder=" " required maxlength="30" onkeypress="return (event.charCode != 32)">
                                    <label for="tag" class="form__label">Tags</label>
                                </div>
                                </center>
                            <!-- </div> -->
                            
                            
                                <center>
                                <input type="submit" value="Enviar" name="postear" form="formPost" class="enviar">
                                </center>
                            
                        </div>
                    </form>
                </div>
        </div>
    </div>

</body>
</html>