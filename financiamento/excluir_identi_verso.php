<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $cpf=$_GET['cpf'];
        $id_servico=$_GET['id_servico'];

        $id = $_GET['id'];
        $sql = "SELECT identidade_verso FROM cliente WHERE id='$id'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){
            
            $sql1 = "UPDATE cliente SET identidade_verso = 0 WHERE id='$id' ";
            
            if(mysqli_query($con,$sql1)){
                header("location: upload_financiamento.php?id=$id&id_servico=$id_servico&cpf=$cpf");

            }else{  
                echo mysqli_error($con);
            }    
        }      
    }    
?>
