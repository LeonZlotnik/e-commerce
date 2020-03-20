<?php

if(isset($_POST['create'])){

$target1 = "../admin/images".basename($_FILES['imagen1']['name']);
$target2 = "../admin/images".basename($_FILES['imagen2']['name']);
$target3 = "../admin/images".basename($_FILES['imagen3']['name']);


$product = $_POST['nombre_producto'];
$category = $_POST['categoria'];
$subcategory = $_POST['subcategoria'];
$price = $_POST['costo_ecom'];
$image1 = $_FILES['imagen1']['name'];
$image2 = $_FILES['imagen2']['name'];
$image3 = $_FILES['imagen3']['name'];
$desc = $_POST['descripcion'];
$ext = $_POST['extension'];

$conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
mysqli_set_charset($conn, "utf8");

$sql = "INSERT INTO products (nombre_producto, categoria, subcategoria, costo_ecom, imagen1, imagen2, imagen3, descripcion, extension) VALUES ('$product','$category','$subcategory','$price','$image1','$image2','$image3','$desc',$ext);";
$result = mysqli_query($conn, $sql) or die ("error en query $sql".mysqli_error());


if(move_uploaded_file($_FILES['imagen1']['tmp_name'],$target1)){
  echo "Success";
}else{
  echo "<script>console.log('Error de carga')</script>";
}

if(move_uploaded_file($_FILES['imagen2']['tmp_name'],$target2)){
    echo "Success";
  }else{
    echo "<script>console.log('Error de carga')</script>";
  }

  if(move_uploaded_file($_FILES['imagen3']['tmp_name'],$target3)){
    echo "Success";
  }else{
    echo "<script>console.log('Error de carga')</script>";
  }


if($result){
  echo "Success!";
}else{
  echo "<script type='text/javascript'>alert('Se ha generado un error');</script>";
};

mysqli_free_result($result);
mysqli_close($conn);

header('Location:productsdb.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
</head>
<body>
<?php require_once('admin_navbar.php')?>
<br>
<h2 class="text-center">Test Products</h2>
<br>
<section class="container">
<form method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <label for="inputAddress2">Nombre de Producto:</label>
    <input type="text" class="form-control" id="inputAddress2" name="nombre_producto" placeholder="Inrtoduce nombre">
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Categoría:</label>
      <select id="inputState" class="form-control" name="categoria">
        <option value="null">--</option>
        <option value="Papeleria">Papelería</option>
        <option value="Consumibles">Consumibles</option>
        <option value="Materiales">Materiales</option>
        <option value="Equipos">Equipos</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Sub Categoría:</label>
      <input type="text" class="form-control" id="inputPassword4" name="subcategoria" placeholder="Inrtoduce subcategoria">
    </div>
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Costo:</label>
      <input type="number" step="0.01" min="0" max="200" class="form-control"  name="costo_ecom" id="inputCity" placeholder="0.00">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Imagen1:</label>
      <input type="file" class="form-control" name="imagen1" id="inputZip">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Imagen2:</label>
      <input type="file" class="form-control" name="imagen2" id="inputZip">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Imagen3:</label>
      <input type="file" class="form-control" name="imagen3" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Especificaciones</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="extension" rows="3"></textarea>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <a href="productsdb.php" class="btn btn-primary">Regresar</a>
  <input class="btn btn-primary" type="submit" name="create" value="Crear" id="gridCheck">
</form>
</section>
<br>
</body>
</html>