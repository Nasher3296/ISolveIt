<?php
    include('config.php'); 
    session_start(); //inicio sesion 

    if(isset($_POST['cancelar'])){
        echo'<script type="text/javascript">
                window.location.href="../PaginasBalsamiq/inicio.php";
                </script>';
    }
?>