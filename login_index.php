<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/aju.ico">
        <title>Login</title> 
        <link rel="stylesheet" href="style_login.css">

        <style>
            .area .login .cor{
                color: #fff;
                font-size:18px;
            }

            .area .login p{
                color:#287bff;
            }
        </style>
        
    </head>

    <body>
        <section class="area">
            <div class="login">

            <div class="aju">
                    <img src="img/xx.jpg" alt="">
                </div>

                <form action="" method="POST">
                    <h1>Login</h1>
                    <input type="text" name="email" placeholder="E-mail"><br>
                    <input type="password" name="senha" placeholder="Senha"><br>
                    <input type="submit" value="Entrar" name="">     
                </form>
                    <p>Esqueceu a senha?<a href="#">Clique aqui</a></p><br>

                    <?php
                    include_once("conexao.inc.php");

                    if(isset($_POST['email']) || isset($_POST['senha'])){
        
                        if(strlen($_POST['email']) == 0){
                            echo "<b><p class='cor'>Preencha seu e-mail!</p></b>";
                        }else if(strlen($_POST['senha']) == 0){
                            echo "<b><p class='cor'>Preencha sua senha!</p></b>";
                        }else{

                            $email = mysqli_real_escape_string($con, $_POST['email']);
                            $senha = mysqli_real_escape_string($con, $_POST['senha']);

                            $sql = "SELECT * FROM administrador WHERE email_adm = '$email' AND senha_adm = '$senha'";
                            $result = mysqli_query($con,$sql) or die("Falha na conexão do código SQL: ".mysqli_connect_error());

                            
                            if(mysqli_num_rows($result)>0){
                                while($reg = mysqli_fetch_assoc($result)){

                                    if(!isset($_SESSION)){
                                        session_start();
                                    }

                                    $_SESSION['id_adm'] = $reg['id_adm'];
                                    $_SESSION['nome'] = $reg['nome'];

                                    header("Location: index.php");
                                     

                                }

                            }else{
                                echo "<b><p class='cor'>E-mail ou senha inválidos!</p></b>"; 
                            }
                        }
                    }
                ?>

                    

            </div>
        </section>    
    </body>
</html> 


