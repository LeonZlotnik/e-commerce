<?php

$nom_usuario_error = "";
$email_error = "";
$subject_error = "";
$total_error = "";

    $nom_usuario = $POST['nom_usuario'];
    $email = $POST['email'];
    $subject = "";
    $total = $POST['total'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST[ "nom_usuario" ])){
        $nom_usuario_error = "El nombre es requerido";
    }else{
        $name = test_input( $_POST[ "nom_usuario" ]);
     if(!preg_match( '/[a-zA-Z]*$/', $name )){
        $nom_usuario_error = "Solo letras";
        }
    }

    if(empty($_POST[ "email" ])){
        $email_error = "El email es requerido";
    }else{
        $email = test_input( $_POST[ "email" ]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error = "Email invalido";
        }
    }

    if(empty($_POST[ "subject" ])){
        $subject = " ";
    }else{
        $subject = test_input( $_POST[ "subject" ]);
    }


    if(empty($_POST[ "total" ])){
        $description = " ";
    }else{
        $description = test_input( $_POST[ "total" ]);
    }
    
    if($name_error == '' && $email_error == '' && $subject_error ==  '' && $total_error == ''){
        $message_body = '';
        unset($_POST["insert"]);
        foreach ($_POST as $key => $value){
            $message_body .= "$key: $value\n";
        }
        
        $to = "zlotnik.leon92@gmail.com";
        $subject = "Comprobación de orden";
        if(mail($to, $subject, $message_body)){
            $success = "Email enviado exitosmente.";
            $name == '';
            $email == '';
            $subject == '';
            $description == '';
        }
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>