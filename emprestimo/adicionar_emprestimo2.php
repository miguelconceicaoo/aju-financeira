<?php
include("../protect.php");

include_once("../conexao.inc.php");

if (isset($_POST['alterar'])) {

    $id_conta = $_POST['id_conta'];
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



    $sql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',naturalidade='$naturalidade',estado_civil='$estado_civil',email_cliente='$email',data_nascimento='$data_nascimento',
            nome_mae='$nome_mae',endereco='$endereco',cep='$cep',telefone='$telefone_celular',telefone_fixo='$telefone_fixo',referencia_pessoal='$nome_referencia',
            testemunha_nome='$nome_testemunha',testemunha_telefone='$telefone_testemunha' WHERE id='$id'";
            
       
       $aql = "UPDATE conta  SET  nome_banco='$nome_banco',agencia='$agencia',numero_conta='$numero_conta',
       tipo_conta='$tipo_conta' WHERE id_conta='$id_conta'";

    $bql =  "INSERT INTO servico(tipo_servico,status_servico,cpf_servico) VALUES ('emprestimo','espera','$cpf')";
    $_SESSION["tipo_servico"] = 'emprestimo';
    $_SESSION["status_servico"] = 'espera';


    if (mysqli_query($con, $sql) > 0 and mysqli_query($con, $aql) > 0 and mysqli_query($con, $bql) > 0) {

        echo "<script>alert('Cliente cadastrado com sucesso!');location='../selecionar.php'</script>";
    } else {
        echo "Erro:" . mysqli_error($con);
    }
}
