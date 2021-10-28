<?php

include('config.php');
session_start();
if(isset($_POST['entregar'])){
    $consulta = $_POST['id_cons'];
    $entregar = $conn -> prepare("INSERT INTO entregado(id,id_cons,id_us,descripcion,archivo) VALUES (NULL,:id_cons,:id_us,:descripcion,:archivo)");
    $entregar -> bindParam("id_cons",$consulta,PDO::PARAM_STR);
    $entregar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
    $entregar -> bindParam("descripcion",$_POST['descripcion'],PDO::PARAM_STR);
    $entregar -> bindParam("archivo",$_POST['archivo'],PDO::PARAM_STR);
    $entregar ->execute();
    
    $borrar = $conn -> prepare("DELETE FROM asignado WHERE id_consulta = :id_consulta");
    $borrar -> bindParam("id_consulta",$consulta,PDO::PARAM_STR);
    $borrar ->execute();

    
    $conTokens = $conn->prepare("SELECT recompensa FROM consulta WHERE id_consulta = '".$consulta."'");
    $conTokens ->execute();
    $resTokens = $conTokens->fetch(PDO::FETCH_ASSOC);
    $conTokens2 = $conn->prepare("SELECT tokens FROM usuario WHERE id_us = '".$_SESSION['id_us']."'");
    $conTokens2 ->execute();
    $resTokens2 = $conTokens2->fetch(PDO::FETCH_ASSOC);

    $tokensAct = $resTokens['recompensa'] +  $resTokens2['recompensa'];
    $actualizar = $conn->prepare("UPDATE usuario SET tokens = '".$tokensAct."' WHERE id_us = '".$_SESSION['id_us']."'");
    $actualizar ->execute();
    $resActualizar = $actualizar->fetch(PDO::FETCH_ASSOC);


    header("Location:../PaginasBalsamiq/inicio.php");
}
?>