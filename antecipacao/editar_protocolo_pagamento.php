<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $id_servico=$_GET['id_servico'];
        $cpf=$_GET['cpf'];

        $id = $_GET['id'];
        $sql = "SELECT protocolo_pagamento FROM servico WHERE id_servico='$id_servico'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){
            
            while($user = mysqli_fetch_assoc($result)){
                $protocolo_pagamento = $user['protocolo_pagamento'];
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
    <title>Alterar protocolo de pagamento</title>
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
                    <div class="numbers"><h1>Inserir arquivo</h1></div>
                </div>
            </div>

            <div class="form1">
                <div class="form2">
                    <form action="salvar_protocolo_pagamento.php?id=<?php echo $id; ?>&id_servico=<?php echo $id_servico; ?>&cpf=<?php echo $cpf; ?>" method="POST" enctype="multipart/form-data">
                        <h2>Protocolo de pagamento</h2>
                
                        <div class="form-group">
                            <input type="file" name="protocolopagamento" id="protocolopagamento" class="form-control-file border" accept="image/*"><br>
                            <img src="../img/def.png" id="imagem" alt="" class='rounded' data-toggle="modal" data-target="#myModal" width="150px" height="150px">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="alterar" id="alterar" class="btn btn-success" value="Alterar">
                            <?php echo"<a href='upload_antecipacao.php?id=$id&id_servico=$id_servico&cpf=$cpf'><input type='button' value='Voltar' class='btn btn-primary'></a>";?>
                        </div>
                    </form>
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

<script>
    var imagem = document.querySelector('[name=protocolopagamento]')
    
    imagem.addEventListener('change', e =>{

        var file = e.target.files[0]
        var fileReader = new FileReader()

        fileReader.onloadend = () => {
            document.querySelector('#imagem').setAttribute('src',fileReader.result)
        }

        fileReader.readAsDataURL(file) 

    })
</script>

</body>
</html>