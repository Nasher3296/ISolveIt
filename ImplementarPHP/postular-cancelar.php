<?php
    include('config.php'); 
    session_start(); //inicio sesion 
    $id_cons = $_POST["id_cons"];
    $direccion = $_POST["dir"];
    if(isset($_POST['cancelar'])){
        echo $id_cons;
        $borrar = $conn -> prepare("DELETE FROM concurso WHERE (id_consulta = :id_consulta AND id_us = :id_us)");
        $borrar -> bindParam("id_consulta",$id_cons,PDO::PARAM_STR);
        $borrar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
        $borrar ->execute();
        header($direccion);
    }


    if(isset($_POST['postular'])){
        $postular = $conn -> prepare("INSERT INTO concurso(id_concurso, id_consulta, id_us) VALUES (NULL, :id_consulta, :id_us)");
        $postular -> bindParam("id_consulta",$id_cons,PDO::PARAM_STR);
        $postular -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
        $postular ->execute();
        echo $id_cons;
        header($direccion);
    }
?>