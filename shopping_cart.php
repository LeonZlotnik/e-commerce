<?php
require_once('process.php');
require_once('connect.php');
$USR = $_SESSION['User'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <style>
        #total{
            position: fixed; top: 15%; left: 12%;
            /*color: 16327F;*/
        }
        #boton-pago{
            position: fixed; top: 15%; right: 12%;
        }
    </style>
</head>
<body>
<?php require_once('navbar.php')?>
<br>
<div class="container">
    <div class="row">
        <h3 class="text-center col-10 h3" style="color:#2334A2; text-shadow: 1.5px 1px 2px #525252;">Añadidos</h2>
        <!--<a href="Paypage/pagos.php" class="btn btn-success col-2">Pagar</a>-->
    </div>
</div>
<br>
<section class="container">
    <?php 
         $conn = mysqli_connect("localhost","root","root","copoh9");
         if($conn -> connect_erro){
             die("La Conexion Fallo: ".$conn-> connect_error);
         }

        echo "<table class='table table-hover'>
                    <thead>
                        <tr>
                            <th scope='col' style='color:#211773'>Usuario</th>
                            <th scope='col' style='color:#211773'>Producto</th>
                            <th scope='col' style='color:#211773'>Precio</th>
                            <th scope='col' style='color:#211773'>Cantidad</th>
                            <th scope='col' style='color:#124B16'>Total</th>
                            <th scope='col' style='color:#211773'>Fecha</th>
                            <th scope='col' style='color:#211773'>Eliminar</th>
                        </tr>
                    </thead>";

                    $sql = "SELECT *, (costo*cantidad) AS total FROM ordenes WHERE nom_usuario = '$USR' AND DATE(fecha) = CURDATE()";
                    
                    if($USR == null){
                        header('Location:clientes.php');
                        //$delet = "DELETE FROM ordenes WHERE nom_usuario = null";
                    }

                    $result = $conn-> query($sql) or die ("error en query $sql".mysqli_error());

                    if($result-> num_rows > 0) {
                    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "
                            <tbody>
                            <th scope='row'>".$row["nom_usuario"]."</th>
                            <td>".$row["producto"]."</td>
                            <td>$".$row["costo"]."</td>
                            <td>".$row["cantidad"]."</td>
                            <td>$".$row["total"]."</td>
                            <td>".$row["fecha"]."</td>
                            <td><a href='shopping_cart.php?delete=".$row["producto"]."'><i class='fas fa-trash-alt'></i></a></td>";
                };
                    echo "
                        </tbody>
                    </table>";
                }
                else {
                    echo "<div class='alert alert-warning' role='alert'>
                    No se ha añadido ningun producto aún.
                          </div>";
                }

                foreach($result as $value){
                    $total += $value["total"];
                };

                if(isset($_GET['delete'])){
                    $product = $_GET['delete'];
                    $conn->query("DELETE FROM ordenes WHERE nom_usuario = '$USR' AND producto = '$product'");
                }
    
    ?>
    </section>

    <span id="total" class="btn btn-light h4">Total: $<?php echo $total ?></span>
    <?php  echo "<a href='Paypage/pagos.php?Total={$total}' class='btn btn-success col-2' id='boton-pago'><i class='fas fa-dollar-sign'></i> Pagar</a>"; ?>
    
</body>
</html>