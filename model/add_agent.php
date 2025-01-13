<?php

session_start();
require_once 'database/conexao.php';
require("vendor/autoload.php");
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");

date_default_timezone_set('America/Sao_Paulo');

$name = mysqli_real_escape_string($connect, $_POST['name_agent']);
$email = mysqli_real_escape_string($connect, $_POST['email_agent']);
$employees_code = mysqli_real_escape_string($connect, $_POST['employees_code']);
$company_cnpj = mysqli_real_escape_string($connect, $_POST['company_cnpj']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$repeat_password = mysqli_real_escape_string($connect, $_POST['confirm_password']);

$created_at = date('d-m-y');

//$password = "Projeto@" . uniqid();

$sql_bus = "SELECT*FROM business where cnpj='$company_cnpj'";
$query_bus = mysqli_query($connect, $sql_bus);
$rowbus = mysqli_fetch_array($query_bus);

$company_belonging = $rowbus['fantasy_name'];


$cadastro_user = "INSERT INTO users(name, 
email,password,repeat_password,token,status,type_user,user_level,created_at,photo_user) 
	values ('$name','$email',md5('$password'),md5('$repeat_password'),md5('$email'),'Ativo','Agente','Agente',now(),'assets/img/avatar-5.png')";

$cad_user = mysqli_query($connect, $cadastro_user);

$sql_rest = "SELECT*FROM users where email='$email'";
$query_rest = mysqli_query($connect, $sql_rest);
$resp_rest = mysqli_fetch_array($query_rest);

$id_user = $resp_rest["id"];

$cadastro_clientepf = "INSERT INTO employees(name,email,employee_code,company_belonging,company_cnpj,users_id)
	values ('$name','$email','$employees_code','$company_belonging','$company_cnpj',$id_user)";

$cad_pf = mysqli_query($connect, $cadastro_clientepf);




if ($cad_pf) {
  /*

    $_SESSION['cadastradoInfo'] = "<div class='alert alert-succes bg-success text-center' role='alert' style='border:1px solid #28A745; color:#FFF;  font-size:19px;'>Informações  cadastradas com sucesso!<div>";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->CharSet = 'utf-8';
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'SSL'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.hostinger.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "naoresponda@polostecnologia.com";
    $mail->Password = "Projeto@228638";
    $mail->SetFrom("naoresponda@polostecnologia.com", "Controle interno Polos Tecnologia®");
    $mail->Subject = "Seja bem-vindo Funcionario $name!";
    $mail->Body = "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    
        <style>
            * {
                margin: 0;
                list-style: none;
                padding: 0;
            }
    
            
    
            header {
                background-color: rgb(17, 31, 77);
                width: 100%;
                height: 200px;
                position: relative;
                align-content: center;
                align-items: center;
                align-self: center;
                text-align: center;
            }
    
            .cabecario_titulo {
                font-size: 19px;
                color: rgb(29, 29, 29);
                font-weight: bold;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                text-align: center;
                padding-top: 25px;
                padding-bottom: 25px;
            }
    
            main {
                align-items: center;
                text-align: center;
                align-content: center;
            }
    
            #caixa {
                width: 100%;
                text-align: center;
                align-items: center;
            }
    
            p {
                font-size: 19px;
                color: rgb(37, 37, 37);
                font-weight: bold;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                width: 700px;
                text-align: justify;
                text-align: center;
            }
    
            .corpo_texto {
                width: 700px;
                margin-left: auto;
                margin-right: auto;
                padding-bottom: 50px;
            }
            .btn_link{
                width: 150px;
                height: 60px;
                background-color: #000522;
                text-decoration: none;
                color: #fff;
                padding: 30px 30px;
                border-radius: 15px;
            }
            .btn_facebook{
                background: #3D94F6;
       background-image: -webkit-linear-gradient(top, #1E62D0);
       background-image: -moz-linear-gradient(top, #3D94F6, #1E62D0);
       background-image: -ms-linear-gradient(top, #3D94F6, #1E62D0);
       background-image: -o-linear-gradient(top, #3D94F6, #1E62D0);
       -webkit-border-radius: 20px;
       -moz-border-radius: 20px;
       border-radius: 20px;
       color: #FFFFFF;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       font-size: 25px;
       font-weight: bold;
       padding: 20px;
       border: solid #337FED 1px;
       text-decoration: none;
       display: inline-block;
       cursor: pointer;
       text-align: center;
            }
            .btn_whatsapp{
                background: #00a884;
       background-image: -webkit-linear-gradient(top, #00a884);
       background-image: -moz-linear-gradient(top,  #00a884);
       background-image: -ms-linear-gradient(top,  #00a884);
       background-image: -o-linear-gradient(top,  #00a884);
       -webkit-border-radius: 20px;
       -moz-border-radius: 20px;
       border-radius: 20px;
       color: #FFFFFF;
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       font-size: 25px;
       font-weight: bold;
       padding: 20px;
       border: solid #00a884 1px;
       text-decoration: none;
       display: inline-block;
       cursor: pointer;
       text-align: center;
            }
        </style>
    </head>
    
    <body style='background-color: rgb(252, 252, 252);'>
    
        
        <Main>
            <div class='caixa'><br><br>
                <div class='cabecario_titulo'>
                    <h3>Seu cadastro foi realizado, abaixo estão suas credenciais para acesso ao app Vantech®</h3>
                </div>
                <div class='corpo_texto'>
                    <p>
                    Usuário:<label style='color:#00a884'>$email</label><br>
                    Senha: <label style='color:#00a884'>$password</label><br>
                    </p>
                    <p>
                        Você receberá o instalador do aplicativo pela equipe da Vantech<br><br><br><br>
                        
                    </p><br><br>
                </div>
            </div>
            
        </Main>
    
    </body>
    
    </html>";
    $mail->AddAddress($email);
    if (!$mail->Send()) {
        $resultado = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $resultado =  "foi";
    }*/

    header('Location: ../agents.php?sucesso');
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
