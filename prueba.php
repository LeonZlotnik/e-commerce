<?php 
session_start();

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
    if(isset($_SESSION["shopping_cart"])){
        $item_array_id = array_column($_SESSION["shopping_cart"], $item_id);
        if(!in_array($_GET['id'],$item_array_id)){
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'   => '$_GET["id"]',
                'item_name' => '$_POST["hidden_name"]',
                'item_price' => '$_POST["hidden_price"]',
                'item_quantity' => '$_POST["cantidad"]'
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }else{
            echo "<script>alert('El producto ya fue agregado')</script>";
        };
    }else{
        $item_array = array(
            'item_id'   => '$_GET["id"]',
            'item_name' => '$_POST["hidden_name"]',
            'item_price' => '$_POST["hidden_price"]',
            'item_quantity' => '$_POST["cantidad"]'
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #cantidad{
        margin:0 3%;
        width: 25%;
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
        }
</style>
<body>
<?php require_once('navbar.php')?>
<br>
<div class="cart">
        <a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i></a>
    </div>
 <section class="container">
    <div class="row">
        <div class="col-8">
            <br>
            <div id="carouselExampleIndicators" class="carousel slide col-6" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" <?php echo "src='admin/images/".$row['imagenes']."'";?> alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" <?php echo "src='admin/images/".$row['imagenes']."'";?> alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" <?php echo "src='admin/images/".$row['imagenes']."'";?> alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <form class="col-4" method="POST" action="<?php  echo "<a href='shopping_cart.php?id={$row['id_producto']}&producto={$row['nombre_producto']}'"; ?>">
            <h5 class="h3"><?php echo $row['nombre_producto']?></h5>
            <br>
            <label>Description:</label>
            <p><?php echo $row['descripcion']?></p>
            <br>
            <label>Especifications:</label>
            <p><?php echo $row['extension']?></p>
            <br>
            <div class="input-group-prepend">
                <span class="input-group-text">$<?php echo $row['costo']?></span>
                <div id="cantidad">
                    <input type="number" name="cantidad" min="0" max="10" value="1" class="form-control" id="inputCity" placeholder="0">
                    <input type="hidden" name="hidden_name" min="0" max="10" value="<?php echo $row['nombre_producto']?>" class="form-control" id="inputCity" placeholder="0">
                    <input type="hidden" name="hidden_price" min="0" max="10" value="<?php echo $row['costo']?>" class="form-control" id="inputCity" placeholder="0">
                </div>
                <input type="submit" name="add_to_cart" class="btn btn-success" value="Agregar">
                <!--<a href="#" class="btn btn-success"><i class="fas fa-cart-plus"></i></a>-->
            </div>
        </form>
    </div>
 </section>

</body>
</html>

<!--Shopping Cart

<?php
session_start();

$db = mysqli_connect("localhost","root","root","copoh9");
if($db->connect_error){
    die("La Conexion Fallo: ".$db->connect_error);
}else{
    echo "Error";
}

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($db, $_GET['id']);
    $N = mysqli_real_escape_string($db, $_GET['nombre_producto']);

} else{
echo "Error";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
<?php //require_once('navbar.php')?>

<h3 class="text-center">Carrito</h3>
<br>
<section class="container">
    <table class="table table-doarder"> 
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
        <th>Action</th>
    </tr>

<?php
/*if(!empty($_SESSION['shopping_cart'])){
    
    $total = 0;
    foreach($_SESSION['shopping_cart'] as $keys => $values){
        ?>
    <tr>
        <td><?php echo $values['nombre_producto'];?></td>
        <td><?php echo $values['cantidad'];?></td>
        <td>$<?php echo $values['costo'];?></td>
        <td><?php echo number_format($values['cantidad']*$values['costo'],2);?></td>
    </tr>
        <?php
            $total = $total + ($values['cantidad']*$values['costo']);
    }
}*/
?>
    <tr>
        <td colspan="3">Total</td>
        <td>$<?php //echo number_format($total,2)?></td>
    </tr>
     
     </table>
</section>

</body>
</html>
-->