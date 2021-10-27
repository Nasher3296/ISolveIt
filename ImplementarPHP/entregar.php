<?php

include('config.php');
session_start();
if(isset($_POST['entregar'])){
    $consulta = $_POST['id_cons'];
    $entregar = $conn -> prepare("INSERT INTO entregado(id,id_cons,id_us,descripcion,archivo) VALUES (NULL,:id_cons,:id_us,NULL)");
    $entregar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $entregar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
    $entregar ->execute();
    
    $borrar = $conn -> prepare("DELETE FROM asignado WHERE id_consulta = :id_consulta");
    $borrar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $borrar ->execute();
}
?>