<?php

if(isset($_POST['insert'])){
  $name = $_POST["nom_usuario"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $address = $_POST["direccion"];
  $county = $_POST["municipio"];
  $state = $_POST["estado"];
  $zip = $_POST["cp"];

$conn = mysqli_connect("localhost","root","root","copoh9") or die("error en conexion ".mysqli_connect_error());
mysqli_set_charset($conn, "utf8");

$sql = "INSERT INTO registros (nom_usuario, password, email, direccion, municipio, estado, cp) VALUES ('$name','$password','$email','$address','$county','$state','$zip');";

$result = mysqli_query($conn, $sql) or die ("error en query $sql".mysqli_error());

if($result){
  echo "Success!";
}else{
  echo "<script type='text/javascript'>alert('Se ha generado un error');</script>";
};

mysqli_free_result($result);
mysqli_close($conn);

header('Location:index.php');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    <link rel="stylesheet" type="text/css" href="background.css">
    <style>
      #msg{
        color: red;
        font-weight: bold;
      }
    </style>
</head>
<body>
<?php require_once('navbar.php')?>
<br>
<h2 class="text-center h1" style="color:#2334A2; text-shadow: 1.5px 1px 2px #525252;">Registro</h2>
<br>
<section class="container">
<form action="" method="POST" id="form">
<div class="form-group">
    <label for="username">Nombre de Usuario</label>
    <input type="text" class="form-control" id="usuario" name="nom_usuario" placeholder="Introduce tu nombre de usuario" required>
  </div>
  <div class="form-group">
    <label for="username">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Inrtoduce tu correo" required>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="username">Contraseña</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="10 caracteres" required>
      <progress max=100 value="" id="strength" style="width: 230px;"></progress>
  </div>
  <div class="form-group col-md-6">
      <label for="username">Comprobación</label>
      <input type="password" class="form-control" id="validation" placeholder="corrobore contraseña" required>
      <small id="msg"></small>
    </div>
  </div>
  <div class="form-group">
    <label for="username">Dirección</label>
    <input type="text" class="form-control" id="inputAddress2" name="direccion" placeholder="Inrtoduce tu calle y número" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">Municipio o Alcaldía</label>
      <input type="text" class="form-control" name="municipio" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado</label>
      <select id="inputState" name="estado"  class="form-control" required>
        <option>--</option>
        <option value="MX">CDMX</option>
        <option value="QRO">Queretaro</option>
        <option value="GTO">Guanajuato</option>
        <option value="MOR">Morelos</option>
        <option value="HGO">Hidalgo</option>
        <option value="TLA">Tlaxcala</option>
        <option value="PUE">Puebla</option>
        <option value="EDOX">Edo.Mex</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">C.P.</label>
      <input type="number" class="form-control" name="cp" id="inputZip" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <input type="submit" class="btn btn-primary" name="insert" value="Enviar">
</form>
</section>
<br>
<section class="container">
<iframe class="border" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.3749988314507!2d-99.16720488548785!3d19.43939234550159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f8c9a0780097%3A0x2bc080b00184fe2!2sCalle%20Francisco%20Pimentel%2061%2C%20San%20Rafael%2C%20Cuauht%C3%A9moc%2C%2006470%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1580099122357!5m2!1ses!2smx" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
<br>
<?php require_once('footer.html')?>
</body>
</html>

<script type="text/javascript">

const form = document.getElementById("form");
const pw = document.getElementById("password");
const val = document.getElementById("validation");
const msg = document.getElementById("msg");

form.addEventListener('submit', function(e){

if(pw.value !== val.value){
  e.preventDefault();
  msg.innerHTML = "La Contraseña no coincide";
}else {
  console.log("OK");

if(pw.value > 8){
  e.preventDefault();
  alert('La contraseña es muy larga bro!')
}  
  console.log("OK");
};

});

  var pass = document.getElementById("password")
  pass.addEventListener('keyup', function(){
    checkPassword(pass.value);
  });
  function checkPassword(pass){
    var strengthBar = document.getElementById("strength");
    var strength = 0;
    if(pass.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
      strenght+=1
      console.log('funcionan alfanumericos');
    }
    if(pass.match(/[<>?¿!]+/)){
      strenght+=1
      console.log('funcionan caracteres');
    }
    if(pass.match(/[@#%$&ç()]+/)){
      strenght+=1
      console.log('funcionan expresiones');
    }
    switch(strength){
      case 0:
        strengthBar.value = 33;
        break;
      case 1:
        strengthBar.value = 66;
        break;
      case 2:
        strengthBar.value = 100;
        break;
    }
  }
</script>