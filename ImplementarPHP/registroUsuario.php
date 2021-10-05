<?php /* Todo esto está trabajando en el form del html del mismo nombre y se hace el link con <form action="resgistroUsuario.php...> Desde el html */
    include('config.php');
    if(isset($_POST['registro'])){ /* Si se toca el boton con id registro */
        $usuario = $_POST['username'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $passCifrada = password_hash($pass,PASSWORD_DEFAULT);
        
        /*consultar si el usuario ya existe*/
        $consultaUser = $conn -> prepare("SELECT * FROM usuario WHERE username= :user"); /* Consulta la base de datos, tabla "usuarios" y compara la columna "username" con el placeholder que en la siguiente linea se va a reemplazar */
        $consultaUser -> bindParam("user",$usuario,PDO::PARAM_STR); /* Cambia el placeholder user por la variable usuario y lo conviere a string */
        $consultaUser -> execute(); /* Confirma el envio de la consulta */

        $resultadoUser = $consultaUser->fetch(PDO::FETCH_ASSOC); /*Guarda si encontró al usuario */
        if($resultadoUser){ //si hay algo en esa matriz (o sea que el user existe)
            echo'<script type="text/javascript">
            alert("El usuario ya existe");
            window.location.href="../index.html";
            </script>';
            /* El usuario ya existia, pedimos que ingrese uno diferente */
        }
        else{
            
            $consultaMail = $conn -> prepare("SELECT * FROM usuario WHERE mail= :mail"); 
            $consultaMail -> bindParam("mail",$mail,PDO::PARAM_STR);
            $consultaMail -> execute();
            $resultadoMail = $consultaMail->fetch(PDO::FETCH_ASSOC); 
            if($resultadoMail){                 ////por alguna razon esto no funciona. Se pueden duplicar mails
                echo'<script type="text/javascript">
                alert("El mail ya existe");
                window.location.href="../index.html";
                </script>';
                /* El usuario ya existia, pedimos que ingrese uno diferente */
            }

            else{ /* Si el usuario no existia */
                $consultaRegistro = $conn -> prepare("INSERT INTO usuario(username, pass, mail) VALUES (:usuario , :pass, :mail)"); /* Prepara la insercion del usuario y contraseña en la tabla usuarios con los placeholders que reemplaza despues */
                $consultaRegistro -> bindParam("usuario",$usuario,PDO::PARAM_STR);
                $consultaRegistro -> bindParam("pass",$passCifrada,PDO::PARAM_STR);
                $consultaRegistro -> bindParam("mail",$mail,PDO::PARAM_STR);
                $resultadoRegistro = $consultaRegistro -> execute();
                if(!$resultadoRegistro){ //si devuelve false es porque fallo la insersion
                    echo'<script type="text/javascript">
                    alert("No se pudo registrar el usuario");
                    window.location.href="../index.html";
                    </script>';
                }
                else{
                    //agregar el inicio de la sesion
                    echo'<script type="text/javascript">
                    alert("Usuario registrado!");
                    window.location.href="../PaginasBalsamiq/inicio.php";
                    </script>';
                    /* Al haber creado exitosamente el usuario, que se haga el login de forma automática */
                }
            }  
        }
    }
?>