<?php
session_start();
require_once('connect.php');

  if(isset($_POST['login'])){
      $username = $_POST["usuario"];
      $password = $_POST["password"];

      $query = "SELECT * FROM administradores WHERE email='$username' AND password='$password'";

      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
              if($row["email"]){
                  $_SESSION['email'];
                  header('Location:admin/dashboard.php');
              }
          }
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>Acceso negado, verifique la información</div>";
          //header('Location:login.php');
      }
  }
  echo $role;
?>