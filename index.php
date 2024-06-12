<?php
    include_once("conexao.inc.php"); 
    include("protect.php");
    ob_start();

    //COUNT 
    $query_total = "SELECT COUNT(id) AS cli FROM cliente";
    $result_total = mysqli_query($con,$query_total);
    $user_total = mysqli_fetch_assoc($result_total);
    $total = $user_total['cli'];
    //echo "Total: ".$total['cli'];

    //ÚLTIMOS 30 DIAS
    $sql_dias = "SELECT * FROM servico WHERE status_servico = 'finalizado' ORDER BY id_servico DESC";
    $result_dias = mysqli_query($con,$sql_dias);
    $cont_dias = 0;
    
    while($user_dias = mysqli_fetch_assoc($result_dias)){

        $hoje = date('Y-m-d');
        $banco = $user_dias['data_cadastro'];

        $hoje = strtotime($hoje);
        $banco = strtotime($banco);

        $diferenca = $hoje-$banco;

        $dias = (int)floor($diferenca / (60 * 60 * 24));
    
        if($dias < 31){
            $cont_dias = $cont_dias+1;
            //echo $cont_dias.'<br>';
        }        
    }

    //MAIS FEITO
    $query_emp = "SELECT COUNT(id_servico) AS serv_emp FROM servico WHERE tipo_servico = 'emprestimo'";
    $result_emp = mysqli_query($con,$query_emp);
    $user_emp = mysqli_fetch_assoc($result_emp);
    $total_emp = $user_emp['serv_emp'];
    //echo $total_emp."<br>"; 

    $query_finan = "SELECT COUNT(id_servico) AS serv_finan FROM servico WHERE tipo_servico = 'financiamento'";
    $result_finan = mysqli_query($con,$query_finan);
    $user_finan = mysqli_fetch_assoc($result_finan);
    $total_finan = $user_finan['serv_finan'];
    //echo $total_finan."<br>";

    $query_refinan = "SELECT COUNT(id_servico) AS serv_refinan FROM servico WHERE tipo_servico = 'refinanciamento'";
    $result_refinan = mysqli_query($con,$query_refinan);
    $user_refinan = mysqli_fetch_assoc($result_refinan);
    $total_refinan = $user_refinan['serv_refinan'];
    //echo $total_refinan."<br>";

    $query_ante = "SELECT COUNT(id_servico) AS serv_ante FROM servico WHERE tipo_servico = 'antecipacao'";
    $result_ante = mysqli_query($con,$query_ante);
    $user_ante = mysqli_fetch_assoc($result_ante);
    $total_ante = $user_ante['serv_ante'];
    //echo $total_ante."<br>";

    if($total_emp>$total_finan and $total_emp>$total_refinan and $total_emp>$total_ante){
        $mais_feito = 'empréstimo';

    }else if($total_finan>$total_emp and $total_finan>$total_refinan and $total_finan>$total_ante){
        $mais_feito = 'financiamento';

    }else if($total_refinan>$total_emp and $total_refinan>$total_finan and $total_refinan>$total_ante){
        $mais_feito = 'refinanciamento';

    }else if($total_ante>$total_emp and $total_ante>$total_finan and $total_ante>$total_refinan){
        $mais_feito = 'antecipação';

    }else{
        $mais_feito = 'N° de serviços igual';
    }

    //echo $mais_feito;

    if($total_emp<$total_finan and $total_emp<$total_refinan and $total_emp<$total_ante){
        $menos_feito = 'empréstimo';

    }else if($total_finan<$total_emp and $total_finan<$total_refinan and $total_finan<$total_ante){
        $menos_feito = 'financiamento';

    }else if($total_refinan<$total_emp and $total_refinan<$total_finan and $total_refinan<$total_ante){
        $menos_feito = 'refinanciamento';

    }else if($total_ante<$total_emp and $total_ante<$total_finan and $total_ante<$total_refinan){
        $menos_feito = 'antecipação';

    }else{
        $menos_feito = 'N° de serviços igual';
    }

    //echo $menos_feito;

?>

<!DOCTYPE html>
<html lang="pt-br">
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

                <!--search-->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Pesquise aqui">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                
                <!--userImg-->
                <div class="user">
                    <img src="img/user.jpg" alt="">
                </div>
            </div>

            <div class="box">
                <div class="title">
                    <div class="numbers"><h3>Painel de controle</h3></div>
                </div>
            </div>

            <!--cards-->

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $total ?></div>
                        <div class="cardName">Clientes cadastrados</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $cont_dias ?></div>
                        <div class="cardName">Serviços realizados nos últimos 30 dias</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="calendar-number-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $mais_feito ?></div>
                        <div class="cardName">Serviço mais requisitado</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="trending-up-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $menos_feito ?></div>
                        <div class="cardName">Serviço menos requisitado</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="trending-down-outline"></ion-icon>
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
                                            $status_servico = $user['status_servico'];
                                            $id_servico = $user['id_servico'];
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