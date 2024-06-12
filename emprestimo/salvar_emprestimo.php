<?php
    include("../protect.php");

    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){

        $id_conta=$_POST['id_conta'];
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $naturalidade = $_POST['naturalidade'];
        $estado_civil = $_POST['estadocivil'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['datanascimento'];
        $nome_mae = $_POST['nomemae'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $telefone_celular = $_POST['telefonecelular'];
        $telefone_fixo = $_POST['telefonefixo'];
        $nome_referencia = $_POST['nomereferencia'];
        $nome_testemunha = $_POST['nometestemunha'];
        $telefone_testemunha = $_POST['telefonetestemunha'];
        $nome_banco = $_POST['nomebanco'];
        $agencia = $_POST['agencia'];
        $numero_conta = $_POST['numeroconta'];
        $tipo_conta = $_POST['tipoconta'];

        $sql1 = "SELECT * FROM cliente WHERE id='$id'";
        $result1 = mysqli_query($con,$sql1);

        if(mysqli_num_rows($result1)>0){
            
            while($user = mysqli_fetch_assoc($result1)){
             
                if(empty($identidade_frente) == true){
                    $identidade_frente = $user['identidade_frente'];

                }else if(empty($identidade_verso) == true){
                    $identidade_verso = $user['identidade_verso'];
                }
 
            $sql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',naturalidade='$naturalidade',estado_civil='$estado_civil',email_cliente='$email',data_nascimento='$data_nascimento',
            nome_mae='$nome_mae',endereco='$endereco',cep='$cep',telefone='$telefone_celular',telefone_fixo='$telefone_fixo',referencia_pessoal='$nome_referencia',
            testemunha_nome='$nome_testemunha',testemunha_telefone='$telefone_testemunha' WHERE id='$id'";
            
       
       $aql = "UPDATE conta  SET  nome_banco='$nome_banco',agencia='$agencia',numero_conta='$numero_conta',
       tipo_conta='$tipo_conta' WHERE id_conta='$id_conta'";
       

            if(mysqli_query($con,$sql)){
                mysqli_query($con, $aql);
                echo "<script>alert('Dados alterados com sucesso!');location='consult_emprestimo.php?id=$id'</script>";
            }else{
                echo "Operação inválida!";
                echo mysqli_connect_error($con);
            } 

            } 
        }
    }        
?>

