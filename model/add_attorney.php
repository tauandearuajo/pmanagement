<?php

session_start();
require_once 'database/conexao.php';
require("vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");

date_default_timezone_set('America/Sao_Paulo');

$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
$address = mysqli_real_escape_string($connect, $_POST['address']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$repeat_password = mysqli_real_escape_string($connect, $_POST['confirm_password']);

$created_at = date('d-m-y');


$cadastro_clientepf = "INSERT INTO attorney(name,email,phone_number,address,created_at)
	values ('$name','$email','$phone_number','$address','$created_at')";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);

$cadastro_user = "INSERT INTO users(name,email,password,token,status,user_type,created_at,photo_user) 
	values ('$name','$email',md5('$password'),md5('$email'),'Ativo','Advogado',now(),'assets/img/avatar-5.png')";

$cad_user = mysqli_query($connect, $cadastro_user);




if ($cad_pf) {
  

    header('Location: ../advogados.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    //header('Location: ../lista_clientes.php?erro');

    echo mysqli_error($connect);
}
