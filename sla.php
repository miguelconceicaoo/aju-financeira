<?php


if (!empty($_GET['id'])) {
    include_once("../conexao.inc.php");
    $id_conta = $_GET['id_conta'];


    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente,conta  WHERE cliente.id='$id' and conta.cpf_conta=cliente.cpf ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($user = mysqli_fetch_assoc($result)) {
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
    } else {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        input[type=submit]:hover {
            font-size: 1rem;
            font-family: 'Ubuntu', sans-serif;
            border: 1px solid white;
            background-color: lightgreen;
        }
    </style>

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
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
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
                    <a href="#">
                        <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                        <span class="title">Help</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Password</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
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
                    <div class="numbers">
                        <h1>Alterar dados empréstimo</h1>
                    </div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">
                    <form id="my-form" action="" method="post" enctype="multipart/form-data">
                        <h2>Empréstimo consignado</h2>
                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite o nome completo" class="form-control" value="<?php echo $nome ?>">
                        </div>

                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" id="rg" maxlength="14" placeholder="Digite o RG" class="form-control" value="<?php echo $rg ?>">
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="Digite o CPF" class="form-control" value="<?php echo $cpf ?>">
                        </div>

                        <div class="form-group">
                            <label for="naturalidade">Naturalidade</label>
                            <input type="text" name="naturalidade" id="naturalidade" placeholder="Digite a naturalidade" class="form-control" value="<?php echo $naturalidade ?>">
                        </div>

                        <div class="form-group">
                            <label for="estadocivil">Estado civil</label>
                            <select name="estadocivil" id="estadocivil" class="form-control">
                                <option value="solteiro" <?php echo $estado_civil == 'solteiro' ? 'selected' : '' ?>>Solteiro(a)</option>
                                <option value="casado" <?php echo $estado_civil == 'casado' ? 'selected' : '' ?>>Casado(a)</option>
                                <option value="divorciado" <?php echo $estado_civil == 'divorciado' ? 'selected' : '' ?>>Divorciado(a)</option>
                                <option value="viuvo" <?php echo $estado_civil == 'viuvo' ? 'selected' : '' ?>>Viúvo(a)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control" value="<?php echo $email ?>">
                        </div>

                        <div class="form-group">
                            <label for="datanascimento">Data de nascimento</label>
                            <input type="date" name="datanascimento" id="datanascimento" class="form-control" value="<?php echo $data_nascimento ?>">
                        </div>

                        <div class="form-group">
                            <label for="nomemae">Nome da mãe</label>
                            <input type="text" name="nomemae" id="nomemae" placeholder="Digite o nome da mãe" class="form-control" value="<?php echo $nome_mae ?>">
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço residencial</label>
                            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" class="form-control" value="<?php echo $endereco ?>">
                        </div>

                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" maxlength="9" placeholder="xxxxx-xxx" class="form-control" value="<?php echo $cep ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefonecelular">Telefone celular</label>
                            <input type="text" name="telefonecelular" id="telefonecelular" maxlength="14" placeholder="(xx) x xxxx-xxxx" class="form-control" value="<?php echo $telefone_celular ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefonefixo">Telefone fixo</label>
                            <input type="text" name="telefonefixo" id="telefonefixo" maxlength="14" placeholder="(xx) x xxxx-xxxx" class="form-control" value="<?php echo $telefone_fixo ?>">
                        </div>

                        <div class="form-group">
                            <label for="nomereferencia">Nome de referencia</label>
                            <input type="text" name="nomereferencia" id="nomereferencia" placeholder="Digite o nome de referência" class="form-control" value="<?php echo $nome_referencia ?>">
                        </div>

                        <div class="form-group">
                            <label for="nometestemunha">Nome da testemunha (caso analfabeto)</label>
                            <input type="text" name="nometestemunha" id="nometestemunha" placeholder="Digite o nome da testemunha" class="form-control" value="<?php echo $nome_testemunha ?>">
                        </div>

                        <div class="form-group">
                            <label for="telefonetestemunha">Telefone testemunha</label>
                            <input type="text" name="telefonetestemunha" id="telefonetestemunha" maxlength="14" placeholder="(xx) x xxxx-xxxx" class="form-control" value="<?php echo $telefone_testemunha ?>">
                        </div>

                        <div id="input-container">
                            <div class="form-group">
                                <label for="nomebanco">Nome do banco:</label>
                                <select name="nomebanco[]" id="nomebanco" class="form-control">
                                    <option value="caixa">Caixa</option>
                                    <option value="bradesco">Bradesco</option>
                                    <option value="itau">Itaú</option>
                                    <option value="bancodobrasil">Banco do Brasil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agencia">Agência:</label>
                                <input type="text" name="agencia[]" id="agencia" class="form-control" placeholder="0000" maxlength="4" autocomplete="off" value="<?php echo $agencia ?>">
                            </div>
                            <div class="form-group">
                                <label for="numeroconta">Número da conta:</label>
                                <input type="text" name="numeroconta[]" id="numeroconta" class="form-control" placeholder="0000000-0" maxlength="10" autocomplete="off" value="<?php echo $numero_conta ?>">
                            </div>
                            <div class="form-check">
                                <input type="radio" name="tipoconta[]" id="corrente" value="corrente" class="form-check-input" <?php echo $tipo_conta == 'corrente' ? 'checked' : '' ?>>Corrente <br>
                                <input type="radio" name="tipoconta[]" id="poupanca" value="poupanca" class="form-check-input" <?php echo $tipo_conta == 'poupanca' ? 'checked' : '' ?>>Poupança <br>
                            </div>
                        </div>
                        <button id="add-button" onclick="document.getElementById('add-button').style.display='none';">Add</button> <br>
                        <input type="submit" formaction="../sql_adicionar.php">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--UPLOAD-->
    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-Light" data-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="<?php echo $identidade_frente ?>" alt="" id="imgmodal" width="100%" height="100%">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--UPLOAD-->

    <!--UPLOAD-->
    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn btn-Light" data-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="<?php echo $identidade_verso ?>" alt="" id="imgmodal" width="100%" height="100%">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--UPLOAD-->

    <script src="../scriptform.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    

    <script>
        $(document).ready(function() {
          document.addEventListener('DOMContentLoaded', function() {
  const addButton = document.getElementById('add-button');
  const inputContainer = document.getElementById('input-container');
  const inputTemplate = `
    <div class="form-group">
      <label for="nomebanco">Nome do banco:</label>
      <select name="nomebanco[]" id="nomebanco" class="form-control">
        <option value="caixa">Caixa</option>
        <option value="bradesco">Bradesco</option>
        <option value="itau">Itaú</option>
        <option value="bancodobrasil">Banco do Brasil</option>
      </select>
    </div>
    <div class="form-group">
      <label for="agencia">Agência:</label>
      <input type="text" name="agencia[]" id="agencia" class="form-control" placeholder="0000" maxlength="4" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="numeroconta">Número da conta:</label>
      <input type="text" name="numeroconta[]" id="numeroconta" class="form-control" placeholder="0000000-0" maxlength="10" autocomplete="off">
    </div>
    <div class="form-check">
      <input type="radio" name="tipoconta[]" id="corrente" value="corrente" class="form-check-input">Corrente <br>
      <input type="radio" name="tipoconta[]" id="poupanca" value="poupanca" class="form-check-input">Poupança <br>
    </div>`;

  addButton.addEventListener('click', function() {
    inputContainer.insertAdjacentHTML('beforeend', inputTemplate);
    addButton.setAttribute('disabled', 'true');
  });
});
           
            //menuToggle
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');

            toggle.onclick = function() {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }

            //add hovered class in selected list item 
            let list = document.querySelectorAll('.navigation li');

            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('hovered'));
                this.classList.add('hovered')
            }
            list.forEach((item) =>
                item.addEventListener('mouseover', activeLink));



            var addButtonClicked = false;
            let img = document.querySelector('#imagem');

            img.addEventListener('click', function(event) {

                let modal = document.querySelector('#myModal');
                let img - modal = document.querySelector('#imgmodal');
                img.setAttribute('src', event.target.src);

                // No CSS o #modal deve esta com o display none.
                modal.style.display = 'block';

            }, false);



        });
    </script>

</body>

</html>