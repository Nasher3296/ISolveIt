<?php

include(config.php);
session_start();
if(isset($_POST['login'])){
    $consulta = $_POST['id_cons'];
    $user = $_POST['id_us'];
    $asignar = $conn -> prepare("INSERT INTO asignado(id,id_consulta,id_us,estado) VALUES (NULL,id_consulta=:id_consulta,id_us:id_us,estado=:estado)");
    $asignar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $asignar -> bindParam("id_us",$user,PDO::PARAM_STR);
    $asignar -> bindParam("estado",0,PDO::PARAM_STR);
    $asignar ->execute();
    
    $borrar = $conn -> prepare("DELETE FROM concurso WHERE id_consulta = :id_consulta");
    $borrar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $borrar ->execute();

?>