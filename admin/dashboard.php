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
</head>
<body>
<?php require_once('admin_navbar.php')?>

<div class="container">
<br>
  <h5 class="h3">Bienvenido<?php echo $_SESSION['email'];?></h5>
<br>
<div class="card">
  <div class="card-header">
    Base de datos Usuarios
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="database.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<br>
<div class="card">
  <div class="card-header">
    Gestión de Productos
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="productsdb.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<br>
<div class="card">
  <div class="card-header">
    Gestión de Clientes
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="clientesdb.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<br>
<div class="card">
  <div class="card-header">
    Controll de Administradores
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="admindb.php" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
<br>
</body>
</html>