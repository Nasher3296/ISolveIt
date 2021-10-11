<?php
    include('config.php');
    $tit=$_GET["title"];
    $desc=$_GET["desc"];
    $rec=$_GET["rec"];
    $lim=$_GET["lim"];

    $consultaRegistro = $conn -> prepare("INSERT INTO consulta(titulo, descripcion, recompensa, fecha_limite) VALUES (:titulo , :descripcion, :recompensa, :limite)");
    $consultaRegistro -> bindParam("titulo",$tit,PDO::PARAM_STR);
    $consultaRegistro -> bindParam("descripcion",$desc,PDO::PARAM_STR);
    $consultaRegistro -> bindParam("recompensa",$rec,PDO::PARAM_STR);
    $consultaRegistro -> bindParam("limite",$lim,PDO::PARAM_STR);
?>