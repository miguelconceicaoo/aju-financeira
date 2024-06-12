<?php 
    include("../protect.php");
    
    include_once("../conexao.inc.php");

    if(isset($_POST['alterar'])){
        $id_veiculo=$_POST['id_veiculo'];
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
        $telefone_referencia = $_POST['telefonereferencia'];
        $profissao = $_POST['profissao'];
        $tempo_profissao = $_POST['tempoprofissao'];
        $telefone_trabalho = $_POST['telefonetrabalho'];
        $renda = $_POST['renda'];
        $placa_veiculo = $_POST['placaveiculo'];
        $chassi_veiculo = $_POST['chassiveiculo'];
        $valor_veiculo = $_POST['valorveiculo'];
        $modelo_veiculo = $_POST['modeloveiculo'];
        $ano_veiculo = $_POST['anoveiculo'];

        $sql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',naturalidade='$naturalidade',estado_civil='$estado_civil',email_cliente='$email',data_nascimento='$data_nascimento',
        nome_mae='$nome_mae',endereco='$endereco',cep='$cep',telefone='$telefone_celular',telefone_fixo='$telefone_fixo',referencia_pessoal='$nome_referencia',
        telefone_referencia='$telefone_referencia',profissao='$profissao',tempo_profissao='$tempo_profissao',telefone_profissao='$telefone_trabalho',renda='$renda'
        WHERE id='$id'";
        $aql = " UPDATE veiculo SET placa_veiculo='$placa_veiculo',
        chassi_veiculo='$chassi_veiculo',valor_veiculo='$valor_veiculo',modelo_veiculo='$modelo_veiculo',ano_veiculo='$ano_veiculo' WHERE id_veiculo='$id_veiculo'";

        if(mysqli_query($con,$sql));
        mysqli_query($con, $aql);
            echo "<script>alert('Dados alterados com sucesso!');location='consult_financiamento.php?id=$id'</script>";
            
        }else{
            echo "Operação inválida!";
            echo mysqli_connect_error($con);
        }       
?>

