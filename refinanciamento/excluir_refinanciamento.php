<?php
    include("../protect.php");
    
    if(!empty($_GET['id'])){
        include_once ("../conexao.inc.php");
        $id_veiculo=$_GET['id_veiculo'];

        $id_servico = $_GET['id_servico'];

        $id = $_GET['id'];
        $sql = "SELECT * FROM cliente WHERE id='$id'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){
            $sql1 = "DELETE FROM cliente WHERE id=$id";
            $aql="DELETE FROM servico WHERE id_servico=$id_servico";
            $bql="DELETE FROM veiculo WHERE id_veiculo=$id_veiculo";

            $result1 = mysqli_query($con,$sql1);
            $result2 = mysqli_query($con,$aql);
            $result3 = mysqli_query($con,$bql);
            header("Location:consult_refinanciamento.php");
        }     
    }
?>