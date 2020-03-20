<?php
session_start();
require_once('connect.php');

$username = $_POST['nom_usuario'];
$pw = $_POST['password'];

if(isset($_POST['login'])){
    if(empty($username) || empty($pw)){
        header("location:clientes.php?Empty=Favor de llenar el Login");
    }else{
        $sql = "SELECT * FROM registros WHERE nom_usuario = '$username' AND password='$pw'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_fetch_assoc($result)){
            $_SESSION['User'] = $_POST['nom_usuario'];
            header("location:index.php?Bienvenido=".$_SESSION['User']);
        }else{
            header("location:clientes.php?Invalid=Introduzca Usuario Correcto");
        }
    }
}else{
    echo "<script>console.log('Fatal!')</script>";
}
?>