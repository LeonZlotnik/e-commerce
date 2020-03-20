<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Productos</title>
</head>
<body>
    <?php require_once('admin_navbar.php')?>
    <br>
    <div class="col text-center">
        <a class="btn btn-primary btn-lg" href="dashboard.php">Atras</a>
      <a href="crearproducto.php" class="btn btn-default btn btn-primary btn-lg">Crear Producto</a>
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
                            <th scope='col'>#</th>
                            <th scope='col'>Producto</th>
                            <th scope='col'>Categoría</th>
                            <th scope='col'>Subcategoria</th>
                            <th scope='col'>Precio</th>
                            <th scope='col'>Imagenes</th>
                            <th scope='col'>Descripcion</th>
                            <th scope='col'>Extensión</th>
                            <th scope='col'>Registro</th>
                        </tr>
                    </thead>";

                    $sql = "SELECT * FROM productos";
                    $result = $conn-> query($sql) or die ("error en query $sql".mysqli_error());

                    if($result-> num_rows > 0) {
                    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "
                            <tbody>
                            <th scope='row'>".$row["id_producto"]."</th>
                            <td>".$row["nombre_producto"]."</td>
                            <td>".$row["categoria"]."</td>
                            <td>".$row["subcategoria"]."</td>
                            <td>$".$row["costo"]." MXN</td>
                            <td><img src='images/".$row["imagenes"]."' width='70%'></td>
                            <td>".$row["descripcion"]."</td>
                            <td>".$row["extension"]."</td>
                            <td>".$row["registro"]."</td>";
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