<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controll de Administradores</title>
    <link rel="stylesheet" type="text/css" href="admin_controll.css">
</head>
<body>
    <?php require_once('admin_navbar.php')?>
    <br>
    
    <div class="col text-center">
        <a class="btn btn-primary btn-lg" href="dashboard.php">Atras</a>
      <a href="crearadmin.php" class="btn btn-default btn btn-primary btn-lg">Crear Administrador</a>
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
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Apellido</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Contraseña</th>
                            <th scope='col'>Registro</th>
                            <th scope='col'>Eliminar</th>
                        </tr>
                    </thead>";

                    $sql = "SELECT * FROM administradores";
                    $result = $conn-> query($sql) or die ("error en query $sql".mysqli_error());

                    if($result-> num_rows > 0) {
                    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "
                            <tbody>
                            <th scope='row'>".$row["id_administrador"]."</th>
                            <td>".$row["nombre"]."</td>
                            <td>".$row["apellido"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["password"]."</td>
                            <td>".$row["fecha"]."</td>
                            <td><a href='admindb.php?delete=".$row["id_administrador"]."'><i class='fas fa-trash-alt'></i></a></td>";
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

                if(isset($_GET['delete'])){
                    $id = $_GET['delete'];
                    $conn->query("DELETE FROM administradores WHERE id_administrador = '$id'");
                }
    
                $connect-> close();
    
    ?>
    </section>
</body>
</html>

