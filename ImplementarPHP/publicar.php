<?php
    include('config.php');
    session_start();
    if(isset($_POST["postear"])){



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



        $tit=$_POST["titulo"];
        $desc=$_POST["desc"];
        $rec=$_POST["rec"];
        $lim=$_POST["lim"];
        $tag=$_POST["tag"];
        
        $conUsr = $conn->prepare("SELECT tokens FROM usuario WHERE id_us = '".$_SESSION['id_us']."'");
        $conUsr ->execute();
        $resUsr = $conUsr->fetch(PDO::FETCH_ASSOC);
        if($resUsr['tokens'] > $rec){
            $tokensAct = $resUsr['tokens'] - $rec;
            $actualizar = $conn->prepare("UPDATE usuario SET tokens = '".$tokensAct."' WHERE id_us = '".$_SESSION['id_us']."'");
            $actualizar ->execute();
            $resActualizar = $actualizar->fetch(PDO::FETCH_ASSOC);
            
            $publicar = $conn -> prepare("INSERT INTO consulta(id_consulta, id_us, titulo, descripcion, recompensa, fecha_limite, archivo) VALUES (NULL, :id_us, :titulo , :descripcion, :recompensa,  :fecha_limite, :archivo)");
            $publicar -> bindParam("id_us",$_SESSION['id_us'],PDO::PARAM_STR);
            $publicar -> bindParam("titulo",$tit,PDO::PARAM_STR);
            $publicar -> bindParam("descripcion",$desc,PDO::PARAM_STR);
            $publicar -> bindParam("recompensa",$rec,PDO::PARAM_STR);
            $publicar -> bindParam("fecha_limite",$lim,PDO::PARAM_STR);
            $publicar -> bindParam("archivo",$target_file,PDO::PARAM_STR);
            $publicar ->execute();

            
            $conPub = $conn->prepare("SELECT MAX(id_consulta) FROM consulta");
            $conPub ->execute();
            $resPub = $conPub->fetch(PDO::FETCH_ASSOC);


            $tags = explode(",", $tag);
            
            foreach($tags as $t){
                
                    $consulta = $conn->prepare("SELECT id FROM tag WHERE tag = '".$t."'");
                    $consulta ->execute();
                    if($resId = $consulta->fetch(PDO::FETCH_ASSOC)){
                        /*Asignar el id del tag a la publicacion en la tabla tag_cons*/
                        $publicar = $conn -> prepare("INSERT INTO tag_cons(id_cons, tag_cons) VALUES (:id_cons, :tag_cons)");
                        $publicar -> bindParam("id_cons",$resPub['MAX(id_consulta)'],PDO::PARAM_STR); 
                        $publicar -> bindParam("tag_cons",$resId['id'],PDO::PARAM_STR);
                        $publicar ->execute();
                    }
                    else{
                        $publicar = $conn -> prepare("INSERT INTO tag(id, tag) VALUES (NULL, :tag)");
                        $publicar -> bindParam("tag",$t,PDO::PARAM_STR);
                        $publicar ->execute();

                        $conTag = $conn->prepare("SELECT MAX(id) FROM tag");
                        $conTag ->execute();
                        $resTag = $conTag->fetch(PDO::FETCH_ASSOC);

                        $publicar = $conn -> prepare("INSERT INTO tag_cons(id_cons, tag_cons) VALUES (:id_cons, :tag_cons)");
                        $publicar -> bindParam("id_cons",$resPub['MAX(id_consulta)'],PDO::PARAM_STR); 
                        $publicar -> bindParam("tag_cons",$resTag['MAX(id)'],PDO::PARAM_STR);
                        $publicar ->execute();
                    }
            }
            header("Location:../PaginasBalsamiq/inicio.php");
        }else{
            echo'
            <script>
                alert("Tokens insuficientes");
                document.location="../PaginasBalsamiq/inicio.php";
            </script>';
        }
    }
?>