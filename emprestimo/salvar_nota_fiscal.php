<?php 
    include("../protect.php");
    
    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){
        $id_servico=$_GET['id_servico'];
        $cpf=$_GET['cpf'];

        $id = $_POST['id'];
        $nota_fiscal = $_FILES['notafiscal'];

        $sql1 = "SELECT nota_fiscal FROM servico WHERE id_servico='$id_servico'";
        $result1 = mysqli_query($con,$sql1);

        if(mysqli_num_rows($result1)>0){
            
            while($user = mysqli_fetch_assoc($result1)){

                $extensao = strtolower(pathinfo($nota_fiscal['name'],PATHINFO_EXTENSION));
                $novonome = uniqid();
                $imagem = './uploads/'.$novonome;
                $img = './uploads/'.$novonome.'.'.$extensao;
                move_uploaded_file($nota_fiscal['tmp_name'],$imagem.'.'.$extensao);

                $sql = "UPDATE servico SET nota_fiscal = '$img' WHERE id_servico='$id_servico'";

                if(mysqli_query($con,$sql)>0){
                   echo "<script>alert('Imagem alterada com sucesso!');location='upload_emprestimo.php?id=$id&id_servico=$id_servico&cpf=$cpf'</script>";

                }else{
                    echo mysqli_connect_error($con);
                }  
            }     
        }
    }
         
?>

