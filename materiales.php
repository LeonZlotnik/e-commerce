<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <link rel="stylesheet" type="text/css" href="style-display_prod.css">
</head>
<body>
    <?php require_once('navbar.php')?>

    <div class="cart">
        <a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i></a>
    </div>
    <br>
    <h2 class="text-center h1" style="color:#2334A2; text-shadow: 1.5px 1px 2px #525252;">Materiales</h2>
    <br>
    <form class="container">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="search" placeholder="Buscar...">
        </div>
    </form>
    <br>

    <section class="container">
        <ul class="row" id="list"> 
        <?php
         $db = mysqli_connect("localhost","root","root","copoh9");
         if($db->connect_error){
             die("La Conexion Fallo: ".$db->connect_error);
         }
         $sql = "SELECT * FROM productos WHERE categoria = 'Materiales' ORDER BY 'subcategoria' ASC, 'nombre_producto' DESC";
         $result = mysqli_query($db, $sql);
         while ($row = mysqli_fetch_array($result)){
        ?>
            
                <li class="card margin" style="width:270px;" id="<?php echo $row['subcategoria']?>">
                <!--Corregir ruta de imagen-->
                <img class="card-img-top" <?php echo "src='admin/images/".$row['imagenes']."'";?> width="15%" height="160px;" alt="Card image cap">
                    <div class="card-body">
                        <div aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><?php echo $row['categoria']?></li>
                                <li class="breadcrumb-item"><strong><?php echo $row['subcategoria']?></strong></li>
                            </ol>
                        </div>
            
                        <h5 class="card-title"><?php echo $row['nombre_producto']?></h5>
                        <p class="card-text"><?php echo $row['descripcion']?></p>
                        <div class="input-group-prepend">
                            <span class="input-group-text">$<?php echo $row['costo']?></span>
                        </div>
                        <br>
                        <?php  echo "<a href='detalles.php?ID={$row['id_producto']}&producto={$row['nombre_producto']}' class='btn btn-primary'>Detalles</a>"; ?>
                </li>
        <?php
        }
        if($row->connect_error){
            die("La Conexion Fallo: ".$row->connect_error);
        }   
        ?>
        </ul>
    </section>
    <?php require_once('subcategories.php') ?>
    <?php require_once('footer.html')?>
</body>
</html>

<script type="text/javascript" src="search_engine.js"></script>