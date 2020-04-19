<?php 
session_start();
require_once('process.php');

$db = mysqli_connect("localhost","root","root","copoh9");
if($db->connect_error){
    die("La Conexion Fallo: ".$db->connect_error);
}

    if(isset($_GET['ID'])){
        $ID = mysqli_real_escape_string($db, $_GET['ID']);
        $N = mysqli_real_escape_string($db, $_GET['nombre_producto']);

    $sql = "SELECT * FROM productos WHERE id_producto = $ID";
    $result = mysqli_query($db, $sql) or die("Error en Query: $sql". mysqli_error());
    $row = mysqli_fetch_array($result);

} else{
    echo "Error";
}

if(isset($_POST['add_to_cart'])){
  $username = $_POST["nom_usuario"];
  $product = $_POST["producto"];
  $price = $_POST["costo"];
  $amount = $_POST["cantidad"];

$sql = "INSERT INTO ordenes (nom_usuario, producto, costo, cantidad) VALUES ('$username','$product','$price','$amount')";

$result = mysqli_query($db, $sql) or die ("error en query $sql".mysqli_error());

if($result){
  $success = "<div class='alert alert-success' role='alert'>
        El producto fue agregado exitosamente!
        </div>";
}else{
  echo "<script type='text/javascript'>alert('No se pudo agregar articulo al carrito');</script>";
};

mysqli_free_result($result);
mysqli_close($conn);



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="background.css">
</head>
<style>
    #cantidad{
        display: contents;
    }

    #box-number{
        width: 0 5%;
        margin-right:3%;
    }

    .cart{
            position:fixed; top:90px; right:50px;
            transform: translateX(-50%);
            background: linear-gradient(to top, #232697, #0582AD );
            width: 50px;
            height: 50px;
            line-height: 55px;
            font-size: 22px;
            text-align: center;
            color: #fff;
            border-radius: 50%;
            cursor: pointer;
        }
    
    .cart a{
            color: white;
            position: relative; top: 12px;
        }
</style>
<body>
<?php require_once('navbar.php')?>
<br>

<div class="cart">
        <a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i></a>
</div>
<br>
<br>
 <section class="container">
    <div class="row">
        <div class="col-6">
            <div class="card bg-dark text-white" style="box-shadow: 5px 5px 8px grey;">
                <img class="card-img" <?php echo "src='admin/images/".$row['imagenes']."'";?> alt="Card image">      
            </div>
        </div>
          
        <div class="col-6">
            <h5 class="h3"><?php echo $row['nombre_producto']?></h5>
            <br>
            <label><strong>Description:</strong></label>
            <p><?php echo $row['descripcion']?></p>
            <br>
            <label><strong>Especifications:</strong></label>
            <p><?php echo $row['extension']?></p>
            <br>
            <div class="input-group-prepend">
                <span class="input-group-text">$<?php echo $row['costo']?></span>
                <form method="POST" id="cantidad">
                    <input type="hidden" name="nom_usuario" value="<?php echo $_SESSION['User'] ?>" class="form-control" id="inputCity" placeholder="0">
                    <div id="box-number">
                    <input type="number" name="cantidad" min="0" max="10" value="1" width ="10px;" class="form-control" id="inputCity" placeholder="0">
                    </div>
                    <input type="hidden" name="producto" min="0" max="10" value="<?php echo $row['nombre_producto']?>" class="form-control" id="inputCity" placeholder="0">
                    <input type="hidden" name="costo" min="0" max="10" value="<?php echo $row['costo']?>" class="form-control" id="inputCity" placeholder="0">
                    <button type="submit" name="add_to_cart" class="btn btn-success"><i class="fas fa-cart-plus"></i></button>
                </form>
                <!--<a href="#" class="btn btn-success"><i class="fas fa-cart-plus"></i></a>-->
            </div>
        </div>
    </div>
 </section>
<br>
<div class="container">
    <?php echo $success ?>
</div>
</body>
<?php require_once('footer.html')?>
</html>