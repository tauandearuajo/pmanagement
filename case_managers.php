<?php

require_once 'model/database/conexao.php';


session_start();
if (!isset($_SESSION['logado'])) :
  header('Location: index.php');
endif;

$id = $_SESSION['id_usuario'];
$sql = " SELECT*FROM users WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);


//tipo_usuario = $dados['user_level'];
define('Endereco', 'https://admin.emperius.com.br');

$sql_tipo = "SELECT user_type from users where id='$id'";
$resultado_tipo = mysqli_query($connect, $sql_tipo);
$dadoTipo = mysqli_fetch_array($resultado_tipo);
$idcliente = $dados['id'];





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
  <title>Case manager's - Patients Manager</title>


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
  <link href="vendors/choices/choices.min.css" rel="stylesheet">
  <link href="vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
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


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
  <nav class="navbar navbar-vertical navbar-expand-lg">
        <script>
          var navbarStyle = window.config.config.phoenixNavbarStyle;
          if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
          }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
                <!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span class="nav-link-text">Home</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent show" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                      <li class="collapsed-nav-item-title d-none">Home
                      </li>
                      
                      <li class="nav-item"><a class="nav-link active" href="painel.php" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Dashboard</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <!-- label-->
                <p class="navbar-vertical-label">Menu
                </p>
                <hr class="navbar-vertical-line" />
                <!-- parent pages-->
               
                <!-- parent pages patient -->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-patient" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-project-management">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="user"></span></span><span class="nav-link-text">Paciente</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-patient">
                      <li class="collapsed-nav-item-title d-none">Paciente
                      </li>
                      <li class="nav-item"><a class="nav-link" href="novo_patient.php" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Criar novo</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="patients.php" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Lista de pacientes</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- parent pages case manager-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-project-management" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-project-management">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="clipboard"></span></span><span class="nav-link-text">Case manager</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-project-management">
                      <li class="collapsed-nav-item-title d-none">Case manager
                      </li>
                      <li class="nav-item"><a class="nav-link" href="novo_case_manager.php" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Criar novo</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="case_managers.php" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Lista de casos</span>
                          </div>
                        </a>
                        <!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
                
               
                <!-- parent pages - advogados -->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="advogados.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="briefcase"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Advogados</span></span>
                    </div>
                  </a>
                </div>
                <!-- parent pages - doutores-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="doutores.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><span data-feather="pocket"></span></span>
                      <span class="nav-link-text-wrapper"><span class="nav-link-text">Doutores</span></span>
                    </div>
                  </a>
                </div>
                <!-- parent pages - seguros-->
                <div class="nav-item-wrapper">
                  <a class="nav-link label-1" href="seguros.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <span data-feather="lock"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Seguros</span></span>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <!-- label-->
                <p class="navbar-vertical-label">Sistema
                </p>
                <hr class="navbar-vertical-line" />
                <!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="notifications.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="bell"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Notifications</span></span>
                    </div>
                  </a>
                </div>
                <!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="users.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="users"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Usuários</span></span>
                    </div>
                  </a>
                </div>
                <!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="" role="button" data-bs-toggle="activities.php" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="clock"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Atividades</span></span>
                    </div>
                  </a>
                </div>
              </li>
            
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer">
          <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Menu resumido</span></button>
        </div>
      </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
      <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">

          <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <a class="navbar-brand me-1 me-sm-3" href="index.html">
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center"><img src="assets/img/logo_patients.png" alt="phoenix" width="80" />
                <p class="logo-text ms-2 d-none d-sm-block">Patients Management</p>
              </div>
            </div>
          </a>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2">
              <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
              <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label>
              <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell" style="height:20px;width:20px;"></span></a>

            <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">
                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-black mb-0">Notificações</h5>
                    <button class="btn btn-link p-0 fs--1 fw-normal" type="button">Veja sua notificações</button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="assets/img/team/40x40/30.webp" alt="" />
                            </div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block">
                            <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer p-0 border-top border-0">
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="">Ver todas</a></div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-l ">
                <img class="rounded-circle " src="<?= $dados['photo_user'] ?>" alt="" />

              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
              <div class="card position-relative border-0">
                <div class="card-body p-0">
                  <div class="text-center pt-4 pb-3">
                    <div class="avatar avatar-xl ">
                      <img class="rounded-circle " src="<?= $dados['photo_user'] ?>" alt="" />

                    </div>
                    <h6 class="mt-2 text-black"><?= $dados['name'] ?></h6>
                  </div>
                  <div class="mb-3 mx-3">
                    <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
                  </div>
                </div>
                <div class="overflow-auto scrollbar" style="height: 10rem;">
                  <ul class="nav d-flex flex-column mb-2 pb-1">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Meu perfil</span></a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Atividades recentes</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Central de ajuda</a></li>
                  </ul>
                </div>
                <div class="card-footer p-0 border-top">
                  <hr />
                  <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sair</a></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="content">
     
      <div class="pb-6">
        <h2 class="mb-4">Case Manager's</h2>
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
          <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
              <div class="d-md-flex justify-content-between">
                <div>
                  <a class="btn btn-primary me-4" href="novo_case_manager.php"><span class="fas fa-plus me-2"></span>Criar novo</a>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive scrollbar mx-n1 px-1 border-top">
            <table class="table fs--1 mb-0 leads-table">
              <thead>
                <tr>
                  <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" type="checkbox" data-bulk-select='{"body":"leal-tables-body"}' readonly />
                    </div>
                  </th>
                  <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Nome</th>
                  <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="email" style="width:15%;">
                    <div class="d-inline-flex flex-center">
                      <div class="d-flex align-items-center px-1 py-1 bg-success-100 rounded me-2"><span class="text-success-600 dark__text-success-300" data-feather="mail"></span></div><span>Email</span>
                    </div>
                  </th>
                  <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="phone" style="width:15%; min-width: 180px;">
                    <div class="d-inline-flex flex-center">
                      <div class="d-flex align-items-center px-1 py-1 bg-primary-100 rounded me-2"><span class="text-primary-600 dark__text-primary-300" data-feather="phone"></span></div><span>Telefone</span>
                    </div>
                  </th>
                 
                  <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="company" style="width:15%;">
                    <div class="d-inline-flex flex-center">
                      <div class="d-flex align-items-center px-1 py-1 bg-warning-100 rounded me-2"><span class="text-warning-600 dark__text-warning-300" data-feather="grid"></span></div><span>Endereço</span>
                    </div>
                  </th>
                  <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="contact" style="width:15%;">
                    <div class="d-inline-flex flex-center">
                      <div class="d-flex align-items-center px-1 py-1 bg-info-100 rounded me-2"><span class="text-info-600 dark__text-info-300" data-feather="user"></span></div><span>Status</span>
                    </div>
                  </th>
                  <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="date" style="width:15%;">Criado em</th>
                  <th class="sort text-end align-middle pe-0 ps-4" scope="col">Opções</th>
                </tr>
              </thead>
              <tbody class="list" id="leal-tables-body">
                <?php
                $sql_cm = "SELECT*FROM casemanager";
                $query_cm = mysqli_query($connect,$sql_cm);
                while($cm = mysqli_fetch_array($query_cm)):
                ?>
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <!--<td class="fs--1 align-middle">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Anthoney Michael","designation":"VP Accounting","status":{"label":"new lead","type":"badge-phoenix-primary"}},"email":"anth125@gmail.com","phone":"+1-202-555-0126","contact":"Ally Aagaard","company":"Google.inc","date":"Jan 01, 12:56 PM"}' />
                    </div>
                  </td>-->
                  <td class="name align-middle white-space-nowrap fw-semi-bold ps-4">
                    <div class="d-flex align-items-center"><a href="#!">
                        <!--<div class="avatar avatar-xl me-3"><img class="rounded-circle" src="assets/img/team/32.webp" alt="" />
                        </div>-->
                      </a>
                      <div><a class="fs-0 fw-bold" ><?= $cm['first_name']." ".$cm['last_name'] ?></a>
                       
                      </div>
                    </div>
                  </td>
                  <td class="email align-middle white-space-nowrap fw-semi-bold ps-4 border-end">  </td>
                  <td class="email align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><a class="text-1000" href="mailto:anth125@gmail.com"><?= $cm['email'] ?></a></td>
                  <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><a class="text-1000" href="tel:+1-202-555-0126"><?= $cm['address'] ?></a></td>
                  <td class="contact align-middle white-space-nowrap ps-4 border-end fw-semi-bold text-1000"><?= $cm['email'] ?></td>
                  <td class="company align-middle white-space-nowrap text-600 ps-4 border-end fw-semi-bold text-1000"><?= $cm['status'] ?></td>
                  <td class="date align-middle white-space-nowrap text-600 ps-4 text-700 border-end"><?= $cm['created_at'] ?></td>
                  <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
                    <div class="font-sans-serif btn-reveal-trigger position-static">
                      <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Ver</a>
                     
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#!">Excluir</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          <div class="row align-items-center justify-content-end py-4 pe-0 fs--1">
            <div class="col-auto d-flex">
              <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
              <a class="fw-semi-bold" href="#!" data-list-view="*">Ver todos<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">Ver alguns<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
            <div class="col-auto d-flex">
              <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
              <ul class="mb-0 pagination"></ul>
              <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute">
        <div class="row g-0 justify-content-between align-items-center h-100">
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;<a class="mx-1" href="https://themewagon.com">Themewagon</a></p>
          </div>
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-600">v1.13.0</p>
          </div>
        </div>
      </footer>
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
  <script src="vendors/choices/choices.min.js"></script>
  <script src="assets/js/phoenix.js"></script>

</body>

</html>