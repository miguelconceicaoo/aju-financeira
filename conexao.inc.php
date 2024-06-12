<?php
    $con = mysqli_connect("localhost:3307","root","","banco_aju");

    if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    }
?>