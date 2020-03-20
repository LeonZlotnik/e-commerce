<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <style>
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

    .margin {
        list-style-type:none;
        width: 200px;
        margin: 0 4%;
        box-shadow: 10px 10px 15px grey;;
    }
    .explainer{
        display: flex;
        font-size: 14px;
    }
    </style>
</head>
<body>
    <?php require_once('navbar.php')?>

    <div class="cart">
        <a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i></a>
    </div>
    <br>
    <h2 class="text-center">Equipos</h2>
    <br>
    <form class="container">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="search" placeholder="Buscar...">
        </div>
    </form>
    <br>

    <section class="container">
        <ul class="row"> 
        <?php
         $db = mysqli_connect("localhost","root","root","copoh9");
         if($db->connect_error){
             die("La Conexion Fallo: ".$db->connect_error);
         }
         $sql = "SELECT * FROM productos WHERE categoria = 'Equipos' ORDER BY 'subcategoria' ASC, 'nombre_producto' DESC";
         $result = mysqli_query($db, $sql);
         while ($row = mysqli_fetch_array($result)){
        ?>
            
                <li class="card col-3 margin" id="<?php echo $row['subcategoria']?>">
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
                        <a href="#" class="btn btn-success"><i class="fas fa-cart-plus"></i></a>
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
</body>
</html>