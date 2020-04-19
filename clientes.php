<?php
  require_once('process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administradores</title>
    <link rel="stylesheet" type="text/css" href="background.css">
</head>
<body>
<?php require_once('navbar.php')?>
<br>
<h2 class="text-center h1" style="color:#2334A2; text-shadow: 1.5px 1px 2px #525252;">Acceso Clientes</h2>
<br>
<section class="container">
<form action="process.php" method="POST">
  <?php
  if(@$_GET['Empty']==true){
  ?>
    <div class='alert alert-danger' role='alert'><?php echo $_GET['Empty']?></div>
  <?php
  }
  ?>
  <?php
  if(@$_GET['Invalid']==true){
  ?>
    <div class='alert alert-danger' role='alert'><?php echo $_GET['Invalid']?></div>
  <?php
  }
  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de Usuario</label>
    <input type="text" class="form-control" id="usuario" name="nom_usuario" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
  </div>
  <!--<div class="form-group">
    <label for="exampleInputEmail1">Codigo de Cliente</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introducir codigo">
    <small id="emailHelp" class="form-text text-muted">Llenar unicamente si ha recibido codigo de cliente</small>
  </div>-->
  <input type="submit" class="btn btn-primary" name="login" value="LogIn">
  <?php
 session_start();
 if(isset($_SESSION['User'])){
   echo "<a href='logout.php?logout' class='btn btn-warning'>LogOut</a>";
 }
?>
</form>
</section>
<br>
<section class="container">
<div class="card row">
  <div class="card-body col-12">
    <p class="card-text">
    Para poder realizar compras en la plataforma es necesario acceder a su cuenta. Si no tiene un usuario porfavor vaya a la pestaña de "Registro" para crear su usario.
    Todos los datos ingresados serán protegidos por Corpoh9 y no se conmpartiran con ninguna entidad externa.
    </p>
    <p class="card-text">
    Si su usario es incorrecto favor de verificarlo o de lo contrario contactenos a servicios@mail.com para atenderle de forma puntual.
    </p>
  </div>
</div>
</section>
<br>
<br>
<br>
<?php require_once('footer.html')?>
</body>
</html>