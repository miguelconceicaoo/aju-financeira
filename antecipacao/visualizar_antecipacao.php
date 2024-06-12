<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $id_conta=$_GET['id_conta'];
        $id_servico=$_GET['id_servico'];

        $id = $_GET['id'];
        $sql = "SELECT * FROM cliente,servico,conta WHERE cliente.id='$id'  and servico.id_servico='$id_servico' and  conta.id_conta='$id_conta'  ";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){

            while($user = mysqli_fetch_assoc($result)){
                $nome = $user['nome'];
                $rg = $user['rg'];
                $cpf = $user['cpf']; 
                $email = $user['email_cliente'];
                $data_nascimento = $user['data_nascimento'];   
                $endereco = $user['endereco'];
                $cep = $user['cep'];
                $telefone_celular = $user['telefone'];
                $telefone_fixo = $user['telefone_fixo'];
                $nome_banco = $user['nome_banco'];
                $agencia = $user['agencia'];
                $numero_conta = $user['numero_conta'];
                $tipo_conta = $user['tipo_conta'];
            }

        }else{
            header("Location:form_antecipacao.php");
        }   
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/aju.ico">
    <title>Visualizar dados antecipação de FGTS</title> 
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

                        <h2>Antecipação de FGTS</h2><br>
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
                        <b><label for="email">E-mail:</label></b>
                            <?php echo $email ?>
                        </div>
        
                        <div class="form-group">
                        <b><label for="datanascimento">Data de nascimento:</label></b>
                            <?php echo date('d/m/Y', strtotime($data_nascimento)) ?>
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
                        <b><label for="nomebanco">Nome do banco:</label></b>
                            <?php echo $nome_banco ?>
                        </div>
        
                        <div class="form-group">
                        <b><label for="agencia">Agência:</label></b>
                            <?php echo $agencia ?>
                        </div>
        
                        <div class="form-group">
                        <b><label for="numeroconta">Número da conta:</label></b>
                            <?php echo $numero_conta ?>
                        </div>
          
                        <div class="form-group">
                        <b><label for="tipoconta">Tipo da conta:</label></b>
                            <?php echo $tipo_conta ?>
                        </div>
        
                        <div class="form-group">
                        <a href="consult_antecipacao.php"> <button class="btn btn-primary">Voltar</button> </a>
                        </div>

                </div>
            </div>
        </div>  
    </div>

<script src="../scriptform.js"></script>
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