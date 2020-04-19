<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordenes Generadas</title>
    <link rel="stylesheet" type="text/css" href="admin_controll.css">
</head>
<body>
    <?php require_once('admin_navbar.php')?>
    <br>
    
    <div class="col text-center">
        <a class="btn btn-primary btn-lg" href="dashboard.php">Atras</a>
        <form method="POST" action="excel.php" class="btn btn-default">
                <input type="submit" name="export" class="btn btn-success btn-lg" value="Exportar">
        </form>
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
                            <th scope='col'>Usuario</th>
                            <th scope='col'>Producto</th>
                            <th scope='col'>Total</th>
                            <th scope='col'>Fecha de Compra</th>
                        </tr>
                    </thead>";

                    $sql = "SELECT *, (costo*cantidad) AS total FROM ordenes ORDER BY fecha DESC";
                    $result = $conn-> query($sql) or die ("error en query $sql".mysqli_error());

                    if($result-> num_rows > 0) {
                    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "
                            <tbody>
                            <th scope='row'>".$row["nom_usuario"]."</th>
                            <td>".$row["producto"]."</td>
                            <td>$".$row["total"]."</td>
                            <td>".$row["fecha"]."</td>";
                }
                    echo "
                        </tbody>
                    </table>";
                }
                else {
                    echo "<div class='alert alert-warning' role='alert'>
                    No hay información por el momento.
                          </div>";
                }

                $connect-> close();
    
    ?>
    </section>
</body>
</html>