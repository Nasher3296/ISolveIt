<?php

include('config.php');
session_start();
if(isset($_POST['aceptar'])){
    $consulta = $_POST['id_cons'];
    $user = $_POST['id_us'];
    $asignar = $conn -> prepare("INSERT INTO asignado(id,id_consulta,id_us) VALUES (NULL,:id_consulta,:id_us)");
    $asignar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $asignar -> bindParam("id_us",$user,PDO::PARAM_STR);
    $asignar ->execute();
    
    $borrar = $conn -> prepare("DELETE FROM concurso WHERE id_consulta = :id_consulta");
    $borrar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $borrar ->execute();

    header("Location:../PaginasBalsamiq/inicio.php");
}
?>