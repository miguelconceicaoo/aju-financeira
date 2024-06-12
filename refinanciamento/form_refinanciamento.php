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
    <title>Formulário refinanciamento</title>
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>        
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
                <form action="" method="POST">
                <h2>Refinanciamento</h2><br>
                <div class="form-group">
                    <label for="nome">Nome completo:</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite o nome completo" class="form-control" maxlength="60">
                </div>

                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" name="rg" id="rg" placeholder="Digite o RG" class="form-control" maxlength="10" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="000.000.000-00" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="naturalidade">Naturalidade:</label>
                    <input type="text" name="naturalidade" id="naturalidade" maxlength="30" placeholder="Digite a naturalidade" class="form-control">
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
                    <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control">
                </div>

                <div class="form-group">
                    <label for="datanascimento">Data de nascimento:</label>
                    <input type="date" name="datanascimento" id="datanascimento" class="form-control">
                </div>

                <div class="form-group">
                    <label for="nomemae">Nome da mãe:</label>
                    <input type="text" name="nomemae" id="nomemae" maxlength="60" placeholder="Digite o nome da mãe" class="form-control">
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço residencial:</label>
                    <input type="text" name="endereco" id="endereco" maxlength="60" placeholder="Digite o endereço" class="form-control">
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
                    <label for="nomereferencia">Nome de referência:</label>
                    <input type="text" name="nomereferencia" maxlength="60" id="nomereferencia" placeholder="Digite o nome de referência" class="form-control">
                </div>

                <div class="form-group">
                    <label for="telefonereferencia">Telefone de referência:</label>
                    <input type="text" name="telefonereferencia" maxlength="14" id="telefonereferencia" placeholder="(00) 0 0000-0000" class="form-control">
                </div>

                <div class="form-group">
                    <label for="profissao">Profissão:</label>
                    <input type="text" name="profissao" id="profissao" placeholder="Digite a profissão" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tempoprofissao">Tempo de profissão:</label>
                    <select name="tempoprofissao" id="tempoprofissao" class="form-control">
                        <option value="menosde1ano">Menos de 1 ano</option>
                        <option value="1anos">1 ano</option>
                        <option value="2anos">2 anos</option>
                        <option value="3anos">3 anos</option> 
                        <option value="4anos">4 anos</option>
                        <option value="5anos">5 anos</option>
                        <option value="maisde5anos">Superior a 5 anos</option>   
                    </select>
                </div>

                <div class="form-group">
                    <label for="telefonetrabalho">Telefone do trabalho:</label>
                    <input type="text" name="telefonetrabalho" maxlength="14" id="telefonetrabalho" placeholder="(00) 0 0000-0000" class="form-control">
                </div>

                <div class="form-group">
                    <label for="renda">Renda bruta:</label>
                    <input type="text" name="renda" id="renda" placeholder="Digite a renda do cliente" maxlength="12" class="form-control">
                   
                </div>

                <div class="form-group">
                    <label for="placaveiculo">Placa do veículo:</label>
                    <input type="text" name="placaveiculo" id="placaveiculo" placeholder="Digite a placa do veículo" maxlength="7" class="form-control">
                </div>

                <div class="form-group">
                    <label for="chassi">Número do chassi do veículo:</label>
                    <input type="text" name="chassiveiculo" id="chassiveiculo" placeholder="Digite o número do chassi do veículo" class="form-control" maxlength="17">
                </div>

                <div class="form-group">
                    <label for="valorveiculo">Valor do veículo:</label>
                    <input type="text" name="valorveiculo" maxlength="12" id="valorveiculo" placeholder="Digite o valor do veículo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="modeloveiculo">Modelo do veículo:</label>
                    <input type="text" name="modeloveiculo" maxlength="60" id="modeloveiculo" placeholder="Informe o modelo do veículo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="anoveiculo">Ano do veículo:</label>
                    <select name="anoveiculo" id="anoveiculo" class="form-control">
                        <option value="22">2022</option>
                        <option value="21">2021</option>
                        <option value="20">2020</option>
                        <option value="19">2019</option> 
                        <option value="18">2018</option>
                        <option value="17">2017</option>
                        <option value="16">2016</option>
                        <option value="15">2015</option>
                        <option value="14">2014</option>
                        <option value="13">2013</option>
                        <option value="12">2012</option>
                        <option value="11">2011</option>   
                        <option value="10">2010</option>
                        <option value="9">2009</option>
                        <option value="8">2008</option>
                        <option value="7">2007</option>
                        <option value="6">2006</option>
                        <option value="5">2005</option>
                        <option value="4">2004</option>
                    </select>
                </div>

                <div class="form-group">
                    <br><input type="submit" name="enviar" id="enviar" class="btn btn-primary" value="Cadastrar">
                </div>
            </form> 

            <?php
                include_once ("../conexao.inc.php");

                if(isset($_POST['nome']) and isset($_POST['rg']) and isset($_POST['cpf']) and isset($_POST['naturalidade']) and isset($_POST['estadocivil']) 
                and isset($_POST['email']) and isset($_POST['datanascimento']) and isset($_POST['nomemae']) and isset($_POST['endereco']) and isset($_POST['cep']) 
                and isset($_POST['telefonecelular']) and isset($_POST['telefonefixo']) and isset($_POST['nomereferencia']) and isset($_POST['telefonereferencia'])
                and isset($_POST['profissao']) and isset($_POST['tempoprofissao']) and isset($_POST['telefonetrabalho']) and isset($_POST['renda']) and isset($_POST['placaveiculo'])
                and isset($_POST['chassiveiculo']) and isset($_POST['valorveiculo']) and isset($_POST['modeloveiculo']) and isset($_POST['anoveiculo'])){
    
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

                    $sql = "INSERT INTO cliente (nome,rg,cpf,naturalidade,estado_civil,email_cliente,data_nascimento,nome_mae,endereco,cep,telefone,telefone_fixo,referencia_pessoal,telefone_referencia,
                    profissao,tempo_profissao,telefone_profissao,renda) 
                    VALUES ('$nome','$rg','$cpf','$naturalidade','$estado_civil','$email','$data_nascimento','$nome_mae','$endereco','$cep','$telefone_celular','$telefone_fixo','$nome_referencia',
                    '$telefone_referencia','$profissao','$tempo_profissao','$telefone_trabalho','$renda')";

                       $aql = "INSERT INTO  veiculo(cpf_veiculo,placa_veiculo,chassi_veiculo,valor_veiculo,modelo_veiculo,ano_veiculo) VALUES ('$cpf','$placa_veiculo','$chassi_veiculo','$valor_veiculo','$modelo_veiculo','$ano_veiculo')";
                       
                       $bql=  "INSERT INTO servico(tipo_servico,status_servico,cpf_servico,servico_placa_veiculo) VALUES ('financiamento','espera','$cpf','$placa_veiculo')";
                       $_SESSION["tipo_servico"]='refinanciamento';
                        $_SESSION["status_servico"]='espera';
                       
                        if(mysqli_query($con, $sql)>0 and mysqli_query($con, $aql)>0 and mysqli_query($con, $bql)>0){
                            echo "<script>alert('Cliente cadastrado com sucesso!');location='../selecionar.php'</script>";

                        }else{
                            echo "Erro " . mysqli_error($con);
                        }
    
                }

            ?>
                </div>
            </div>
        </div>  
    </div>

<script src="js_refinanciamento.js"></script>
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
</script>
    
</body>
</html>