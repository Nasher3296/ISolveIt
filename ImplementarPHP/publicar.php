<?php
    include('config.php');
    session_start();
    if(isset($_POST["postear"])){
        $tit=$_POST["titulo"];
        $desc=$_POST["desc"];
        $rec=$_POST["rec"];
        $lim=$_POST["lim"];
        $tag=$_POST["tag"];
    
        $publicar = $conn -> prepare("INSERT INTO consulta(id_consulta, id_us, titulo, descripcion, recompensa, fecha_limite) VALUES (NULL, :id_us, :titulo , :descripcion, :recompensa,  :fecha_limite)");
        $publicar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
        $publicar -> bindParam("titulo",$tit,PDO::PARAM_STR);
        $publicar -> bindParam("descripcion",$desc,PDO::PARAM_STR);
        $publicar -> bindParam("recompensa",$rec,PDO::PARAM_STR);
        $publicar -> bindParam("fecha_limite",$lim,PDO::PARAM_STR);
        $publicar ->execute();

        
        $conPub = $conn->prepare("SELECT MAX(id_consulta) FROM consulta");
        $conPub ->execute();
        $resPub = $conPub->fetch(PDO::FETCH_ASSOC);


        $tags = explode(",", $tag);
        
        foreach($tags as $t){
            
                $consulta = $conn->prepare("SELECT id FROM tag WHERE tag = '".$t."'");
                $consulta ->execute();
                if($resId = $consulta->fetch(PDO::FETCH_ASSOC)){
                    /*Asignar el id del tag a la publicacion en la tabla tag_cons*/
                    $publicar = $conn -> prepare("INSERT INTO tag_cons(id_cons, tag_cons) VALUES (:id_cons, :tag_cons)");
                    $publicar -> bindParam("id_cons",$resPub['MAX(id_consulta)'],PDO::PARAM_STR); 
                    $publicar -> bindParam("tag_cons",$resId['id'],PDO::PARAM_STR);
                    $publicar ->execute();
                }
                else{
                    $publicar = $conn -> prepare("INSERT INTO tag(id, tag) VALUES (NULL, :tag)");
                    $publicar -> bindParam("tag",$t,PDO::PARAM_STR);
                    $publicar ->execute();

                    $conTag = $conn->prepare("SELECT MAX(id) FROM tag");
                    $conTag ->execute();
                    $resTag = $conTag->fetch(PDO::FETCH_ASSOC);

                    $publicar = $conn -> prepare("INSERT INTO tag_cons(id_cons, tag_cons) VALUES (:id_cons, :tag_cons)");
                    $publicar -> bindParam("id_cons",$resPub['MAX(id_consulta)'],PDO::PARAM_STR); 
                    $publicar -> bindParam("tag_cons",$resTag['MAX(id)'],PDO::PARAM_STR);
                    $publicar ->execute();
                }
        }
        header("Location:../PaginasBalsamiq/inicio.php");
    }
?>