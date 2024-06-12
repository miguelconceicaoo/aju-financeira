<?php
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/aju.ico">
    <title>Consultar dados empréstimo</title>
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
                    <div class="numbers"><h1>Adicionar serviço - Antecipação de FGTS</h1></div>
                </div>
            </div>

            <!--SEARCH-->
            <div class="search1">
                <input type="search" class="form-control w-25" placeholder="Pesquisar por cliente" id="pesquisar">
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
                               
                               
                               
                                
                                <th scope="col">Adicionar serviço</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                include_once("../conexao.inc.php"); 
                                
                                $sql = "SELECT * FROM cliente where cliente.cpf=conta.cpf_conta ORDER BY id DESC";
                                $result = mysqli_query($con,$sql);

                                if(!empty($_GET['search'])){
                                    $data = $_GET['search'];
                                    $sql = "SELECT * FROM cliente WHERE     id LIKE '%$data%' or nome LIKE '%$data%' or cpf LIKE '%$data%' GROUP BY id";                    

                                }else{
                                    $sql = "SELECT * FROM cliente  GROUP BY id ORDER BY id desc";

                                }
                                    $result = mysqli_query($con,$sql);

                                while($user = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$user['id']."</td>";
                                    echo "<td>".$user['nome']."</td>";
                                    echo "<td>".$user['cpf']."</td>";
                                    echo "<td>".$user['rg']."</td>";
                                    
                                    
                                    
                                   
                                    echo"<td>
                                        <a href='adicionar_antecipacao.php?id=$user[id]&cpf=$user[cpf]'>
                                        <button type='button' class='btn-sm btn-outline-primary'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z'/>
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
        window.location = 'consult_adicionar_antecipacao.php?search='+search.value;
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