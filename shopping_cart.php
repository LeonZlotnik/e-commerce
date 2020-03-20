<?php
session_start();
require_once('process.php');
$USR = $_SESSION['User'];

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

<section class="container">
    <?php 
         $conn = mysqli_connect("localhost","root","root","copoh9");
         if($conn -> connect_erro){
             die("La Conexion Fallo: ".$conn-> connect_error);
         }

        echo "<table class='table table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Usuario</th>
                            <th scope='col'>Producto</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Cantidad</th>
                            <th scope='col'>Total</th>
                            <th scope='col'>Fecha</th>
                        </tr>
                    </thead>";

                    $sql = "SELECT *, (costo*cantidad) AS total FROM ordenes WHERE nom_usuario = '$USR'";//AND fecha = CURDATE()";
                
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
                            <td>".$row["fecha"]."</td>";
                }
                    echo "
                        </tbody>
                    </table>";
                }
                else {
                    echo "<div class='alert alert-warning' role='alert'>
                    No se ha añadido ningun producoto aún.
                          </div>";
                }
    
                $connect-> close();
    
    ?>
    </section>

</body>
</html>