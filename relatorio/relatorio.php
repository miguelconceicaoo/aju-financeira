<?php
    //include("protect.php");
    include_once("../conexao.inc.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/aju.ico">
    <title>Relatório de prestação de serviços</title>
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <style>
        .cor{
            color:red;
        }
    </style>

    <style>
        .logo_relatorio{
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            justify-content: right;
            float: right;
            margin-right:30px;
        }

    .logo_relatorio img{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        justify-content: right;
    }

    </style>
</head>

<body>
    <div class="">
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
                    <div class="numbers"><h1>Relatório de prestação de serviços</h1></div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">

                    <form action="" method="POST"> 
                        <label for="inicial">Data inicial:</label>
                        <input type="date" name="inicial" id="inicial">

                        <label for="final">Data final:</label>
                        <input type="date" name="final" id="final"><br><br>

                        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar" class="btn btn-outline-primary">
                        <hr style="border: none;height: 1px;background: gray;">
                    </form>


                    <?php
                        include_once("../conexao.inc.php");

                        if(!empty($_POST['pesquisar'])){

                            $inicial = $_POST['inicial'];
                            $final = $_POST['final'];

                            $result = mysqli_query($con, "SELECT * FROM cliente,servico WHERE cliente.cpf = servico.cpf_servico 
                            AND servico.data_cadastro >= '$inicial' AND servico.data_cadastro <= '$final' AND servico.status_servico = 'finalizado' ORDER BY id_servico DESC");

                                      
                            //CONTADOR
                            $query_emp = "SELECT COUNT(id_servico) AS serv_emp FROM servico WHERE tipo_servico = 'emprestimo' AND status_servico = 'finalizado' 
                            AND servico.data_cadastro >= '$inicial' AND servico.data_cadastro <= '$final'";

                            $result_emp = mysqli_query($con,$query_emp);
                            $user_emp = mysqli_fetch_assoc($result_emp);
                            $total_emp = $user_emp['serv_emp'];

                            $query_finan = "SELECT COUNT(id_servico) AS serv_finan FROM servico WHERE tipo_servico = 'financiamento' AND status_servico = 'finalizado'
                            AND servico.data_cadastro >= '$inicial' AND servico.data_cadastro <= '$final'";

                            $result_finan = mysqli_query($con,$query_finan);
                            $user_finan = mysqli_fetch_assoc($result_finan);
                            $total_finan = $user_finan['serv_finan'];

                            $query_refinan = "SELECT COUNT(id_servico) AS serv_refinan FROM servico WHERE tipo_servico = 'refinanciamento' AND status_servico = 'finalizado'
                            AND servico.data_cadastro >= '$inicial' AND servico.data_cadastro <= '$final'";

                            $result_refinan = mysqli_query($con,$query_refinan);
                            $user_refinan = mysqli_fetch_assoc($result_refinan);
                            $total_refinan = $user_refinan['serv_refinan'];

                            $query_ante = "SELECT COUNT(id_servico) AS serv_ante FROM servico WHERE tipo_servico = 'antecipacao' AND status_servico = 'finalizado'
                            AND servico.data_cadastro >= '$inicial' AND servico.data_cadastro <= '$final'";

                            $result_ante = mysqli_query($con,$query_ante);
                            $user_ante = mysqli_fetch_assoc($result_ante);
                            $total_ante = $user_ante['serv_ante'];


                            $total = $total_emp+$total_finan+$total_refinan+$total_ante;

                            if($total>0){
                        
                            $percentual_emp = ($total_emp*100)/$total;
                            //echo $percentual_emp." % <br>";

                            $percentual_finan = ($total_finan*100)/$total;
                            //echo $percentual_finan." % <br>";

                            $percentual_refinan = ($total_refinan*100)/$total;
                            //echo $percentual_refinan." % <br>";

                            $percentual_ante = ($total_ante*100)/$total;
                            //echo $percentual_ante." % <br>";

                            }else{
                                echo "<h4 class='cor'><b>Nenhum serviço realizado nesse período!</b></h4>";

                                $percentual_emp = 0;
    
                                $percentual_finan = 0;
    
                                $percentual_refinan = 0;
    
                                $percentual_ante = 0;
                            }

                    ?>

                <div id="pdf">
                    <table class="table table-striped" style="text-align:left;">
                        <thead>
                            
                            <div class="logo_relatorio" style="position: relative;width: 200px;height: 200px;border-radius: 50%;overflow: hidden;cursor: pointer;justify-content: right;float: right;margin-right:20px;">
                                <img src="../img/aju.jpeg" alt="" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;object-fit: cover;justify-content: right;">
                            </div>
                            <br><br><br><br>

                            <h1>Relatório de prestação de serviços</h1><br><br>
                            <h5>Data de emissão: <?php echo date('d/m/Y',strtotime(date('Y-m-d'))) ?></h5>
                            <h5>Período:<?php echo " ".date('d/m/Y',strtotime(date($inicial)))." a ".date('d/m/Y',strtotime(date($final))) ?></h5>

                            <tr style="background-color:#287bff; color:#fff;">
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">RG</th>
                                <th scope="col">Tipo de serviço</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone celular</th>
                                <th scope="col">Data de cadastro</th>
                                <th scope="col">Data de término</th>
                            </tr>
                        </thead>
                        
                        <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
                        <br><br><br><br><br>

                        <h5>Empréstimo:<?php echo " ".$total_emp." - ".number_format(($percentual_emp),2,",",".")."%"; ?></h5>
                        <h5>Financiamento:<?php echo " ".$total_finan." - ".number_format(($percentual_finan),2,",",".")."%"; ?></h5>
                        <h5>Refinanciamento:<?php echo " ".$total_refinan." - ".number_format(($percentual_refinan),2,",",".")."%"; ?></h5>
                        <h5>Antecipação:<?php echo " ".$total_ante." - ".number_format(($percentual_ante),2,",",".")."%"; ?></h5>
                        <br>

                        <h5>Clientes cadastrados:</h5>
                        <tbody>
                            <?php
                                while($user = mysqli_fetch_assoc($result)){
                                    
                                    echo "<tr>";
                                    echo "<td>".$user['nome']."</td>";
                                    echo "<td>".$user['cpf']."</td>";
                                    echo "<td>".$user['rg']."</td>";
                                    echo "<td>".$user['tipo_servico']."</td>";
                                    echo "<td>".$user['email_cliente']."</td>";
                                    echo "<td>".$user['telefone']."</td>";
                                    echo "<td>".date('d/m/Y', strtotime($user['data_cadastro']))."</td>";
                                    echo "<td>".date('d/m/Y', strtotime($user['data_final']))."</td>";
                                    echo "</tr>";
                                }

                            ?>

                        </tbody>
                    </table>
                </div>
                    </div>

                    <button class="btn btn-success" onclick="funcao_pdf()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Gerar
                    </button> 

                    <?php } ?>

                </div> 
        </div>  
    </div> 
</body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Percentual", { role: "style" } ],
        ["Empréstimo", <?php echo $percentual_emp?>, "blue"],
        ["Financiamento", <?php echo $percentual_finan  ?>, "yellowgreen"],
        ["Refinanciamento", <?php echo $percentual_refinan ?>, "gold"],
        ["Antecipação", <?php echo $percentual_ante ?>, "color: DeepSkyBlue"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Gráfico quantitativo de serviços realizados (%)",
        width: 700,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
</script>

<script>
    function funcao_pdf(){
        var pegar_dados = document.getElementById('pdf').innerHTML;

        var janela = window.open('','','width=800,height=800');
        
        janela.document.write('<html><head>');
        janela.document.write('<title>PDF</title></head>');
        janela.document.write('<body>');
        janela.document.write(pegar_dados);
        janela.document.write('</body></html>');
        janela.document.close();
        janela.print();
    }
</script>    

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if(event.key === "Enter"){
            searchData();
        }
    });

    function searchData(){
        window.location = 'consult_emprestimo.php?search='+search.value;
    }
</script>

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
</html>