<?php 
    include("../protect.php");
    
    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){
        $cpf=$_GET['cpf'];
        $id_servico=$_GET['id_servico'];

        $id = $_GET['id'];
        $identidade_frente = $_FILES['identidadefrente'];

        $sql1 = "SELECT identidade_frente FROM cliente WHERE id='$id'";
        $result1 = mysqli_query($con,$sql1);

        if(mysqli_num_rows($result1)>0){
            
            while($user = mysqli_fetch_assoc($result1)){

                $extensao = strtolower(pathinfo($identidade_frente['name'],PATHINFO_EXTENSION));
                $novonome = uniqid();
                $imagem = './uploads/'.$novonome;
                $img = './uploads/'.$novonome.'.'.$extensao;
                move_uploaded_file($identidade_frente['tmp_name'],$imagem.'.'.$extensao);

                $sql = "UPDATE cliente SET identidade_frente = '$img' WHERE id='$id'";

                if(mysqli_query($con,$sql)>0){
                   echo "<script>alert('Imagem alterada com sucesso!');location='upload_refinanciamento.php?id=$id&id_servico=$id_servico&cpf=$cpf'</script>";

                }else{
                    echo mysqli_connect_error($con);
                }  
            }     
        }
    }        
?>

