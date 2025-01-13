<?php

session_start();
require_once 'database/conexao.php';
require("vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");

date_default_timezone_set('America/Sao_Paulo');

$fistname = mysqli_real_escape_string($connect, $_POST['fistname']);
$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
$facility = mysqli_real_escape_string($connect, $_POST['facility']);

$created_at = date('d-m-y');


$cadastro_clientepf = "INSERT INTO doctors(firstname,lastname,facility,created_at)
	values ('$fistname','$lastname','$facility','$created_at')";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);



if ($cad_pf) {
  

    header('Location: ../doutores.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    //header('Location: ../lista_clientes.php?erro');

    echo mysqli_error($connect);
}
