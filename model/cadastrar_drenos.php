<?php

session_start();
require_once 'database/conexao.php';

$site_id = mysqli_real_escape_string($connect, $_POST['site_id']);
$client_id = mysqli_real_escape_string($connect, $_POST['client_id']);
$agent_code = mysqli_real_escape_string($connect, $_POST['agent_code']);
$report_id = mysqli_real_escape_string($connect, $_POST['report_id']);

// medidores de before 1
$drains = $_FILES['drains']['name'];
// medidores de after 1
$drains2 = $_FILES['drains2']['name'];



$diretorio = "admin/uploads/";
//campos de mover imagem do before 1
move_uploaded_file($_FILES['drains1']['tmp_name'], "../admin/uploads/" . $drains1);
//campos de mover imagem do after 1
move_uploaded_file($_FILES['drains2']['tmp_name'], "../admin/uploads/" . $drains2);


$cadastro_basechum = "INSERT INTO drains(drains1,
    drains2,
	client_id, 
	agent_code,
	site_id,
	report_id,
	created_at) 
	values ('$drains1',
    '$drains2',  
	'$client_id', 
	'$agent_code',
	'$site_id',
	'$report_id',
	now())";

$cad_bac = mysqli_query($connect, $cadastro_basechum);



if ($cad_bac) {



	$_SESSION['cadastradoInfo'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso, vamos agora a etapa doze<br>
			do relatório, informaçoes do Montante, preencha abaixo!</div>";
	header('Location: ../montante.php?clientid=' . $client_id);
} else {
	/*echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	*/

	$_SESSION['cadastradoInfo'] = "<div class='alert alert-danger' role='alert'>Falha ao registrar no banco de dados! erro:</div>" . mysqli_error($connect);

	//header('Location: ../lista_clientes.php?erro');

	echo mysqli_error($connect);
}
