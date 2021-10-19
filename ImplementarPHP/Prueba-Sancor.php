<?php
    // Borrar despues
    session_start();

    $consulta = $conn->prepare("SELECT * FROM consulta WHERE id_us = '".$_SESSION['id_us']."'")
    $consulta ->execute();
    while ($resUsr = $consulta->fetch(PDO::FETCH_ASSOC)) {
        
    }
    
    $consulta = $conn->prepare("SELECT descripcion FROM tag WHERE id = '".$resultadoTagUsr['tag_us']."'");  
    $consulta ->execute();
    
    $row->fetch_array($consulta);
    /* $resultadoUsr = $consulta->fetch(PDO::FETCH_ASSOC); */


?>