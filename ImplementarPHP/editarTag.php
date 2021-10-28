<?php
    include('config.php');
    session_start();
    if(isset($_POST["cancelar"])){
        header("Location:../PaginasBalsamiq/perfil.php");
    }
    if(isset($_POST["aceptar"])){
        $tag = $_POST['tag'];
        $tags = explode(",", $tag);
        $borrar = $conn->prepare("DELETE FROM tag_usuario WHERE id_us = '".$_SESSION['id_us']."'");
        $borrar -> execute();
        foreach($tags as $t){
            $consulta = $conn->prepare("SELECT id FROM tag WHERE tag = '".$t."'");
            $consulta ->execute();
            if($resId = $consulta->fetch(PDO::FETCH_ASSOC)){
                /*Asignar el id del tag a la publicacion en la tabla tag_cons*/
                $publicar = $conn -> prepare("INSERT INTO tag_usuario(id_us, tag_us) VALUES (:id_us, :tag_us)");
                $publicar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR); 
                $publicar -> bindParam("tag_us",$resId['id'],PDO::PARAM_STR);
                $publicar ->execute();
            }
            else{
                $publicar = $conn -> prepare("INSERT INTO tag(id, tag) VALUES (NULL, :tag)");
                $publicar -> bindParam("tag",$t,PDO::PARAM_STR);
                $publicar ->execute();

                $conTag = $conn->prepare("SELECT MAX(id) FROM tag");
                $conTag ->execute();
                $resTag = $conTag->fetch(PDO::FETCH_ASSOC);

                $publicar = $conn -> prepare("INSERT INTO tag_usuario(id_us, tag_us) VALUES (:id_us, :tag_us)");
                $publicar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
                $publicar -> bindParam("tag_us",$resTag['MAX(id)'],PDO::PARAM_STR);
                $publicar ->execute();
            }
        }

        header("Location:../PaginasBalsamiq/perfil.php");
    }
    
?>