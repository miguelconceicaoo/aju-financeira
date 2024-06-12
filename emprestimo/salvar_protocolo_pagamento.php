<?php 
    include("../protect.php");
    
    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){
        $cpf=$_GET['cpf'];
        $id_servico= $_GET['id_servico'];
        $id = $_POST['id'];
        $protocolo_pagamento = $_FILES['protocolopagamento'];

        $sql1 = "SELECT protocolo_pagamento FROM servico WHERE id_servico='$id_servico'";
        $result1 = mysqli_query($con,$sql1);

        if(mysqli_num_rows($result1)>0){
            
            while($user = mysqli_fetch_assoc($result1)){

                $extensao = strtolower(pathinfo($protocolo_pagamento['name'],PATHINFO_EXTENSION));
                $novonome = uniqid();
                $imagem = './uploads/'.$novonome;
                $img = './uploads/'.$novonome.'.'.$extensao;
                move_uploaded_file($protocolo_pagamento['tmp_name'],$imagem.'.'.$extensao);

                $sql = "UPDATE servico SET protocolo_pagamento = '$img' WHERE id_servico='$id_servico'";

                if(mysqli_query($con,$sql)>0){
                   echo "<script>alert('Imagem alterada com sucesso!');location='upload_emprestimo.php?id=$id&id_servico=$id_servico&cpf=$cpf'</script>";

                }else{
                    echo mysqli_connect_error($con);
                }  
            }     
        }
    }         
?>

