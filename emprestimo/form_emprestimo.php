<?php
ob_start();
session_start();
    include("../protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/aju.ico">
    <title>Formulário empréstimo</title>
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>  
    <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>      
</head>


<body>
    <div class="containe">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <div class="user1"><img src="../img/aju.jpeg" alt=""></div>
                    </a>
                </li>
                <li>
                    <a href="../index.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../selecionar.php">
                        <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                        <span class="title">Cadastrar</span>
                    </a>
                </li>
                <li>
                    <a href="../registros.php">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Registros</span>
                    </a>
                </li>
                <li>
                    <a href="../relatorio/relatorio.php">
                        <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                        <span class="title">Relatórios</span>
                    </a>
                </li>
                <li>
                    <a href="../selecionar_adicionar.php">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Adicionar</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php" onclick="return confirm('Tem certeza que deseja sair?'); return false;">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sair</span>
                    </a>
                </li>      
            </ul>
        </div>

        <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

            <div class="box">
                <div class="title">
                    <div class="numbers"><h1>Preencha os dados</h1></div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h2>Empréstimo consignado</h2><br>
                        <div class="form-group">
                            <label for="nome">Nome completo:</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite o nome completo" class="form-control" maxlength="60">
                        </div>
        
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" name="rg" id="rg" maxlength="10" placeholder="Digite o RG" class="form-control" autocomplete="off">
                        </div>
        
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="000.000.000-00" class="form-control" autocomplete="off">
                        </div>
        
                        <div class="form-group">
                            <label for="naturalidade">Naturalidade:</label>
                            <input type="text" name="naturalidade" id="naturalidade" placeholder="Digite a naturalidade" class="form-control" maxlength="20">
                        </div>
        
                        <div class="form-group">
                            <label for="estadocivil">Estado civil:</label>
                            <select name="estadocivil" id="estadocivil" class="form-control">
                                <option value="solteiro">Solteiro(a)</option>
                                <option value="casado">Casado(a)</option>
                                <option value="divorciado">Divorciado(a)</option>
                                <option value="viuvo">Viúvo(a)</option>    
                            </select>
                        </div>
        
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control" maxlength="60">
                        </div>
        
                        <div class="form-group">
                            <label for="datanascimento">Data de nascimento:</label>
                            <input type="date" name="datanascimento" id="datanascimento" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="nomemae">Nome da mãe:</label>
                            <input type="text" name="nomemae" id="nomemae" placeholder="Digite o nome da mãe" class="form-control" maxlength="60">
                        </div>
        
                        <div class="form-group">
                            <label for="endereco">Endereço residencial:</label>
                            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" class="form-control" maxlength="60">
                        </div>
        
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" name="cep" id="cep" maxlength="9" placeholder="00000-000" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="telefonecelular">Telefone celular:</label>
                            <input type="text" name="telefonecelular" id="telefonecelular" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="telefonefixo">Telefone fixo:</label>
                            <input type="text" name="telefonefixo" id="telefonefixo" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="nomereferencia">Nome de referencia:</label>
                            <input type="text" name="nomereferencia" id="nomereferencia" placeholder="Digite o nome de referência" class="form-control" maxlength="60">
                        </div>
        
                        <div class="form-group">
                            <label for="nometestemunha">Nome da testemunha (caso analfabeto):</label>
                            <input type="text" name="nometestemunha" id="nometestemunha" placeholder="Digite o nome da testemunha" class="form-control" maxlength="60">
                        </div>
        
                        <div class="form-group">
                            <label for="telefonetestemunha">Telefone testemunha:</label>
                            <input type="text" name="telefonetestemunha" id="telefonetestemunha" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control">
                        </div>
        
                        <div class="form-group">
                            <label for="busca-bancos">Lista de bancos:</label>
                            <input type="text" list="lista-bancos" name="nomebanco" id="nomebanco" class="form-control" placeholder="Escreva o nome de um banco para buscar" autocomplete="off">
                            <datalist id="lista-bancos"></datalist>
                        </div>
        
                        <div class="form-group">
                            <label for="agencia">Agência:</label>
                            <input type="text" name="agencia" id="agencia" class="form-control" placeholder="0000" maxlength="4" autocomplete="off">
                        </div>
        
                        <div class="form-group">
                            <label for="numeroconta">Número da conta:</label>
                            <input type="text" name="numeroconta" id="numeroconta" class="form-control" placeholder="0000000-0" maxlength="10" autocomplete="off">
                        </div>
        
                        <label for="tipoconta">Tipo da conta:</label>
                        <div class="form-check">
                            <input type="radio" name="tipoconta" id="corrente" value="corrente" class="form-check-input">Corrente <br>
                            <input type="radio" name="tipoconta" id="poupanca" value="poupanca" class="form-check-input">Poupança <br>
                        </div>

                        <div class="form-group">
                            <br><input type="submit" name="cadastrar" id="cadastrar" class="btn btn-primary" value="Cadastrar">
                        </div>
                    </form> 
        
                    <?php
                        include_once("../conexao.inc.php");
        
                        if(isset($_POST['nome']) and isset($_POST['rg']) and isset($_POST['cpf']) and isset($_POST['naturalidade']) and isset($_POST['estadocivil']) 
                        and isset($_POST['email']) and isset($_POST['datanascimento']) and isset($_POST['nomemae']) and isset($_POST['endereco']) and isset($_POST['cep']) 
                        and isset($_POST['telefonecelular']) and isset($_POST['telefonefixo']) and isset($_POST['nomereferencia']) and isset($_POST['nometestemunha'])
                        and isset($_POST['telefonetestemunha']) and isset($_POST['nomebanco']) and isset($_POST['agencia']) and isset($_POST['numeroconta']) and isset($_POST['tipoconta'])){
            
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

                            $sql = "INSERT INTO cliente (nome,rg,cpf,naturalidade,estado_civil,email_cliente,data_nascimento,nome_mae,endereco,cep,telefone,telefone_fixo,referencia_pessoal,testemunha_nome,
                            testemunha_telefone) VALUES ('$nome','$rg','$cpf','$naturalidade','$estado_civil','$email','$data_nascimento','$nome_mae','$endereco',
                            '$cep','$telefone_celular','$telefone_fixo','$nome_referencia','$nome_testemunha','$telefone_testemunha')";
                       
                            $aql = "INSERT INTO  conta(cpf_conta,nome_banco,agencia,numero_conta,tipo_conta) VALUES ('$cpf','$nome_banco','$agencia','$numero_conta','$tipo_conta')";
                            
                            $bql=  "INSERT INTO servico(tipo_servico,status_servico,cpf_servico,conta_numero) VALUES ('antecipacao','espera','$cpf','$numeroconta')";
                            $_SESSION["tipo_servico"] = 'emprestimo';
                            $_SESSION["status_servico"] = 'espera';


                        if(mysqli_query($con, $sql)>0 and mysqli_query($con, $aql)>0 and mysqli_query($con, $bql)>0){

                            echo "<script>alert('Cliente cadastrado com sucesso!');location='../selecionar.php'</script>";
                            
                        }else{
                            echo "Erro:".mysqli_error($con);
                        }
                    }

                    ?>
                </div>
            </div>
        </div>  
    </div>

<script src="js_emprestimo.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script> 
    //menuToggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function(){
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }

    //add hovered class in selected list item 
    let list = document.querySelectorAll('.navigation li');
    function activeLink(){
        list.forEach((item) => 
        item.classList.remove('hovered'));
        this.classList.add('hovered')
    }
    
    list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));
    function buscarBanco(banco) {
            $.ajax({
                url: "../search_bank.php",
                method: "POST",
                data: {
                    banco: banco
                },
                success: function(data) {
                    $('#lista-bancos').html(data);
                }
            });
        }

        $(document).ready(function() {
           
            buscarBanco()


        });
</script> 
</body>
</html>