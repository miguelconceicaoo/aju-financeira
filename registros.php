<?php
ob_start();
    include("protect.php");
    include_once("conexao.inc.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/aju.ico">
    <title>Painel de controle</title>
    <link rel="stylesheet" href="styleindex.css">

    <style>
        select {
            width: 40%;
            min-width: 15ch;
            max-width: 30ch; 
            border-radius: 0.20em;
            padding: 0.25em 0.5em;
            font-size: 1rem;
            cursor: pointer;
            line-height: 1.1;    
        }

        input[type=submit]{
            font-size: 1rem;
            font-family: 'Ubuntu', sans-serif;
            border: 1px solid white;
        }

        input[type=submit]:hover{
            font-size: 1rem;
            font-family: 'Ubuntu', sans-serif;
            border: 1px solid white;
            background-color: lightgreen;
            transition: 0.5s;
        }

        p{
            color:#287bff;
            text-align:center;
        }

        .link{
            text-decoration:none;
        }
        .link:hover{
            text-decoration:none;
            color:#fff;            
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <div class="user1"><img src="img/aju.jpeg" alt=""></div>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="selecionar.php">
                        <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                        <span class="title">Cadastrar</span>
                    </a>
                </li>
                <li>
                    <a href="registros.php">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Registros</span>
                    </a>
                </li>
                <li>
                    <a href="relatorio/relatorio.php">
                        <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                        <span class="title">Relatórios</span>
                    </a>
                </li>
                <li>
                    <a href="selecionar_adicionar.php">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Adicionar</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" onclick="return confirm('Tem certeza que deseja sair?'); return false;">
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
                    <div class="numbers"><h3>Consultar registros</h3></div>
                </div>
            </div>

            <!--cards-->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <a href="emprestimo/consult_emprestimo.php"><div class="numbers">Empréstimo consignado</div></a>
                        <div class="cardName"></div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <a href="financiamento/consult_financiamento.php"><div class="numbers">Financiamento</div></a>
                        <div class="cardName"></div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="car-sport-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <a href="refinanciamento/consult_refinanciamento.php"><div class="numbers">Refinanciamento</div></a>
                        <div class="cardName"></div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="bus-outline"></ion-icon>
                    </div>
                </div>
                
                <div class="card">
                    <div>
                        <a href="antecipacao/consult_antecipacao.php"><div class="numbers">Antecipação de FGTS</div></a>
                        <div class="cardName"></div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="woman-outline"></ion-icon>
                    </div>
                </div>
            </div>
            
            <div class="details">
                <div class="recentOrders">

                    <div class="cardHeader">
                        <h2>Em andamento</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>CPF</td>
                                <td>Tipo de serviço</td>
                                <td>Código do serviço</td>
                                <td>E-mail</td>
                                <td>Status de serviço</td>
                                <td>Enviar</td>
                            </tr>
                        </thead>

                        <tbody> 
                            <?php

                                $result = mysqli_query($con, "SELECT * FROM cliente,servico
                                WHERE cliente.cpf = servico.cpf_servico AND servico.status_servico NOT IN ('finalizado','reprovado') ORDER BY id DESC");

                                    if(mysqli_num_rows($result)>0){
                                        while($user = mysqli_fetch_assoc($result)){
                                            
                                            $id = $user['id'];
                                            $nome = $user['nome'];
                                            $cpf = $user['cpf'];
                                            $tipo_servico = $user['tipo_servico'];
                                            $id_servico = $user['id_servico'];
                                            $status_servico = $user['status_servico'];
                                            $email = $user['email_cliente'];

                            ?>

                            <form action='' method='POST'>
                                <tr>
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $cpf ?></td>
                                    <td><?php echo $tipo_servico ?></td>
                                    <td><?php echo $id_servico ?></td>
                                    
                                    <td><?php echo "<a href=\"https://mail.google.com/mail/u/0/?tab=$email#inbox?compose=CllgCJftMDJSwLcLgZRvHtvBzgWztFwTSKXgdGKCBbdVFSxPCjrRxwWcJDLThVppkhnNgsSPXqV\" target='_blank' class='link'>".$email."</a>" ?></td>

                                    <td> 
                                        <select name='status_servico' id='status_servico'>
                                            <option value='espera' <?php echo $status_servico == 'espera' ? 'selected': ''?>>Espera</option>
                                            <option value='analise' <?php echo $status_servico == 'analise' ? 'selected': ''?>>Análise</option>
                                            <option value='reprovado' <?php echo $status_servico == 'reprovado' ? 'selected': ''?>>Reprovado</option>
                                            <option value='andamento' <?php echo $status_servico == 'andamento' ? 'selected': ''?>>Andamento</option>
                                            <option value='finalizado' <?php echo $status_servico == 'finalizado' ? 'selected': ''?>>Finalizado</option>
                                        </select>
                                    </td>

                                        <input type='hidden' name='nome' value='<?php echo $nome ?>'>
                                        <input type='hidden' name='tipo_servico' value='<?php echo $tipo_servico ?>'>
                                        <input type='hidden' name='email' value='<?php echo $email ?>'>

                                        <input type='hidden' name='cpf' value='<?php echo $cpf ?>'>
                                        <input type='hidden' name='id' value='<?php echo $id ?>'>
                                    <td><input type='submit' class='btn btn-primary' value='Enviar' onclick="return confirm('Enviar e-mail notificando status de andamento do serviço?'); return false;"></td>
                                </tr>
                            </form>


                            <?php
                                    }
                                }else{
                                    echo "<b><p>Sem dados cadastrais!</p></b>";
                                }
                            ?>


                            <?php
                                if(!empty($_POST['id'])){

                                    $nome = $_POST['nome'];
                                    $tipo_servico = $_POST['tipo_servico'];
                                    $email = $_POST['email'];
                                    $status_servico = $_POST['status_servico'];
                                    $cpf = $_POST['cpf'];
                                    $data_final = date('Y-m-d');
                            
                                    $sql1 = "SELECT * FROM cliente,servico WHERE cliente.cpf = servico.cpf_servico AND servico.status_servico NOT IN ('finalizado','reprovado') ORDER BY id DESC";
                                    $result1 = mysqli_query($con,$sql1);
                            
                                    if(mysqli_num_rows($result1)>0){
                                        while($user1 = mysqli_fetch_assoc($result1)){

                                        //$sql2 = "UPDATE servico SET status_servico = '$status_servico' WHERE cpf_servico = '$cpf' AND id_servico = '$id'";
                                        $sql2 = "UPDATE cliente,servico SET servico.status_servico = '$status_servico', servico.data_final = '$data_final' WHERE cliente.cpf = '$cpf' AND servico.cpf_servico = '$cpf'";

                                        $_SESSION['nome'] = $nome;
                                        $_SESSION['tipo_servico'] = $tipo_servico;
                                        $_SESSION['email_cliente'] = $email;
                                        $_SESSION['status_servico'] = $status_servico;
                                        
                                        
                                        if(mysqli_query($con,$sql2)>0){
                                            header("Location: email/email2.php");
    
                                        }else{
                                            echo "Erro: ".mysqli_connect_error($con);
                                            
                                        }

                                        }      
                                    }
                                }
                            ?>

                        </tbody>
                    </table>
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