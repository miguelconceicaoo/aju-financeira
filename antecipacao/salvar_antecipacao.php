<?php 
    include("../protect.php");
    
    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){
        $id_conta=$_POST['id_conta'];
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['datanascimento'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $telefone_celular = $_POST['telefonecelular'];
        $telefone_fixo = $_POST['telefonefixo'];
        $nome_banco = $_POST['nomebanco'];
        $agencia = $_POST['agencia'];
        $numero_conta = $_POST['numeroconta'];
        $tipo_conta = $_POST['tipoconta'];

        $sql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',email_cliente='$email',data_nascimento='$data_nascimento',
        endereco='$endereco',cep='$cep',telefone='$telefone_celular',telefone_fixo='$telefone_fixo' WHERE id='$id'";
        
        $aql = "UPDATE conta SET nome_banco='$nome_banco',agencia='$agencia',numero_conta='$numero_conta',
        tipo_conta='$tipo_conta' WHERE id_conta='$id_conta'";
   
        if(mysqli_query($con,$sql)){
            mysqli_query($con, $aql);
        echo "<script>alert('Dados alterados com sucesso!');location='consult_antecipacao.php?id=$id'</script>";
        }else{
            echo "Operação inválida!";
            echo mysqli_connect_error($con);
        }     
    }  
?>

