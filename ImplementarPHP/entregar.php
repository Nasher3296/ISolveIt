<?php

include('config.php');
session_start();
if(isset($_POST['entregar'])){
    $consulta = $_POST['id_cons'];
    $target_dir = "../archivos/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $i = 0;
    $exist = 1;
    while($exist == 1){
        echo'exist '.$i;
        if (!(file_exists($target_file))){
            $exist = 0;
        }
        else{
            $target_file = $target_dir.$i.basename($_FILES["fileToUpload"]["name"]);
            $i++;
            $exist = 1;
        }
        
    } 
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $entregar = $conn -> prepare("INSERT INTO entregado(id,id_cons,id_us,descripcion,archivo) VALUES (NULL,:id_cons,:id_us,:descripcion,:archivo)");
    $entregar -> bindParam("id_cons",$consulta,PDO::PARAM_STR);
    $entregar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
    $entregar -> bindParam("descripcion",$_POST['descripcion'],PDO::PARAM_STR);
    $entregar -> bindParam("archivo",$target_file,PDO::PARAM_STR);
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

    $tokensAct = $resTokens['recompensa'] +  $resTokens2['tokens'];
    $actualizar = $conn->prepare("UPDATE usuario SET tokens = '".$tokensAct."' WHERE id_us = '".$_SESSION['id_us']."'");
    $actualizar ->execute();
    $resActualizar = $actualizar->fetch(PDO::FETCH_ASSOC);


    header("Location:../PaginasBalsamiq/dentro-publicacion.php?id=".$consulta);
}
?>