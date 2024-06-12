<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $id_conta=$_GET['id_conta'];

        $id_servico = $_GET['id_servico'];
        $id = $_GET['id'];
        $sql = "SELECT * FROM cliente,conta  WHERE cliente.id='$id' and conta.cpf_conta=cliente.cpf ";
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
                $nome_testemunha = $user['testemunha_nome'];
                $telefone_testemunha = $user['testemunha_telefone'];
                $nome_banco = $user['nome_banco'];
                $agencia = $user['agencia'];
                $numero_conta = $user['numero_conta'];
                $tipo_conta = $user['tipo_conta'];
                $identidade_frente = $user['identidade_frente'];
                $identidade_verso = $user['identidade_verso'];
            }

        }else{
            header("Location:form_emprestimo.php");
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
    <title>Alterar dados de empréstimo</title>
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
                    <div class="numbers"><h1>Alterar dados do cliente</h1></div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">
                    <form action="salvar_emprestimo.php" method="POST" enctype="multipart/form-data">
                        <h2>Empréstimo consignado</h2><br>
                        <div class="form-group">
                            <label for="nome">Nome completo:</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite o nome completo" class="form-control" value="<?php echo $nome ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" name="rg" id="rg" maxlength="10" placeholder="Digite o RG" class="form-control" value="<?php echo $rg ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="Digite o CPF" class="form-control" value="<?php echo $cpf ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="naturalidade">Naturalidade</label>
                            <input type="text" name="naturalidade" id="naturalidade" placeholder="Digite a naturalidade" class="form-control" value="<?php echo $naturalidade ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="estadocivil">Estado civil:</label>
                            <select name="estadocivil" id="estadocivil" class="form-control">
                                <option value="solteiro" <?php echo $estado_civil == 'solteiro' ? 'selected': ''?>>Solteiro(a)</option>
                                <option value="casado" <?php echo $estado_civil == 'casado' ? 'selected': ''?>>Casado(a)</option>
                                <option value="divorciado" <?php echo $estado_civil == 'divorciado' ? 'selected': ''?>>Divorciado(a)</option>
                                <option value="viuvo" <?php echo $estado_civil == 'viuvo' ? 'selected': ''?>>Viúvo(a)</option>    
                            </select>
                        </div>
        
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control" value="<?php echo $email ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="datanascimento">Data de nascimento:</label>
                            <input type="date" name="datanascimento" id="datanascimento" class="form-control" value="<?php echo $data_nascimento ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="nomemae">Nome da mãe:</label>
                            <input type="text" name="nomemae" id="nomemae" placeholder="Digite o nome da mãe" class="form-control" value="<?php echo $nome_mae ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="endereco">Endereço residencial:</label>
                            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" class="form-control" value="<?php echo $endereco ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" name="cep" id="cep" maxlength="9" placeholder="00000-000" class="form-control" value="<?php echo $cep ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="telefonecelular">Telefone celular:</label>
                            <input type="text" name="telefonecelular" id="telefonecelular" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control" value="<?php echo $telefone_celular ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="telefonefixo">Telefone fixo:</label>
                            <input type="text" name="telefonefixo" id="telefonefixo" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control" value="<?php echo $telefone_fixo ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="nomereferencia">Nome de referencia:</label>
                            <input type="text" name="nomereferencia" id="nomereferencia" placeholder="Digite o nome de referência" class="form-control" value="<?php echo $nome_referencia ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="nometestemunha">Nome da testemunha (caso analfabeto):</label>
                            <input type="text" name="nometestemunha" id="nometestemunha" placeholder="Digite o nome da testemunha" class="form-control" value="<?php echo $nome_testemunha ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="telefonetestemunha">Telefone testemunha:</label>
                            <input type="text" name="telefonetestemunha" id="telefonetestemunha" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control" value="<?php echo $telefone_testemunha ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="busca-bancos">Lista de bancos</label>
                            <input type="text" list="lista-bancos" name="nomebanco"  id="nomebanco" class="form-control" placeholder="Escreva o nome de um banco para buscar" autocomplete="off" value="<?php echo $nome_banco ?>">
                            <datalist id="lista-bancos"></datalist>
                        </div>
                        
        
                        <div class="form-group">
                            <label for="agencia">Agência:</label>
                            <input type="text" name="agencia" placeholder="0000" maxlength="4" id="agencia" class="form-control" value="<?php echo $agencia ?>">
                        </div>
        
                        <div class="form-group">
                            <label for="numeroconta">Número da conta:</label>
                            <input type="text" name="numeroconta" placeholder="0000000-0" maxlength="10" id="numeroconta" class="form-control" value="<?php echo $numero_conta ?>">
                        </div>
        
                        <label for="tipoconta">Tipo da conta:</label>
                        <div class="form-check">
                            <input type="radio" name="tipoconta" id="corrente" value="corrente" class="form-check-input" <?php echo $tipo_conta == 'corrente' ? 'checked': '' ?>>Corrente <br>
                            <input type="radio" name="tipoconta" id="poupanca" value="poupanca" class="form-check-input" <?php echo $tipo_conta == 'poupanca' ? 'checked': '' ?>>Poupança <br>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="hidden" name="id_conta" value="<?php echo $id_conta ?>">
                            <br><input type="submit" name="alterar" id="alterar" class="btn btn-primary" value="Alterar">
                        </div>
                        
                    </form> 
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

<script>
    let img = document.querySelector('#imagem');

    img.addEventListener('click', function(event){

    let modal = document.querySelector('#myModal');
    let img-modal = document.querySelector('#imgmodal');
    img.setAttribute('src', event.target.src);

    // No CSS o #modal deve esta com o display none.
    modal.style.display = 'block';

}, false);

</script>

</body>
</html>