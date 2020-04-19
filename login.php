<?php 
  include("sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administradores</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <style>
      #gif{
        height: 200px;
        width: 300;
      }
    </style>
</head>
<body>
<?php require_once('navbar.php')?>
<br>
<h2 class="text-center h1" style="color:#2334A2; text-shadow: 1.5px 1px 2px #525252;">Acceso de Administradores</h2>
<br>
<div class="container">
  <div class="row">
    <div class="col-2"></div>
    <img src="img/delivery_truck.gif" id="gif" class="col-8" alt="">
  </div>
</div>
<br>
<section class="container">
<?php echo $msg ?>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">Acceso unicamente para administradores de corpoh8</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"  name="password" placeholder="Password">
  </div>
  <br>
  <input type="submit" class="btn btn-primary" name="login" value="Entrar">
</form>
</section>
<br>
<?php require_once('footer.html')?>
</body>
</html>