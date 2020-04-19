<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
      body{
      background-image: url("images/background/post-it-wall.png");
      }
    </style>
</head>
<body>
<?php require_once('admin_navbar.php')?>

<div class="container">
<br>
  <h5 class="h3" style="color: white;"><strong>Bienvenido al Control de Administradores</h5>
<br>
<div class="card">
  <div class="card-header">
  <i class="fas fa-database"></i>
  </div>
  <div class="card-body">
    <h5 class="card-title">Base de datos de Usuarios</h5>
    <p class="card-text">Aquí se encuentra toda la informaciónde los usuarios que han creado su cuenta.</p>
    <a href="database.php" class="btn btn-primary">Revisar</a>
  </div>
</div>
<br>
<div class="card">
  <div class="card-header">
  <i class="fas fa-boxes"></i>
  </div>
  <div class="card-body">
    <h5 class="card-title">Gestión de Productos</h5>
    <p class="card-text">Crear, editar y borrar los productos que se requieran.</p>
    <a href="productsdb.php" class="btn btn-primary">Revisar</a>
  </div>
</div>
<br>
<div class="card">
  <div class="card-header">
  <i class="fas fa-user-lock"></i>
  </div>
  <div class="card-body">
    <h5 class="card-title">Controll de Administradores</h5>
    <p class="card-text">Para tener más control los administradores tienen que tener un control.</p>
    <a href="admindb.php" class="btn btn-primary">Revisar</a>
  </div>
  </div>
  <br>
  <div class="card">
  <div class="card-header">
  <i class="fas fa-tags"></i>
  </div>
  <div class="card-body">
    <h5 class="card-title">Monitoreo de Ordenes</h5>
    <p class="card-text">Aquí se pueden ver todas los productos comprados</p>
    <a href="ordenes.php" class="btn btn-primary">Revisar</a>
  </div>
</div>
</div>
<br>


</div>
</body>
</html>