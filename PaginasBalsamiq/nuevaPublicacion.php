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
                <li class="botones_sidebar"><a class="a" href="postulaciones.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Postulaciones.svg" alt=""> Postulaciones</a></li>
                <li class="botones_sidebar"><a class="a" href="recibidos.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Publicaciones_que_te_entregaron.svg" alt=""> Recibidos</a></li>
                <li class="botones_sidebar"><a class="a" href="entregados.php"><img class="iconos_sidebar" src="../PagInicio/Recursos/iconos/Publicaciones_Entregadas.svg" alt=""> Entregados</a></li>
                <li class="botones_sidebar"><a class="a" href="perfil.php"><img class="iconos_sidebar" id="icono_miperfil" src="../PagInicio/Recursos/iconos/Mi Perfil.svg" alt=""> Mi perfil</a></li>
            </ul>
        </div>
        <a href="nuevaPublicacion.php"><h2 class="h2">Nueva duda</h2></a>
    </aside>
    <div class="main">
        <div class="main_form">
                <div class="form">
                    <form action="../ImplementarPHP/publicar.php" method="POST" id="formPost" enctype="multipart/form-data">
                        <div class="contenedor">
                            <h2 id="h2">Crea tu consulta</h2>
                            <!-- <div class="cont"> -->
                                <center>
                            <div class="form2">
                                <input type="text" id="titulo" name="titulo" class="form__input" autocomplete="off" placeholder=" " required>
                                <label for="titulo" class="form__label">T??tulo</label>
                            </div>
                                </center>
                            <!-- </div> -->
                            
                            <!-- <div class="cont" id="cont_grande"> -->
                                <center>
                                <div class="form2">
                                    <input type="text" id="desc" name="desc" class="form__input" autocomplete="off" placeholder=" " maxlength="280" required>
                                    <label for="desc" class="form__label">Descripci??n</label>
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
                                <div class="form2">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form__input" autocomplete="off" placeholder=" " required>
                                    <label for="fileToUpload" class="form__label">archivo</label>
                                </div>
                                </center>
                            
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