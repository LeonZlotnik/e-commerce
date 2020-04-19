<?php
session_start();
$USR = $_SESSION['User'];

$db = mysqli_connect("localhost","root","root","copoh9");
if($db->connect_error){
    die("La Conexion Fallo: ".$db->connect_error);
}

if(isset($_GET['Total'])){
  $Total = mysqli_real_escape_string($db, $_GET['Total']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <link rel="stylesheet" type="text/css" href="../background.css">
    <style>
      .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
    </style>
</head>
<body>
<?php
require_once("navbar_pay.php");
?>
<br>
<section class="container">
<h4 class="my-4 text-center">Forma de Pago Corpoh9</h4>
<form action="charge.php" method="post" id="payment-form">
  <div class="form-row">
      <input type="hidden" name="nom_usuario" value="<?php echo $USR ?>" class="form-control mb-3 StripeElement StripeElement--empty">
      <input type="hidden" name="total" value="<?php echo $Total ?>" class="form-control mb-3 StripeElement StripeElement--empty">
      <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
    <div id="card-element" class="form-control">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>
</section>
<br>
<br>
<section class="container">
<div class="card row">
  <div class="card-body col-12">
    <p class="card-text">
    Para poder realizar compras en la plataforma es necesario acceder a su cuenta. Si no tiene un usuario porfavor vaya a la pestaña de "Registro" para crear su usario.
    Todos los datos ingresados serán protegidos por Corpoh9 y no se conmpartiran con ninguna entidad externa.
    </p>
    <p class="card-text">
    Si su usario es incorrecto favor de verificarlo o de lo contrario contactenos a servicios@mail.com para atenderle de forma puntual.
    </p>
  </div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="charge.js"></script>
</body>
<br>
<br>
<br>
<br>
<?php require_once('../footer.html')?>
</html>