<?php
    include('config.php');
    $target_dir = "../archivos/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if(isset($_POST["submit"])) {
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $consulta = 1;
                $user = 6;
                $descripcion = "JUANJUAN";
                $entregar = $conn -> prepare("INSERT INTO entregado(id,id_cons,id_us,descripcion,archivo) VALUES (NULL,:id_cons,:id_us,:descripcion,:archivo)");
                $entregar -> bindParam("id_cons",$consulta,PDO::PARAM_STR);
                $entregar -> bindParam("id_us",$user,PDO::PARAM_STR);
                $entregar -> bindParam("descripcion",$descripcion,PDO::PARAM_STR);
                $entregar -> bindParam("archivo",$target_file,PDO::PARAM_STR);
                $entregar ->execute();
                    // echo "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " fue subido correctamente.";
            }else{
                    // echo "Lo lamentamos. Hubo un error en la subida del archivo.";
            }  
            header("Location:../PaginasBalsamiq/dentro-publicacion.php?id=".$id_cons);  
    }
?>