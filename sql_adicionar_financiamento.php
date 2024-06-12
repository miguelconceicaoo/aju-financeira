<?php
include_once("conexao.inc.php");





   
    if ($_POST['placaveiculo'] !== '' and $_POST['chassiveiculo'] !== '' and $_POST['modeloveiculo'] !== '' and  $_POST['valorveiculo'] !== ''){
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
        $placaveiculo = $_POST['placaveiculo'];
        $chassi_veiculo = $_POST['chassiveiculo'];
        $valor_veiculo = $_POST['valorveiculo'];
        $modelo_veiculo = $_POST['modeloveiculo'];
        $ano_veiculo = $_POST['anoveiculo'];
    
       

        
        
        
        $sql = "INSERT INTO  veiculo(cpf_veiculo,placa_veiculo,chassi_veiculo,valor_veiculo,modelo_veiculo,ano_veiculo) VALUES ('$cpf','$placaveiculo','$chassi_veiculo','$valor_veiculo','$modelo_veiculo','$ano_veiculo')";
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
        $telefone_referencia = $_POST['telefonereferencia'];
        $profissao = $_POST['profissao'];
        $tempo_profissao = $_POST['tempoprofissao'];
        $telefone_trabalho = $_POST['telefonetrabalho'];
        $renda = $_POST['renda'];
        $placaveiculo = $_POST['conta_escolhida'];
        

      }

      $cql = "UPDATE cliente SET nome='$nome',rg='$rg',cpf='$cpf',naturalidade='$naturalidade',estado_civil='$estado_civil',email_cliente='$email',data_nascimento='$data_nascimento',
        nome_mae='$nome_mae',endereco='$endereco',cep='$cep',telefone='$telefone_celular',telefone_fixo='$telefone_fixo',referencia_pessoal='$nome_referencia',
        telefone_referencia='$telefone_referencia',profissao='$profissao',tempo_profissao='$tempo_profissao',telefone_profissao='$telefone_trabalho',renda='$renda'
        WHERE id='$id'";
        
       
       
       
      $alo2="1234";
        
        
        
        // Inserção de dados no banco
        //$sql = "INSERT INTO conta (nome_banco, agencia, numero_conta, tipo_conta,cpf_conta) VALUES ('$nomebanco', '$agencia', '$numeroconta', '$tipoconta','$cpf')";
        $bql=  "INSERT INTO servico(tipo_servico,status_servico,cpf_servico,servico_placa_veiculo) VALUES ('financiamento','espera','$cpf','$placaveiculo')";
                            $_SESSION["tipo_servico"] = 'financiamento';
                            $_SESSION["status_servico"] = 'espera';
        
        if (mysqli_query($con, $bql)) {
          mysqli_query($con, $cql);
            
            
            echo "<script>alert('Serviço adicionado com sucesso!');location='financiamento/consult_adicionar_financiamento.php'</script>";
        } else {
            echo "Error: " . $bql . "<br>" . $con->error;
        }
