<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Base de Usuarios</title>
    <link rel="stylesheet" type="text/css" href="admin_controll.css">
</head>
<body>
    <?php require_once('admin_navbar.php')?>
    <br>
    
    <div class="col text-center">
      <a class="btn btn-primary btn-lg" href="dashboard.php">Atras</a>
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
                            <th scope='col'>Usario</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Contraseña</th>
                            <th scope='col'>Direccion</th>
                            <th scope='col'>Municipio</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>CP</th>
                            <th scope='col'>Registro</th>
                            <th scope='col'>Eliminar</th>
                        </tr>
                    </thead>";

                    $sql = "SELECT * FROM registros";
                    $result = $conn-> query($sql) or die ("error en query $sql".mysqli_error());

                    if($result-> num_rows > 0) {
                    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "
                            <tbody>
                            <th scope='row'>".$row["id_registro"]."</th>
                            <td>".$row["nom_usuario"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["password"]."</td>
                            <td>".$row["direccion"]."</td>
                            <td>".$row["municipio"]."</td>
                            <td>".$row["estado"]."</td>
                            <td>".$row["cp"]."</td>
                            <td>".$row["fecha"]."</td>
                            <td><a href='database.php?delete=".$row["id_registro"]."'><i class='fas fa-trash-alt'></i></a></td>";
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
                    $conn->query("DELETE FROM registros WHERE id_registro = '$id'");
                }
    
                $connect-> close();
    
    ?>
    </section>
</body>
</html>