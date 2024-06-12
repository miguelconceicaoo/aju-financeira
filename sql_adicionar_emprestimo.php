<?php
include_once("conexao.inc.php");





    if(isset($_POST['submit'])) {
        // Recuperando valores dos inputs

        if ($_POST['nomebanco'] !== '' and $_POST['agencia'] !== '' and $_POST['numeroconta'] !== '' and $_POST['tipoconta'] !== ''){
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

    
        $nomebanco = $_POST['nomebanco'];
        $agencia = $_POST['agencia'];
        $numeroconta = $_POST['numeroconta'];
        $tipoconta = $_POST['tipoconta'];

        
        
        $cpf = $_POST['cpf'];
        $sql = "INSERT INTO conta (nome_banco, agencia, numero_conta, tipo_conta,cpf_conta) VALUES ('$nomebanco', '$agencia', '$numeroconta', '$tipoconta','$cpf')";
        mysqli_query($con, $sql);
      }else {
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
        $cpf = $_POST['cpf'];
        $numeroconta=$_POST['conta_escolhida'];

      }
}
      $cql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',naturalidade='$naturalidade',estado_civil='$estado_civil',email_cliente='$email',data_nascimento='$data_nascimento',
            nome_mae='$nome_mae',endereco='$endereco',cep='$cep',telefone='$telefone_celular',telefone_fixo='$telefone_fixo',referencia_pessoal='$nome_referencia',
            testemunha_nome='$nome_testemunha',testemunha_telefone='$telefone_testemunha' WHERE id='$id'";
        
       
        
        
        
        // Inserção de dados no banco
        //$sql = "INSERT INTO conta (nome_banco, agencia, numero_conta, tipo_conta,cpf_conta) VALUES ('$nomebanco', '$agencia', '$numeroconta', '$tipoconta','$cpf')";
        $bql=  "INSERT INTO servico(tipo_servico,status_servico,cpf_servico,conta_numero) VALUES ('emprestimo','espera','$cpf','$numeroconta')";
                            $_SESSION["tipo_servico"] = 'emprestimo';
                            $_SESSION["status_servico"] = 'espera';
        
        if (mysqli_query($con, $bql)) {
            mysqli_query($con, $cql);
            echo "<script>alert('Serviço adicionado com sucesso!');location='emprestimo/consult_adicionar_emprestimo.php'</script>";
        } else {
            echo "Error: " . $bql . "<br>" . $con->error;
        }
        
        
    

?>
