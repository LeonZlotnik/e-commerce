<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:index.php');
    }else{
        header('location:clientes.php');
    }
?>