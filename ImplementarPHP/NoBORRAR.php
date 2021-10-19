<?php

    session_start();

    $consulta = $conn->prepare("SELECT * FROM tag_usuario WHERE id_us = '".$_SESSION['id_us']."'");
    $consulta ->execute();
    while($resultadoTagUsr = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo $resultadoTagUsr['tag_us'];
    }

    
    $consulta = $conn->prepare("SELECT descripcion FROM tag WHERE id = '".$resultadoTagUsr['tag_us']."'");  
    $consulta ->execute();
    
    $row->fetch_array($consulta);
    /* $resultadoUsr = $consulta->fetch(PDO::FETCH_ASSOC); */


?>