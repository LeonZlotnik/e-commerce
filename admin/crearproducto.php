<?php
//Creación de Producto
if(isset($_POST['create'])){

$target = "../admin/images".basename($_FILES['imagenes']['name']);

$product = $_POST['nombre_producto'];
$category = $_POST['categoria'];
$subcategory = $_POST['subcategoria'];
$price = $_POST['costo'];
$images = $_FILES['imagenes']['name'];
$desc = $_POST['descripcion'];
$ext = $_POST['extension'];

$conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
mysqli_set_charset($conn, "utf8");

$sql = "INSERT INTO productos (nombre_producto, categoria, subcategoria, costo, imagenes, descripcion, extension) VALUES ('$product','$category','$subcategory','$price','$images','$desc','$ext');";
$result = mysqli_query($conn, $sql) or die ("error en query $sql".mysqli_error());


if(move_uploaded_file($_FILES['imagenes']['tmp_name'],$target)){
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
//Edición de Producto

$id = 0;
$update = false;

if(isset($_GET['edit'])){
    $conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
    mysqli_set_charset($conn, "utf8");

    $id = $_GET['edit'];
    $update = true;
    $query = "SELECT * FROM productos WHERE id_producto = '$id'";
    $result = mysqli_query($conn, $query) or die ("error en query $query".mysqli_error());
   if(count($result)==1){
      $row = $result->fetch_array();
      $product = $row['nombre_producto'];
      $category = $row['categoria'];
      $subcategory = $row['subcategoria'];
      $price = $row['costo'];
      $images = $row['imagenes'];
      $desc = $row['descripcion'];
      $ext = $row['extension'];
   };


if(isset($_POST['update'])){
  //$conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
  //mysqli_set_charset($conn, "utf8");

  $new_target = "../admin/images".basename($_FILES['imagenes']['name']);
  
  $new_product = $_POST['nombre_producto'];
  $new_category = $_POST['categoria'];
  $new_subcategory = $_POST['subcategoria'];
  $new_price = $_POST['costo'];
  $new_images = $_FILES['imagenes']['name'];
  $new_desc = $_POST['descripcion'];
  $new_ext = $_POST['extension'];

  $mysql = ("UPDATE productos SET nombre_producto= '$new_product', categoria= '$new_category', subcategoria= '$new_subcategory', costo= '$new_price', imagenes= '$new_images', descripcion= '$new_desc', extension= '$new_ext' WHERE id_producto='$id'");

  $res = mysqli_query($conn, $mysql) or die ("error en query $mysql".mysqli_error());

  if($res){
    echo "Success!";
  }else{
    echo "<script type='text/javascript'>alert('Se ha generado un error');</script>";
  };
  
  mysqli_free_result($mysql);
  mysqli_close($conn);

  header('Location:productsdb.php');
};

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    <link rel="stylesheet" type="text/css" href="admin_controll.css">
</head>
<body>
<?php require_once('admin_navbar.php')?>
<br>
<h2 class="text-center">Crear Producto</h2>
<br>
<section class="container">
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id_producto" value="<?php echo $id;?>">
  <div class="form-row">
    <label for="inputAddress2">Nombre de Producto:</label>
    <input type="text" class="form-control" id="inputAddress2" name="nombre_producto" value="<?php echo $product;?>" placeholder="Inrtoduce nombre">
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Categoría:</label>
      <select id="inputState" class="form-control" name="categoria">
        <option value="<?php echo $category;?>"><?php echo $category;?></option>
        <option value="Papeleria">Papelería</option>
        <option value="Consumibles">Consumibles</option>
        <option value="Materiales">Materiales</option>
        <option value="Equipos">Equipos</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Subcategoría:</label>
      <select id="inputState" class="form-control" name="subcategoria">
        <option value="<?php echo $subcategory;?>"><?php echo $subcategory;?></option>
        <option value="PRAL">Principales</option>
        <option value="SEC">Secundarios</option>
        <option value="BSCO">Básicos</option>
        <option value="ESPO">Especializados</option>
      </select>
    </div>
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Costo:</label>
      <input type="number" step="0.01" min="0" max="10000" class="form-control"  name="costo" value="<?php echo $price;?>" id="inputCity" placeholder="0.00">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Imagenes:</label>
      <input type="file" class="form-control" name="imagenes" value="<?php echo $images;?>" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" value="<?php echo $desc;?>" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Especificaciones</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="extension" value="<?php echo $ext;?>" rows="3"></textarea>
  </div>
  <div class="form-group">
  </div>
  <a href="productsdb.php" class="btn btn-primary">Regresar</a>
  <?php if($update == true){?>
  <input class="btn btn-info" type="submit" name="update" value="Editar" id="gridCheck">
  <p><?php echo $mysql;?></p>
  <?php }else{?>
  <input class="btn btn-primary" type="submit" name="create" value="Crear" id="gridCheck">
  <?php }?>
</form>
</section>
<br>
</body>
</html>