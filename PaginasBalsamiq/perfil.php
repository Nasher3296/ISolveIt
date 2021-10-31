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
<script>
        function Alternar(){
            let tagList = document.getElementById("tagList");
            let editarTag = document.getElementById("editarTag");
            if(editarTag.style.display == "flex"){
                    tagList.style.display = "flex";          
                    editarTag.style.display = "none";       
                }
                else{
                    tagList.style.display = "none";          
                    editarTag.style.display = "flex";          
                }
            }
        function AlternarNombre(){
            let nombreCont = document.getElementById("nombreCont");
            let editarNombre = document.getElementById("editarNom");
            if(editarNom.style.display == "flex"){
                nombreCont.style.display = "flex";          
                    editarNom.style.display = "none";       
                }
                else{
                    nombreCont.style.display = "none";          
                    editarNom.style.display = "flex";          
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
                <li class="botones_sidebar"><a class="a" href="perfil.php" style="background-color: #5a5a9c"><i class="far fa-user-circle"></i> Mi perfil</a></li>
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
                        <div class="perfil-usuario-bio" style="display:block">
                            <div class="nombreDiv">
                                <div class="nombreCont" style="display:flex" id="nombreCont">
                                    <h3 class="titulo">'.$_SESSION['nombre'].'</h3>
                                    <button class="editarNombre" onclick="AlternarNombre()"><i class="far fa-edit"></i></button>
                                </div>
                                <form action="../ImplementarPHP/editarNom.php" method="POST" id="editarNom" class="editarNom" style="display:none">
                                    <div class="nomBtnDiv">
                                        <input type="text" name="nom" value="'.$_SESSION['nombre'].'" class="nomTex">
                                        <div class="btns" style="display:flex">
                                            <input value="✔" type="submit" class="tagBtn aceptar" name="aceptar" form="editarNom">
                                            <input value="✗" type="submit" class="tagBtn cancelar" name="cancelar" form="editarNom">
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            
                                <ul class="tagList" id="tagList">
                                ';
                                $tagStr = "";
                                $consTagUs = $conn->prepare("SELECT tag_us FROM tag_usuario WHERE id_us = '".$_SESSION['id_us']."'");
                                $consTagUs ->execute();
                                while($resTagUs = $consTagUs->fetch(PDO::FETCH_ASSOC)){
                                    $consTag = $conn->prepare("SELECT tag FROM tag WHERE id = '".$resTagUs['tag_us']."'");
                                    $consTag ->execute();
                                    while($resultadoTag = $consTag->fetch(PDO::FETCH_ASSOC)){
                                        echo'<li class="tag tagList">'.$resultadoTag['tag'].'</li>';
                                        $tagStr = $tagStr.$resultadoTag['tag'].',';
                                    }
                                }
                                echo'
                                </ul>
                                <form action="../ImplementarPHP/editarTag.php" method="POST" id="editarTag" class="editarTag" style="display:none">
                                    <input type="text" name="tag" value="'.$tagStr.'" class="tagText">
                                    <div class="tagBtnDiv">
                                        <input value="✔" type="submit" class="tagBtn aceptar" name="aceptar" form="editarTag">
                                        <input value="✗" type="submit" class="tagBtn cancelar" name="cancelar" form="editarTag">
                                    </div>
                                </form>
                                <button class="alternarBtn" onclick="Alternar()"><i class="far fa-edit"></i></i></button>
                        </div>
                        <div class="perfil-usuario-footer">
                            <ul class="lista-datos">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam voluptatibus vel rem, cumque facere itaque. Nisi excepturi magni pla ceat quasi at ipsum, illum, est quas molestias.
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