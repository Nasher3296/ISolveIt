<?php

    if($resultadoCon['tag']){
        $tags = explode(",", $resultadoCon['tag']);
        foreach($tags as $t){
            
        }
    }



    $consulta = $conn->prepare("SELECT * FROM consulta WHERE id_consulta = 6"); 
    $consulta ->execute();
    $resultadoCon = $consulta->fetch(PDO::FETCH_ASSOC);

    $consulta = $conn->prepare("SELECT * FROM usuario WHERE id_us= :id_us"); 
    $consulta -> bindParam("id_us",$resultadoCon['id_us'],PDO::PARAM_STR);
    $consulta ->execute();

    $resultadoUser = $consulta->fetch(PDO::FETCH_ASSOC);

?>