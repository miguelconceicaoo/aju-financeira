<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $id_veiculo=$_GET['id_veiculo'];

        $id_servico = $_GET['id_servico'];

        $id = $_GET['id'];
        $sql = "SELECT * FROM cliente,veiculo WHERE cliente.id='$id' and veiculo.cpf_veiculo=cliente.cpf ";
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
    <title>Alterar dados financiamento</title>
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
                    <div class="numbers"><h1>Alterar dados do cliente</h1></div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">
                <form action="salvar_financiamento.php" method="POST">
                <h2>Financiamento</h2><br>
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
                    <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="(00) 0 0000-0000"class="form-control" value="<?php echo $cpf ?>">
                </div>

                <div class="form-group">
                    <label for="naturalidade">Naturalidade:</label>
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
                    <label for="nomereferencia">Nome de referência:</label>
                    <input type="text" name="nomereferencia" id="nomereferencia" placeholder="Digite o nome de referência" class="form-control" value="<?php echo $nome_referencia ?>">
                </div>

                <div class="form-group">
                    <label for="telefonereferencia">Telefone de referência:</label>
                    <input type="text" name="telefonereferencia" id="telefonereferencia" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control" value="<?php echo $telefone_referencia ?>">
                </div>

                <div class="form-group">
                    <label for="profissao">Profissão:</label>
                    <input type="text" name="profissao" id="profissao" placeholder="Digite a profissão" class="form-control" value="<?php echo $profissao ?>">
                </div>

                <div class="form-group">
                    <label for="tempoprofissao">Tempo de profissão:</label>
                    <select name="tempoprofissao" id="tempoprofissao" class="form-control">
                        <option value="menosde1ano" <?php echo $tempo_profissao == 'menosde1ano' ? 'selected': ''?>>Menos de 1 ano</option>
                        <option value="1ano" <?php echo $tempo_profissao == '1ano' ? 'selected': ''?>>1 ano</option>
                        <option value="2anos" <?php echo $tempo_profissao == '2anos' ? 'selected': ''?>>2 anos</option>
                        <option value="3anos" <?php echo $tempo_profissao == '3anos' ? 'selected': ''?>>3 anos</option> 
                        <option value="4anos" <?php echo $tempo_profissao == '4anos' ? 'selected': ''?>>4 anos</option>
                        <option value="5anos" <?php echo $tempo_profissao == '5anos' ? 'selected': ''?>>5 anos</option>
                        <option value="superiora5anos" <?php echo $tempo_profissao == 'superiora5anos' ? 'selected': ''?>>Superior a 5 anos</option>
                        <option value="superiora10anos" <?php echo $tempo_profissao == 'superiora10anos' ? 'selected': ''?>>Superior a 10 anos</option>     
                    </select>
                </div>

                <div class="form-group">
                    <label for="telefonetrabalho">Telefone do trabalho:</label>
                    <input type="text" name="telefonetrabalho" id="telefonetrabalho" maxlength="14" placeholder="(00) 0 0000-0000" class="form-control" value="<?php echo $telefone_trabalho ?>">
                </div>

                <div class="form-group">
                    <label for="renda">Renda bruta:</label>
                    <input type="text" name="renda" maxlength="12" id="renda" class="form-control" value="<?php echo $renda ?>">
                </div>

                <div class="form-group">
                    <label for="placaveiculo">Placa do veículo:</label>
                    <input type="text" name="placaveiculo" id="placaveiculo" placeholder="" class="form-control" value="<?php echo $placa_veiculo ?>">
                </div>

                <div class="form-group">
                    <label for="chassi">Número do chassi do veículo:</label>
                    <input type="text" name="chassiveiculo" id="chassiveiculo" maxlength="17" placeholder="" class="form-control" value="<?php echo $chassi_veiculo ?>">
                </div>

                <div class="form-group">
                    <label for="valorveiculo">Valor do veículo:</label>
                    <input type="text" name="valorveiculo" id="valorveiculo" placeholder="" class="form-control" value="<?php echo $valor_veiculo ?>"> 
                </div>

                <div class="form-group">
                    <label for="modeloveiculo">Modelo do veículo:</label>
                    <input type="text" name="modeloveiculo" id="modeloveiculo" placeholder="Modelo do veículo" class="form-control" value="<?php echo $modelo_veiculo ?>">
                </div>

                <div class="form-group">
                    <label for="anoveiculo">Ano do veículo:</label>
                    <select name="anoveiculo" id="anoveiculo" class="form-control">
                        <option value="2022" <?php echo $ano_veiculo == '2022' ? 'selected': ''?>>2022</option>
                        <option value="2021" <?php echo $ano_veiculo == '2021' ? 'selected': ''?>>2021</option>
                        <option value="2020" <?php echo $ano_veiculo == '2020' ? 'selected': ''?>>2020</option>
                        <option value="2019" <?php echo $ano_veiculo == '2019' ? 'selected': ''?>>2019</option> 
                        <option value="2018" <?php echo $ano_veiculo == '2018' ? 'selected': ''?>>2018</option>
                        <option value="2017" <?php echo $ano_veiculo == '2017' ? 'selected': ''?>>2017</option>
                        <option value="2016" <?php echo $ano_veiculo == '2016' ? 'selected': ''?>>2016</option>
                        <option value="2015" <?php echo $ano_veiculo == '2015' ? 'selected': ''?>>2015</option>
                        <option value="2014" <?php echo $ano_veiculo == '2014' ? 'selected': ''?>>2014</option>
                        <option value="2013" <?php echo $ano_veiculo == '2013' ? 'selected': ''?>>2013</option>
                        <option value="2012" <?php echo $ano_veiculo == '2012' ? 'selected': ''?>>2012</option>
                        <option value="2011" <?php echo $ano_veiculo == '2011' ? 'selected': ''?>>2011</option>   
                        <option value="2010" <?php echo $ano_veiculo == '2010' ? 'selected': ''?>>2010</option>
                        <option value="2009" <?php echo $ano_veiculo == '2009' ? 'selected': ''?>>2009</option>
                        <option value="2008" <?php echo $ano_veiculo == '2008' ? 'selected': ''?>>2008</option>
                        <option value="2007" <?php echo $ano_veiculo == '2007' ? 'selected': ''?>>2007</option>
                        <option value="2006" <?php echo $ano_veiculo == '2006' ? 'selected': ''?>>2006</option>
                        <option value="2005" <?php echo $ano_veiculo == '2005' ? 'selected': ''?>>2005</option>
                        <option value="2004" <?php echo $ano_veiculo == '2004' ? 'selected': ''?>>2004</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="id_veiculo" value="<?php echo $id_veiculo ?>">
                    <br><input type="submit" name="alterar" id="alterar" class="btn btn-primary" value="Alterar">
                </div>    
            </form> 
                </div>
            </div>
        </div>  
    </div>

<script src="js_financiamento.js"></script>
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