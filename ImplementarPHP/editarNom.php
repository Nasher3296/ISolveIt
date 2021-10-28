<?php
    include('config.php');
    session_start();
    if(isset($_POST["cancelar"])){
        header("Location:../PaginasBalsamiq/perfil.php");
    }
    if(isset($_POST["aceptar"])){
        $nom = $_POST['nom'];
        $consulta = $conn->prepare("UPDATE usuario SET nombre = '".$nom."' WHERE id_us = '".$_SESSION['id_us']."'");
        $consulta ->execute();
        $resId = $consulta->fetch(PDO::FETCH_ASSOC);
        
        header("Location:../PaginasBalsamiq/perfil.php");
    }
    
?>