<?php

session_start();
require_once 'database/conexao.php';
require("vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");

date_default_timezone_set('America/Sao_Paulo');

$first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
$last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
$phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
$referral = mysqli_real_escape_string($connect, $_POST['referral']);
$date_entered = mysqli_real_escape_string($connect, $_POST['date_entered']);
$date_brithday = mysqli_real_escape_string($connect, $_POST['date_brithday']);
$date_accident = mysqli_real_escape_string($connect, $_POST['date_accident']);
$office_center = mysqli_real_escape_string($connect, $_POST['office_center']);
$employee_name = mysqli_real_escape_string($connect, $_POST['employee_name']);
$scheduling_status = mysqli_real_escape_string($connect, $_POST['scheduling_status']);
$chief_complaint = mysqli_real_escape_string($connect, $_POST['chief_complaint']);
$mri_notes= mysqli_real_escape_string($connect, $_POST['mri_notes']);
$attorney_id = mysqli_real_escape_string($connect, $_POST['attorney_id']);
$insurance_id = mysqli_real_escape_string($connect, $_POST['insurance_id']);
$doctors_id = mysqli_real_escape_string($connect, $_POST['doctors_id']);

$created_at = date('d-m-y');


$cadastro_clientepf = "INSERT INTO patient(first_name,last_name,phone_number,referral,date_entered,
date_brithday,date_accident,office_center,employee_name,scheduling_status,chief_complaint,mri_notes,
attorney_id,insurance_id,doctors_id,created_at)
	values ('$first_name','$last_name','$phone_number','$referral','$date_entered',
    '$date_brithday','$date_accident','$office_center','$employee_name','$scheduling_status',
    '$chief_complaint','$mri_notes','$attorney_id','$insurance_id','$doctors_id','$created_at')";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);






if ($cad_pf) {
  

    header('Location: ../patients.php?sucesso');
} else {

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

    //header('Location: ../lista_clientes.php?erro');

    echo mysqli_error($connect);
}
