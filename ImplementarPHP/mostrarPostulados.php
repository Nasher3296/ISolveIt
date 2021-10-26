<?php

include(config.php);
session_start();

$consulta = ??;
$id_us = ??;
$i = 0;
$consultaConcurso = $conn->prepare("SELECT id_us FROM concurso WHERE id_consulta = '".$consulta."'");
$consultaConcurso ->execute();
while($resultadoConcurso = $consultaConcurso->fetch(PDO::FETCH_ASSOC)){
    echo $resultadoConcurso['id_us'].' se postulo <br>
    
    <form action="../ImplementarPHP/aceptarPostulante.php" method="POST" id="aceptar'.$i.'">       
        <input value="Aceptar" type="submit" class="postularBtn" name="aceptar" form="aceptar'.$i.'">
        <input type="hidden" name="id_cons" value="'.$consulta.'">
        <input type="hidden" name="id_us" value="'.$id_us.'">
    </form>

    ';
?>