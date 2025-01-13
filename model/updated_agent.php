<?php

session_start();
require_once 'database/conexao.php';



$agent_id = mysqli_real_escape_string($connect, $_POST['agent_id']);
$users_id = mysqli_real_escape_string($connect, $_POST['user_id']);
$name_agent = mysqli_real_escape_string($connect, $_POST['name_agent']);
$email_agent = mysqli_real_escape_string($connect, $_POST['email_agent']);
$company_cnpj = mysqli_real_escape_string($connect, $_POST['company_cnpj']);

	$cadastro_clientepf = "UPDATE users SET name='$name_agent',email='$email_agent' where id='$users_id' ";

	$atualizar_pf = mysqli_query($connect, $cadastro_clientepf);
	$up_employees = "UPDATE employees SET name ='$name_agent',email='$email_agent' where id='$agent_id' ";

	$atualizar_emp = mysqli_query($connect, $up_employees);

	if ($atualizar_pf) {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";*/



		header('Location: ../agents.php?sucesso');
	} else {
		/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/
		echo mysqli_error($connect);
	}

