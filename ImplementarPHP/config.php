<?php
    /* $user = 'carlos';
    $pass = 'asd123';
    $database = 'calculadoraPro'; */
    /* Cambiar losd atos por los de sancor */
    $host = 'localhost';

    try{
        $conn = new PDO("mysql:host=".$host.";dbname=".$database, $user, $pass);
    }
    catch (PDOException $e){
        exit("Error: " . $e->getMessage());
    }
?>