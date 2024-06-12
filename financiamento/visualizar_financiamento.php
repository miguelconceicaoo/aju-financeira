<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $id_veiculo=$_GET['id_veiculo'];
        $id_servico=$_GET['id_servico'];

        $id = $_GET['id'];
        $sql = "SELECT * FROM cliente,servico,veiculo WHERE cliente.id='$id' and servico.id_servico='$id_servico' and  veiculo.id_veiculo='$id_veiculo' ";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){

            while($user = mysqli_fetch_assoc($result)){
                $nome = $user['nome'];
                $rg = $user['rg'];
                $cpf = $user['cpf'];
                $naturalidade = $user['naturalidade'];
                $estado_civil = $user['estado_civil'];
                $email = $user['email_cliente'];
                $data_nascimento = $user['data_nascimento'];
                $nome_mae = $user['nome_mae'];
                $endereco = $user['endereco'];
                $cep = $user['cep'];
                $telefone_celular = $user['telefone'];
                $telefone_fixo = $user['telefone_fixo'];
                $nome_referencia = $user['referencia_pessoal'];
                $telefone_referencia = $user['telefone_referencia'];
                $profissao = $user['profissao'];
                $tempo_profissao = $user['tempo_profissao'];
                $telefone_trabalho = $user['telefone_profissao'];
                $renda = $user['renda'];
                $placa_veiculo = $user['placa_veiculo'];
                $chassi_veiculo = $user['chassi_veiculo'];
                $valor_veiculo = $user['valor_veiculo'];
                $modelo_veiculo = $user['modelo_veiculo'];
                $ano_veiculo = $user['ano_veiculo'];
            }

        }else{
            header("Location:consult_financiamento.php");
        }   
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar dados financiamento</title>
    <link rel="shortcut icon" href="../img/aju.ico">
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
                    <div class="numbers"><h1>Visualizar dados do cliente</h1></div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">
                
                <h2>Financiamento</h2><br>
                <div class="form-group">
                    <b><label for="nome">Nome completo:</label></b>
                    <?php echo $nome ?>
                </div>

                <div class="form-group">
                <b><label for="rg">RG:</label></b>
                    <?php echo $rg ?>
                </div>

                <div class="form-group">
                <b><label for="cpf">CPF:</label></b>
                    <?php echo $cpf ?>
                </div>

                <div class="form-group">
                <b><label for="naturalidade">Naturalidade:</label></b>
                    <?php echo $naturalidade ?>
                </div>

                <div class="form-group">
                <b><label for="estadocivil">Estado civil:</label></b>
                    <?php echo $estado_civil ?>
                </div>

                <div class="form-group">
                <b><label for="email">E-mail:</label></b>
                    <?php echo $email ?>
                </div>

                <div class="form-group">
                <b><label for="datanascimento">Data de nascimento:</label></b>
                    <?php echo date('d/m/Y', strtotime($data_nascimento)) ?>
                </div>

                <div class="form-group">
                <b><label for="nomemae">Nome da mãe:</label></b>
                    <?php echo $nome_mae ?>
                </div>

                <div class="form-group">
                <b><label for="endereco">Endereço residencial:</label></b>
                    <?php echo $endereco ?>
                </div>

                <div class="form-group">
                <b><label for="cep">CEP:</label></b>
                    <?php echo $cep ?>
                </div>

                <div class="form-group">
                <b><label for="telefonecelular">Telefone celular:</label></b>
                    <?php echo $telefone_celular ?>
                </div>

                <div class="form-group">
                <b><label for="telefonefixo">Telefone fixo:</label></b>
                    <?php echo $telefone_fixo ?>
                </div>

                <div class="form-group">
                <b><label for="nomereferencia">Nome de referência:</label></b>
                    <?php echo $nome_referencia ?>
                </div>

                <div class="form-group">
                <b><label for="telefonereferencia">Telefone de referência:</label></b>
                    <?php echo $telefone_referencia ?>
                </div>

                <div class="form-group">
                <b><label for="profissao">Profissão:</label></b>
                    <?php echo $profissao ?>
                </div>

                <div class="form-group">
                <b><label for="tempoprofissao">Tempo de profissão:</label></b>
                    <?php echo $tempo_profissao ?>
                </div>

                <div class="form-group">
                <b><label for="telefonetrabalho">Telefone do trabalho:</label></b>
                    <?php echo $telefone_trabalho ?>
                </div>

                <div class="form-group">
                <b><label for="renda">Renda bruta:</label></b>
                    <?php echo $renda ?>
                </div>

                <div class="form-group">
                <b><label for="placaveiculo">Placa do veículo:</label></b>
                    <?php echo $placa_veiculo ?>
                </div>

                <div class="form-group">
                <b><label for="chassi">Número do chassi do veículo:</label></b>
                    <?php echo $chassi_veiculo ?>
                </div>

                <div class="form-group">
                <b><label for="valorveiculo">Valor do veículo:</label></b>
                    <?php echo $valor_veiculo ?> 
                </div>

                <div class="form-group">
                <b><label for="modeloveiculo">Modelo do veículo:</label></b>
                    <?php echo $modelo_veiculo ?>
                </div>

                <div class="form-group">
                <b><label for="anoveiculo">Ano do veículo:</label></b>
                    <?php echo $ano_veiculo ?>
                </div>

                <div class="form-group">
                    <a href="consult_financiamento.php"> <button class="btn btn-primary">Voltar</button> </a>
                </div>     
                </div>
            </div>
        </div>  
    </div>

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