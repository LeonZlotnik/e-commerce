<?php

  if(isset($_POST['create'])){

    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $email = $_POST['email'];
    $pw = $_POST['password'];
  
  $conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
  mysqli_set_charset($conn, "utf8");

  $sql = "INSERT INTO administradores (nombre, apellido, email, password) VALUES ('$name','$lastname','$email','$pw');";
  $result = mysqli_query($conn, $sql) or die ("error en query $sql".mysqli_error());

  if($result){
    echo "Success!";
  }else{
    echo "<script type='text/javascript'>alert('Se ha generado un error');</script>";
  };

  mysqli_free_result($result);
  mysqli_close($conn);
  
  header('Location:admindb.php');

};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creacion de admin</title>
    <link rel="stylesheet" type="text/css" href="admin_controll.css">
</head>
<body>
<?php require_once('admin_navbar.php')?>
<br>
<h2 class="text-center">Crear Administrador</h2>
<br>
<section class="container">
<form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre:</label>
      <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Inrtoduce nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido:</label>
      <input type="text" name="apellido"  class="form-control" id="inputPassword4" placeholder="Inrtoduce apellido">
    </div>
  </div>
  <br>
  <div class="form-row">
    <label for="inputAddress2">Email:</label>
    <input type="email" name="email"  class="form-control" id="inputAddress2" placeholder="Inrtoduce email">
  </div>
  <br>
  <div class="form-row">
    <label for="inputAddress2">Contraseña:</label>
    <input type="password" name="password"  class="form-control" id="inputAddress2" placeholder="Inrtoduce contraseña">
  </div>
  <br>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <a href="admindb.php" class="btn btn-primary">Regresar</a>
  <input type="submit" name="create" class="btn btn-primary" value="Crear">
</form>
</section>
<br>
</body>
</html>