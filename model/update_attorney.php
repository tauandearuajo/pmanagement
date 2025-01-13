<?php

session_start();
require_once 'database/conexao.php';
require("vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");

date_default_timezone_set('America/Sao_Paulo');

$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$id_adv = mysqli_real_escape_string($connect, $_POST['id_adv']);
$address = mysqli_real_escape_string($connect, $_POST['address']);

$created_at = date('d-m-y');


$cadastro_clientepf = "UPDATE attorney set name='$name',email='$email',address='$address' where id='$id_adv'";
	

$cad_pf = mysqli_query($connect, $cadastro_clientepf);

$cadastro_user = "UPDATE users SET name='$name',email='$email' where email='$email'";
$cad_user = mysqli_query($connect, $cadastro_user);




if ($cad_pf) {
  

    header('Location: ../advogados.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    //header('Location: ../lista_clientes.php?erro');

    echo mysqli_error($connect);
}
