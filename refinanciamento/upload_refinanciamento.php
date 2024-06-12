<?php
ob_start();
    include("../protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/aju.ico">
    <title>Upload de arquivos</title>
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    
    <style>
        .rounded{
            cursor: pointer;
            border: 1px solid transparent;
        }
        .rounded:hover{
            cursor: pointer;
            border: 3px solid #287bff;    
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
                    <div class="numbers"><h1>Upload de arquivos</h1></div>
                </div>
            </div>

        <div class="form1">
            <div class="form2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Carteira de identidade - Frente</th>
                            <th>Carteira de identidade - Verso</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        <?php
                            if(!empty($_GET['id'])){
                                include_once ("../conexao.inc.php");
                                $cpf=$_GET['cpf'];
                                $id_servico=$_GET['id_servico'];

                                $id = $_GET['id'];
                                $sql = $sql = "SELECT identidade_frente, identidade_verso, cnh, nota_fiscal FROM cliente,servico WHERE cliente.id='$id' and servico.id_servico='$id_servico'";
                                $result = mysqli_query($con,$sql);

                                if(mysqli_num_rows($result)>0){
                                    
                                    while($user = mysqli_fetch_assoc($result)){
                                        $identidade_frente = $user['identidade_frente'];
                                        $identidade_verso = $user['identidade_verso'];
                                        $nota_fiscal = $user['nota_fiscal'];
                                        $cnh = $user['cnh'];

                                    echo"<tr>";
                                    echo"<td>";
                                        echo "<img src='".$identidade_frente."' alt='Nenhum arquivo inserido' width='300px' heigth='300px' class='rounded' data-toggle='modal' data-target='#myModal'><br><br>";
                                        echo"<a href='editar_identi_frente.php?id=$id&id_servico=$id_servico&cpf=$cpf''><button class='btn-sm btn-outline-primary'>Editar</button></a> "; 
                                        echo"<a href='excluir_identi_frente.php?id=$id&id_servico=$id_servico&cpf=$cpf' onclick=\"return confirm('Tem certeza que deseja deletar essa imagem?'); return false;\"><button class='btn-sm btn-outline-danger'>Excluir</button></a>";  
                                    echo"</td>";

                                    echo"<td>";
                                        echo "<img src='$identidade_verso' alt='Nenhum arquivo inserido' width='300px' heigth='300px' class='rounded' data-toggle='modal' data-target='#myModal1'><br><br>";
                                        echo"<a href='editar_identi_verso.php?id=$id&id_servico=$id_servico&cpf=$cpf'><button class='btn-sm btn-outline-primary'>Editar</button></a> ";
                                        echo"<a href='excluir_identi_verso.php?id=$id&id_servico=$id_servico&cpf=$cpf' onclick=\"return confirm('Tem certeza que deseja deletar essa imagem?'); return false;\"><button class='btn-sm btn-outline-danger'>Excluir</button></a>"; 
                                    echo"</td>";
                                    echo"</tr>";
                                    
                                    //---------------------------------------------------------------

                                    echo"<tr>";
                                        echo"<th>CNH - Carteira nacional de habilitação</th>";
                                        echo"<th>Nota fiscal</th>";
                                    echo"</tr>";

                                    echo"<tr>";
                                    echo"<td>";
                                        echo "<img src='".$cnh."' alt='Nenhum arquivo inserido' width='300px' heigth='300px' class='rounded' data-toggle='modal' data-target='#myModal2'><br><br>";
                                        echo"<a href='editar_cnh.php?id=$id&id_servico=$id_servico&cpf=$cpf'><button class='btn-sm btn-outline-primary'>Editar</button></a> "; 
                                        echo"<a href='excluir_cnh.php?id=$id&id_servico=$id_servico&cpf=$cpf' onclick=\"return confirm('Tem certeza que deseja deletar essa imagem?'); return false;\"><button class='btn-sm btn-outline-danger'>Excluir</button></a>";  
                                    echo"</td>";

                                    echo"<td>";
                                        echo "<img src='$nota_fiscal' alt='Nenhum arquivo inserido' width='300px' heigth='300px' class='rounded' data-toggle='modal' data-target='#myModal3'><br><br>";
                                        echo"<a href='editar_nota_fiscal.php?id=$id&id_servico=$id_servico&cpf=$cpf'><button class='btn-sm btn-outline-primary'>Editar</button></a> ";
                                        echo"<a href='excluir_nota_fiscal.php?id=$id&id_servico=$id_servico&cpf=$cpf' onclick=\"return confirm('Tem certeza que deseja deletar essa imagem?'); return false;\"><button class='btn-sm btn-outline-danger'>Excluir</button></a>"; 
                                    echo"</td>";
                                    echo"</tr>";

                                    }

                                }else{
                                    header("Location: upload_refinanciamento.php");      
                                }   
                            }
                        ?>
                    </tbody>
                </table>

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
          <img src="<?php echo $identidade_frente?>" alt="" id="imgmodal" width="100%" height="100%">
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
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="btn btn-Light" data-dismiss="modal"></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo $identidade_verso?>" alt="" id="imgmodal" width="100%" height="100%">
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
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="btn btn-Light" data-dismiss="modal"></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo $cnh?>" alt="" id="imgmodal" width="100%" height="100%">
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
  <div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="btn btn-Light" data-dismiss="modal"></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img src="<?php echo $nota_fiscal?>" alt="" id="imgmodal" width="100%" height="100%">
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


