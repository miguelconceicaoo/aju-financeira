<?php
    if(!isset($_SESSION)){
        session_start();
    }        

    if(!isset($_SESSION['id_adm'])){
        header("Location: login_index.php");        
    } 
?>
       
