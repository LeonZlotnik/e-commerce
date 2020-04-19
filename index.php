<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta description="Sitio para venta de materiales de oficina, material escolar y equipos electronicos.">
    <meta keywords="Corpoh9, papeleria, oficinas, lapices, plumas, tijeras, emgrapadoras, clips, impresoras">
    <title>Corpoh9</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <style>

    .cart{
            position:fixed; top:90px; right:20px;
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
            z-index: 5;
        }
    
    .cart a{
            color: white;
            position: relative; top: 1px;
        }
</style>
</head>
<body>
    <?php require_once('navbar.php')?>
    <br>
    <h1 class="text-center">
        <img src="img/Logo_corpoh9.png" alt="" width="35%">
    </h1>
    <br>

    <div class="cart">
        <a href="shopping_cart.php"><i class="fas fa-shopping-cart"></i></a>
    </div>

    <section class="container">
    <div class="card mb-3" style="box-shadow: 6px 6px 10px grey;">
        <img class="card-img-top" src="img/Paper_display.png" height="400px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Papelería</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="papeleria.php" class="btn btn-primary">Ver Productos</a>
        </div>
    </div>
    <br>
    <div class="card mb-3" style="box-shadow: 6px 6px 10px grey;">
        <img class="card-img-top" src="img/consumibles.png" height="400px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Consumibles</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="consumibles.php" class="btn btn-primary">Ver Productos</a>
        </div>
    </div>
    <br>
    <div class="card mb-3" style="box-shadow: 6px 6px 10px grey;">
        <img class="card-img-top" src="img/productshot.png"  height="400px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Materiales de Oficina</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="materiales.php" class="btn btn-primary">Ver Productos</a>
        </div>
    </div>
    <br>
    <div class="card mb-3" style="box-shadow: 6px 6px 10px grey;">
        <img class="card-img-top" src="img/equipos.png" height="400px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Equipos</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a href="equipos.php" class="btn btn-primary">Ver Productos</a>
        </div>
    </div>
    </section>
    <?php require_once('footer.html')?>
</body>
</html>