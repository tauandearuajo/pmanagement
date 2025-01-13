<?php

require_once 'model/database/conexao.php';

session_start();
if (isset($_POST['btn-entrar'])) :
  $erros = array();
  $login = mysqli_escape_string($connect, $_POST['email']);
  $senha = mysqli_escape_string($connect, $_POST['senha']);

  $sql_status = "SELECT *FROM users WHERE email = '$login'";
  $result_status = mysqli_query($connect, $sql_status);
  $dados_status = mysqli_fetch_array($result_status);

  if (empty($login) && empty($senha)) :
    $erros[] = "<div class='alert alert-warning' role='alert'>
      Verifique os campos de email e senha, e preencha-os, é possivel que estejam vazios!
    </div>";
  else :
    $sql = "SELECT id,user_type, email FROM users WHERE email = '$login' AND user_type='Master'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) :
      $senha = md5($senha);
      $sql = "SELECT*FROM users WHERE email = '$login' AND password = '$senha'";
      $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) == 1) :
        $dados = mysqli_fetch_array($resultado);

        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id'];

        header('Location:painel.php');
      else :
        $erros[] = "<div class='alert alert-danger' role='alert' style='color:#fff;'>
          Usuario e senha, não conferem!
        </div>
        ";

      endif;
    else :
      $erros[] = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='background-color:red;border:none;color:#fff'>
        Usuário $login, não possui acesso a area de administração®!
    </div>";

    endif;
  endif;



endif;


?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Patients</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon.png">
  <link rel="shortcut icon" sizes="180x180" href="assets/img/icon.png" type="image/x-icon">
  <meta name="theme-color" content="#ffffff">
  <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="vendors/simplebar/simplebar.min.js"></script>
  <script src="assets/js/config.js"></script>


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
  <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
  <link href="assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
  <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
  <script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
    if (phoenixIsRTL) {
      var linkDefault = document.getElementById('style-default');
      var userLinkDefault = document.getElementById('user-style-default');
      linkDefault.setAttribute('disabled', true);
      userLinkDefault.setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
      var linkRTL = document.getElementById('style-rtl');
      var userLinkRTL = document.getElementById('user-style-rtl');
      linkRTL.setAttribute('disabled', true);
      userLinkRTL.setAttribute('disabled', true);
    }
  </script>
</head>


<body style="background-color: #009ff5;">

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="container-fluid bg-300 dark__bg-1200">
      <div class="bg-holder bg-auth-card-overlay" style="background-image:url(assets/img/bg/37.png);">
      </div>
      <!--/.bg-holder-->

      <div class="row flex-center position-relative min-vh-100 g-0 py-5">
        <div class="col-6 col-sm-6 col-xl-5">
          <div class="card border border-200 auth-card">
            <div class="card-body pe-md-0">
              <div class="row align-items-center gx-0 gy-7">

                <div class="col mx-auto">
                  <div class="auth-form-box">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                      <div class="text-center mb-7">

                        <a class="d-flex flex-center text-decoration-none mb-4" href="index.html">
                          <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block">
                            <img src="assets/img/logo_patients.png" alt="phoenix" width="220" />
                          </div>
                        </a>
                        <?php
                        if (!empty($erros)) :
                          foreach ($erros as $erro) :
                            echo $erro;
                          endforeach;
                        endif;


                        ?>
                        <h4 class="text-1000">Acesse usando suas credenciais</h4>
                        <p class="text-700">Bem-vindo ao sistema</p>
                      </div>
                      <div class="mb-3 text-start">
                        <label class="form-label" for="email">Email</label>
                        <div class="form-icon-container">
                          <input type="email" class="form-control form-icon-input" name="email" id="email"  placeholder="name@example.com" />
                          <span class="fas fa-user text-900 fs--1 form-icon"></span>
                        </div>
                      </div>
                      <div class="mb-3 text-start">
                        <label class="form-label" for="password">Senha</label>
                        <div class="form-icon-container">
                          <input type="password" class="form-control form-icon-input" name="senha" id="password"  placeholder="Password" />
                          <span class="fas fa-key text-900 fs--1 form-icon"></span>
                        </div>
                      </div>
                      <div class="row flex-between-center mb-3">
                        <div class="col-auto">

                        </div>
                        <div class="col-auto"><a class="fs--1 fw-semi-bold" href="forgot-password.html">Esqueceu sua senha?</a></div>
                      </div>
                      <button type="submit" class="btn btn-primary w-100 mb-3" name="btn-entrar">Entrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
      var navbarTop = document.querySelector('.navbar-top');
      if (navbarTopStyle === 'darker') {
        navbarTop.classList.add('navbar-darker');
      }

      var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
      var navbarVertical = document.querySelector('.navbar-vertical');
      if (navbarVertical && navbarVerticalStyle === 'darker') {
        navbarVertical.classList.add('navbar-darker');
      }
    </script>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="vendors/popper/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/anchorjs/anchor.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="vendors/lodash/lodash.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/list.js/list.min.js"></script>
  <script src="vendors/feather-icons/feather.min.js"></script>
  <script src="vendors/dayjs/dayjs.min.js"></script>
  <script src="assets/js/phoenix.js"></script>

</body>

</html>