<?php

session_start();
require_once 'database/conexao.php';
require("vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");

date_default_timezone_set('America/Sao_Paulo');

$name = mysqli_real_escape_string($connect, $_POST['name']);
$phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
$address = mysqli_real_escape_string($connect, $_POST['address']);
$fax = mysqli_real_escape_string($connect, $_POST['fax']);
$maps_iframe = mysqli_real_escape_string($connect, $_POST['maps_iframe']);

$created_at = date('d-m-y');


$cadastro_clientepf = "INSERT INTO insurance(name,phone_number,address,fax,maps_iframe,created_at)
	values ('$name','$phone_number','$address','$fax','$maps_iframe','$created_at')";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);




if ($cad_pf) {
  

    header('Location: ../seguros.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    //header('Location: ../lista_clientes.php?erro');

    echo mysqli_error($connect);
}
