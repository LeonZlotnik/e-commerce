<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creacion de admin</title>
</head>
<body>
<?php require_once('admin_navbar.php')?>
<br>
<h2 class="text-center">Crear Administrador</h2>
<br>
<section class="container">
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre:</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Inrtoduce nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido:</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Inrtoduce apellido">
    </div>
  </div>
  <br>
  <div class="form-row">
    <label for="inputAddress2">Email:</label>
    <input type="email" class="form-control" id="inputAddress2" placeholder="Inrtoduce email">
  </div>
  <br>
  <div class="form-row">
    <label for="inputAddress2">Contraseña:</label>
    <input type="password" class="form-control" id="inputAddress2" placeholder="Inrtoduce contraseña">
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
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
</section>
<br>
</body>
</html>