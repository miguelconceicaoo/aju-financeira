<?php 
    include("../protect.php");
    
    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){
        $cpf= $_GET['cpf'];

        $id_servico= $_GET['id_servico'];
        $id = $_GET['id'];
        $identidade_verso = $_FILES['identidadeverso'];

        $sql1 = "SELECT identidade_verso FROM cliente WHERE id='$id'";
        $result1 = mysqli_query($con,$sql1);

        if(mysqli_num_rows($result1)>0){
            
            while($user = mysqli_fetch_assoc($result1)){

                $extensao = strtolower(pathinfo($identidade_verso['name'],PATHINFO_EXTENSION));
                $novonome = uniqid();
                $imagem = './uploads/'.$novonome;
                $img = './uploads/'.$novonome.'.'.$extensao;
                move_uploaded_file($identidade_verso['tmp_name'],$imagem.'.'.$extensao);

                $sql = "UPDATE cliente SET identidade_verso = '$img' WHERE id='$id'";

                if(mysqli_query($con,$sql)>0){
                   echo "<script>alert('Imagem alterada com sucesso!');location='upload_antecipacao.php?id=$id=$id&id_servico=$id_servico&cpf=$cpf'</script>";

                }else{
                    echo mysqli_connect_error($con);
                }  
            }     
        }
    }        
?>

