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
<?php require_once('navbar.php')?>

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
if(!empty($_SESSION['shopping_cart'])){
    
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
}
?>
    <tr>
        <td colspan="3">Total</td>
        <td>$<?php echo number_format($total,2)?></td>
    </tr>
     
     </table>
</section>

</body>
</html>