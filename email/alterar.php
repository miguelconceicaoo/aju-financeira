<?php
session_start();

$con=mysqli_connect("localhost:3307","root","","banco_aju");
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <select name="status" id="estadocivil" class="form-control">
                        <option value="espera">espera</option>
                        <option value="aprovado">aprovado</option>
                        <option value="reprovado">reprovado</option>
                        <option value="analise">análise</option>    
                    </select>

            <input type="submit">
    </form>


<?php


 $_SESSION["status_servico"]=$_POST["status"];
 $id = $_GET['id'];
 $sql = "SELECT * FROM emprestimo WHERE id='$id'";
 $result = mysqli_query($con,$sql);

 if(mysqli_num_rows($result)>0){
     
     while($user = mysqli_fetch_assoc($result)){
         
     }

 }


 $sql = "UPDATE servico   SET status_servico='$_SESSION[status_servico]' WHERE emprestimo.id=servico.id";





 header("Location: email2.php");
?>
    
</body>
</html>