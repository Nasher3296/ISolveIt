<?php
    include('config.php');
    session_start();
    if(isset($_POST["postear"])){
        $tit=$_POST["title"];
        $desc=$_POST["desc"];
        $rec=$_POST["rec"];
        $lim=$_POST["lim"];
        $tag=$_POST["tag"];
    }
    $consultaid = $conn -> prepare("SELECT * FROM usuario WHERE username= :username"); 
    $consultaid -> bindParam("username",$_SESSION['username'],PDO::PARAM_STR);
    $consultaid -> execute();
    $resultadoid = $consultaid->fetch(PDO::FETCH_ASSOC);

    $publicar = $conn -> prepare("INSERT INTO consulta(id_us, titulo, descripcion, recompensa, fecha_limite, tags) VALUES (:id_us, :titulo , :descripcion, :recompensa, :limite, :tag)");
    $publicar -> bindParam("id_us",$resultadoid['id_us'],PDO::PARAM_STR);
    $publicar -> bindParam("titulo",$tit,PDO::PARAM_STR);
    $publicar -> bindParam("descripcion",$desc,PDO::PARAM_STR);
    $publicar -> bindParam("recompensa",$rec,PDO::PARAM_STR);
    $publicar -> bindParam("limite",$lim,PDO::PARAM_STR);
    $publicar -> bindParam("tag",$tag,PDO::PARAM_STR);
    $publicar ->execute();
    header("Location:../PaginasBalsamiq/inicio.php");
?>