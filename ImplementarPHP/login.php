<?php
    include('config.php'); 
    session_start(); //inicio sesion 

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        //consulta para ver si el user existe
        $consulta = $conn->prepare("SELECT * FROM usuario WHERE username =:usuario");
        $consulta->bindParam("usuario", $username, PDO::PARAM_STR); 
        $consulta ->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if(!$resultado){ //si el usuario no existe
            echo'<script type="text/javascript">
            alert("User o pass incorrectos");
            window.location.href="index.html";
            </script>';
        }
        else{

            if(password_verify($pass,$resultado['pass'])){ 
                //crear variables de sesion para conservar el nombre de usuario en las otras paginas
                $_SESSION['IdUsuario'] = $resultado['ID'];
                $_SESSION['username'] = $resultado['username'];
                header("Location:../PaginasBalsamiq/index.html");
            }
            else{
                echo'<script type="text/javascript">
                alert("User o pass incorrectos");
                window.location.href="index.html";
                </script>';

                //Por alguna razon al loguearse bien o mal entra aca
            }
        }
    }
    else{
        echo "error en login.php";
    }
?>