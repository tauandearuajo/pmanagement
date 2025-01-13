<?php

session_start();
require_once 'database/conexao.php';



$agent_id = mysqli_real_escape_string($connect, $_POST['agent_id']);
$name_agent = mysqli_real_escape_string($connect, $_POST['name_user']);
$email_agent = mysqli_real_escape_string($connect, $_POST['email_user']);
	$cadastro_clientepf = "UPDATE users SET name='$name_agent',email='$email_agent' where id='$agent_id' ";

	$atualizar_pf = mysqli_query($connect, $cadastro_clientepf);


	if ($atualizar_pf) {
		

		header('Location: ../users.php?sucesso');
	} else {
		echo mysqli_error($connect);
	}

