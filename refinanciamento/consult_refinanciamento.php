<?php
    include("../protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/aju.ico">
    <title>Consultar dados refinanciamento</title>
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
                    <div class="numbers"><h1>Clientes cadastrados - Refinanciamento</h1></div>   
                </div>
            </div>
    
            <div class="search1">
                <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>

            <div class="tab1">
                <div class="tab2">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">RG</th>
                                <th scope="col">Placa do veículo</th>
                                <th scope="col">Modelo do veículo</th>
                                
                                <th scope="col">Data de cadastro</th>
                                <th colspan="4" >...</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                include_once("../conexao.inc.php"); 

                                

                                if(!empty($_GET['search'])){
                                    $data = $_GET['search'];
                                    $sql = "SELECT * FROM cliente,servico,veiculo WHERE servico.tipo_servico='refinanciamento' and cliente.cpf=servico.cpf_servico and cliente.cpf=veiculo.cpf_veiculo and (cliente.id LIKE '%$data%' or cliente.nome LIKE '%$data%' or cliente.cpf LIKE '%$data%') GROUP BY veiculo.placa_veiculo ORDER BY cliente.id DESC";                    

                                }else{
                                    $sql = "SELECT * FROM cliente,servico,veiculo where servico.tipo_servico='refinanciamento' and cliente.cpf=servico.cpf_servico and cliente.cpf=veiculo.cpf_veiculo GROUP BY veiculo.placa_veiculo ORDER BY cliente.id DESC";

                                }
                                
                                $result = mysqli_query($con,$sql);

                                while($user = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$user['id']."</td>";
                                    echo "<td>".$user['nome']."</td>";
                                    echo "<td>".$user['cpf']."</td>";
                                    echo "<td>".$user['rg']."</td>";
                                    echo "<td>".$user['placa_veiculo']."</td>";
                                    echo "<td>".$user['modelo_veiculo']."</td>";
                                    
                                    echo "<td>".date('d/m/Y', strtotime($user['data_cadastro']))."</td>";
                                    echo"<td>
                                        <a href='visualizar_refinanciamento.php?id=$user[id]&id_veiculo=$user[id_veiculo]&id_servico=$user[id_servico]&cpf=$user[cpf]'>
                                        <button type='button' class='btn-sm btn-outline-primary'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                            </svg>
                                        </button>
                                        </a>
                                        </td>";
                                    echo "<td>
                                        <a href='editar_refinanciamento.php?id=$user[id]&id_veiculo=$user[id_veiculo]&id_servico=$user[id_servico]&cpf=$user[cpf]'>
                                        <button type='button' class='btn-sm btn-outline-warning'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                            </svg>
                                        </button>
                                        </a>
                                        </td>";
                                    echo"<td>
                                        <a href='excluir_refinanciamento.php?id=$user[id]&id_veiculo=$user[id_veiculo]&id_servico=$user[id_servico]&cpf=$user[cpf]' onclick=\"return confirm('Tem certeza que deseja deletar esse registro?'); return false;\">
                                        <button type='button' class='btn-sm btn-outline-danger'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                            </svg>
                                        </button>                        
                                        </a>
                                        </td>";
                                    echo"<td>
                                        <a href='upload_refinanciamento.php?id=$user[id]&id_veiculo=$user[id_veiculo]&id_servico=$user[id_servico]&cpf=$user[cpf]'>
                                        <button type='button' class='btn-sm btn-outline-success'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-bar-graph' viewBox='0 0 16 16'>
                                                <path d='M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z'/>
                                                <path d='M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z'/>
                                            </svg>
                                        </button>                        
                                        </a>
                                        </td>";
                                    echo"</tr>";
                                }  
                            ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>  
    </div>
</body>

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
        window.location = 'consult_financiamento.php?search='+search.value;
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