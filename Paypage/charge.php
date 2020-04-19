<?php
    session_start();
    require_once('vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_1MQmjrHhSHjzUvymRvbrittp00LUWA23yP');

    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $nom_usuario = $POST['nom_usuario'];
    $total = $POST['total'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    //Crear Customer 
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

   // Charge Customer
    $charge = \Stripe\Charge::create(array(
    "amount" => (int)$total*100,
    "currency" => "mxn",
    "description" => "Compra de materiales Corpoh9",
    "customer" => $customer->id
  ));

    //print_r($charge);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gracias!</title>
  <link rel="stylesheet" type="text/css" href="../background.css">
</head>
<body>
<?php
require_once("navbar_pay.php");
?>
<br>
<section class="container">
<div class="card text-center">
  <div class="card-header">
    ¡Compra Exitosa!
  </div>
  <div class="card-body">
    <h5 class="card-title">Gracias por su compra en Corpoh9</h5>
    <p class="card-text">El total de su compra fue de ($<?php echo $total ?> mxn)</p>
    <a href="../index.php" class="btn btn-primary">Ir a Inicio</a>
  </div>
  <div class="card-footer text-muted">
    Info enviada a <?php echo $email ?>
  </div>
</div>
</section>
</body>
<br>
<br>
<br>
<?php require_once('../footer.html')?>
</html>

<?php 

//SMTP

$to = $email;

$subject = 'Comprobante de compra Corpoh9';

$message = '<h1>Gracias por su compra</h1>
            <p>El pedido se le estará entregando en un lapzo de 3 días. Cualquier duda favor de comunicarse por este medio<7p>
            <br>
            <p>Corpoh9 está para ayudarle</p>';

$headers = "Enviado Por: <servicio@corpoh9.com>"."\r\n";
$headers .= "Responder: <servicio@corpoh9.com>"."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

mail($to, $subject, $message, $headers);

?>


