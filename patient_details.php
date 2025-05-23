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

$id_patient = $_GET['IDPATIENT'];


//tipo_usuario = $dados['user_level'];
define('Endereco', 'https://admin.emperius.com.br');

$sql_tipo = "SELECT user_type from users where id='$id'";
$resultado_tipo = mysqli_query($connect, $sql_tipo);
$dadoTipo = mysqli_fetch_array($resultado_tipo);
$idcliente = $dados['id'];


$sql_patient = "SELECT*FROM patient  where id='$id_patient'";
$query_patient = mysqli_query($connect, $sql_patient);
$patient = mysqli_fetch_array($query_patient);

$id_insurance = $patient['insurance_id'];
$id_attorney = $patient['attorney_id'];
$id_doctor = $patient['doctors_id'];

$sql_doctors = "SELECT*FROM doctors  where id='$id_doctor'";
$query_doctors = mysqli_query($connect, $sql_doctors);
$doctors = mysqli_fetch_array($query_doctors);

$sql_attorney = "SELECT*FROM attorney  where id='$id_attorney'";
$query_attorney = mysqli_query($connect, $sql_attorney);
$attorney = mysqli_fetch_array($query_attorney);

$sql_insurance = "SELECT*FROM insurance  where id='$id_insurance'";
$query_insurance = mysqli_query($connect, $sql_insurance);
$insurance = mysqli_fetch_array($query_insurance);

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
  <link href="vendors/dropzone/dropzone.min.css" rel="stylesheet">
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
    <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
      <div class="modal-dialog">
        <div class="modal-content mt-15 rounded-pill">
          <div class="modal-body p-0">
            <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                <input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>

              </form>
              <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
                <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
              </div>
              <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar-overlay" style="max-height: 30rem;">
                  <div class="list pb-3">
                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="img-fluid" src="assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                        <div class="avatar avatar-l status-online  me-2 text-900">
                          <img class="rounded-circle " src="assets/img/team/40x40/10.webp" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                          <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                        <div class="avatar avatar-l  me-2 text-900">
                          <img class="rounded-circle " src="assets/img/team/40x40/12.webp" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">John Smith</h6>
                          <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>

                    </div>
                  </div>
                  <div class="text-center">
                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="pb-9">
        <div class="row align-items-center justify-content-between g-3 mb-4">
          <div class="col-12 col-md-auto">
            <h2 class="mb-0">Detalhes do paciente - <?= $patient['first_name'] . " " . $patient['last_name'] ?></h2>
          </div>
          <div class="col-12 col-md-auto d-flex">
            <button class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span class="fa-solid fa-edit me-sm-2"></span><span class="d-none d-sm-inline">Editar </span></button>
            <button class="btn btn-phoenix-danger me-2"><span class="fa-solid fa-trash me-2"></span><span>Excluir</span></button>

          </div>
        </div>
        <div class="row g-4 g-xl-6">
          <div class="col-xl-5 col-xxl-4">
            <div class="sticky-leads-sidebar">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row align-items-center g-3">
                    <div class="col-12 col-sm-auto flex-1">
                      <h3 class="fw-bolder mb-2 line-clamp-1"><?php echo $patient['first_name'] . " " . $patient['last_name'] ?></h3>
                      <div class="d-flex align-items-center mb-4">
                        <h5 class="mb-0 me-4">Localidade: <?= $patient['local'] ?> </h5>
                      </div>
                      <div class="d-md-flex d-xl-block align-items-center justify-content-between mb-5">
                        <div class="d-flex align-items-center mb-3 mb-md-0 mb-xl-3">
                          <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="assets/img/team/72x72/58.webp" alt="" /></div>
                          <div>
                            <h5>Data de nascumento: <?= $patient['date_brithday'] ?></h5>

                          </div>
                        </div>
                        <div>
                          <!---
                          <span class="badge badge-phoenix badge-phoenix-success me-2">Success</span>
                          <span class="badge badge-phoenix badge-phoenix-danger me-2">Lost</span>
                          <span class="badge badge-phoenix badge-phoenix-secondary">Close</span>--->
                        </div>
                      </div>
                      <div class="progress mb-2" style="height:5px">
                        <div class="progress-bar bg-primary-200" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0"> Ultima atualização</p>
                        <div><span class="d-inline-block lh-sm me-1" data-feather="clock" style="height:16px;width:16px;"></span><span class="d-inline-block lh-sm"> <?= $patient['updated_at'] ?></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-5">Informações complementares</h4>
                  <div class="row g-3">
                    <div class="col-12">
                      <div class="mb-4">
                        <div class="d-flex flex-wrap justify-content-between mb-2">
                          <h5 class="mb-0 text-1000 me-2">Doutor que acompanha o caso: <?= $doctors['firstname'] ?></h5>
                      
                        </div>
                        
                      </div>
                      <div class="mb-4">
                        <h5 class="mb-0 text-1000 mb-2">Seguro: <?= $insurance['name'] ?></h5>
                        
                      </div>
                      <div class="mb-4">
                        <h5 class="mb-0 text-1000 mb-2">Advogado: <?= $attorney['name'] ?></h5>
                       
                      </div>
                   
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-xxl-8">
            <div class="card mb-5">
              <div class="card-body">
                <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="col-sm-auto">
                    <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                      <div class="d-flex bg-success-100 rounded flex-center me-3 mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px"><span class="text-success-600 dark__text-success-300" data-feather="dollar-sign" style="width:24px; height:24px"></span></div>
                      <div>
                        <p class="fw-bold mb-1">S.S</p>
                        <h4 class="fw-bolder text-nowrap"><?= $patient['ss'] ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-auto">
                    <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center border-start-sm ps-sm-5">
                      <div class="d-flex bg-info-100 rounded flex-center me-3 mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px"><span class="text-info-600 dark__text-info-300" data-feather="code" style="width:24px; height:24px"></span></div>
                      <div>
                        <p class="fw-bold mb-1">Idade</p>
                        <h4 class="fw-bolder text-nowrap"><?= $patient['ss'] ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-auto">
                    <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center border-start-sm ps-sm-5">
                      <div class="d-flex bg-primary-100 rounded flex-center me-3 mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px"><span class="text-primary-600 dark__text-primary-300" data-feather="layout" style="width:24px; height:24px"></span></div>
                      <div>
                        <p class="fw-bold mb-1">Tipo de acidente: </p>
                        <h4 class="fw-bolder text-nowrap"><?= $patient['type_of_accident'] ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-xl-4 mb-7">
              <div class="row mx-0 mx-sm-3 mx-lg-0 px-lg-0">
                
                <div class="col-sm-12 col-xxl-6 border-bottom py-3">
                  <table class="w-100 table-stats">
                    
                    <tr>
                      <td class="py-2">
                        <div class="d-inline-flex align-items-center">
                          <div class="d-flex bg-primary-100 rounded-circle flex-center me-3" style="width:24px; height:24px"><span class="text-primary-600 dark__text-primary-300" data-feather="phone" style="width:16px; height:16px"></span></div>
                          <p class="fw-bold mb-0">Telefone</p>
                        </div>
                      </td>
                      <td class="py-2 d-none d-sm-block pe-sm-2">:</td>
                      <td class="py-2"><a class="ps-6 ps-sm-0 fw-semi-bold mb-0 pb-3 pb-sm-0 text-900" href="tel:+11123456789"><?= $patient['phone_number'] ?></a></td>
                    </tr>
                    <tr>
                      <td class="py-2">
                        <div class="d-flex align-items-center">
                          <div class="d-flex bg-warning-100 rounded-circle flex-center me-3" style="width:24px; height:24px"><span class="text-warning-600 dark__text-warning-300" data-feather="document" style="width:16px; height:16px"></span></div>
                          <p class="fw-bold mb-0">Endereço: </p>
                        </div>
                      </td>
                      <td class="py-2 d-none d-sm-block pe-sm-2">:</td>
                      <td class="py-2"><a class="ps-6 ps-sm-0 fw-semi-bold mb-0 text-900" href="mailto:jacksonpol@email.com"><?= $patient['address'] ?></a></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-12 col-xxl-6 border-end-xxl border-bottom border-bottom-xxl-0 py-3">
                  <table class="w-100 table-stats">
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td class="py-2">
                        <div class="d-inline-flex align-items-center">
                          <div class="d-flex bg-success-100 rounded-circle flex-center me-3" style="width:24px; height:24px"><span class="text-success-600 dark__text-success-300" data-feather="users" style="width:16px; height:16px"></span></div>
                          <p class="fw-bold mb-0">Cidade - Estado - Zip code</p>
                        </div>
                      </td>
                      <td class="py-2 d-none d-sm-block pe-sm-2">:</td>
                      <td class="py-2">
                        <div class="ps-6 ps-sm-0 fw-semi-bold mb-0 pb-3 pb-sm-0"><?= $patient['city_state_zip'] ?></div>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2">
                        <div class="d-flex align-items-center">
                          <div class="d-flex bg-info-100 rounded-circle flex-center me-3" style="width:24px; height:24px"><span class="text-info-600 dark__text-info-300" data-feather="edit" style="width:16px; height:16px"></span></div>
                          <p class="fw-bold mb-0">Modified By</p>
                        </div>
                      </td>
                      <td class="py-2 d-none d-sm-block pe-sm-2">:</td>
                      <td class="py-2">
                        <div class="ps-6 ps-sm-0 fw-semi-bold mb-0">Ansolo Lazinatov</div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-12 col-xxl-6 py-3">
                  <table class="w-100 table-stats">
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td class="py-2">
                        <div class="d-inline-flex align-items-center">
                          <div class="d-flex bg-info-100 rounded-circle flex-center me-3" style="width:24px; height:24px"><span class="text-info-600 dark__text-info-300" data-feather="clock" style="width:16px; height:16px"></span></div>
                          <p class="fw-bold mb-0">Create Date</p>
                        </div>
                      </td>
                      <td class="py-2 d-none d-sm-block pe-sm-2">:</td>
                      <td class="py-2">
                        <div class="ps-6 ps-sm-0 fw-semi-bold mb-0 pb-3 pb-sm-0">Nov 30, 2022</div>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2">
                        <div class="d-flex align-items-center">
                          <div class="d-flex bg-warning-100 rounded-circle flex-center me-3" style="width:24px; height:24px"><span class="text-warning-600 dark__text-warning-300" data-feather="clock" style="width:16px; height:16px"></span></div>
                          <p class="fw-bold mb-0">Closing Date</p>
                        </div>
                      </td>
                      <td class="py-2 d-none d-sm-block pe-sm-2">:</td>
                      <td class="py-2">
                        <div class="ps-6 ps-sm-0 fw-semi-bold mb-0">Dec 15, 2022</div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <ul class="nav nav-underline deal-details scrollbar flex-nowrap w-100 pb-1 mb-6" id="myTab" role="tablist" style="overflow-y: hidden;">
              <li class="nav-item text-nowrap me-2" role="presentation"><a class="nav-link active" id="activity-tab" data-bs-toggle="tab" href="#tab-activity" role="tab" aria-controls="tab-activity" aria-selected="false" tabindex="-1"> <span class="fa-solid fa-chart-line me-2 tab-icon-color"></span>Activity</a></li>
              <li class="nav-item text-nowrap me-2" role="presentation"><a class="nav-link" id="notes-tab" data-bs-toggle="tab" href="#tab-notes" role="tab" aria-controls="tab-notes" aria-selected="false" tabindex="-1"> <span class="fa-solid fa-clipboard me-2 tab-icon-color"></span>Notas</a></li>
              <li class="nav-item text-nowrap me-2" role="presentation"><a class="nav-link" id="attachments-tab" data-bs-toggle="tab" href="#tab-attachments" role="tab" aria-controls="tab-attachments" aria-selected="true"> <span class="fa-solid fa-paperclip me-2 tab-icon-color"></span>Documentos</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="tab-activity" role="tabpanel" aria-labelledby="activity-tab">
                <h2 class="mb-4">Activity</h2>
                <div class="row align-items-center g-3 justify-content-between justify-content-start">
                  <div class="col-12 col-sm-auto">
                    <div class="search-box mb-2 mb-sm-0">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search Activity" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>

                      </form>
                    </div>
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-phoenix-primary px-6">Add Activity</button>
                  </div>
                </div>
                <div class="border-bottom py-4">
                  <div class="d-flex">
                    <div class="d-flex bg-primary-100 rounded-circle flex-center me-3 bg-primary-100" style="width:25px; height:25px"><span class="fa-solid text-primary-600 dark__text-primary-300 fs--1 fa-clipboard text-primary-600 dark__text-primary-300"></span></div>
                    <div class="flex-1">
                      <div class="d-flex justify-content-between flex-column flex-xl-row mb-2 mb-sm-0">
                        <div class="flex-1 me-2">
                          <h5 class="text-1000 lh-sm">Assigned as a director for Project The Chewing Gum Attack</h5>
                          <p class="fs--1 mb-0">by<a class="ms-1" href="#!">Jackson Pollock</a></p>
                        </div>
                        <div class="fs--1"><span class="fa-regular fa-calendar-days text-primary me-2"></span><span class="fw-semi-bold">22 September, 2022, 4:33 PM</span></div>
                      </div>
                      <p class="fs--1 mb-0">Utilizing best practices to better leverage our assets, we must engage in black sky leadership thinking, not the usual band-aid solution. </p>
                    </div>
                  </div>
                </div>
                <div class="border-bottom py-4">
                  <div class="d-flex">
                    <div class="d-flex bg-primary-100 rounded-circle flex-center me-3 bg-info-100" style="width:25px; height:25px"><span class="fa-solid text-primary-600 dark__text-primary-300 fs--1 fa-video text-info-600 dark__text-info-300"></span></div>
                    <div class="flex-1">
                      <div class="d-flex justify-content-between flex-column flex-xl-row mb-2 mb-sm-0">
                        <div class="flex-1 me-2">
                          <h5 class="text-1000 lh-sm">Onboarding Meeting</h5>
                          <p class="fs--1 mb-0">by<a class="ms-1" href="#!">Jackson Pollock</a></p>
                        </div>
                        <div class="fs--1"><span class="fa-regular fa-calendar-days text-primary me-2"></span><span class="fw-semi-bold">20 September, 2022, 5:31pm</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="border-bottom py-4">
                  <div class="d-flex">
                    <div class="d-flex bg-primary-100 rounded-circle flex-center me-3 bg-success-100" style="width:25px; height:25px"><span class="fa-solid text-primary-600 dark__text-primary-300 fs--1 fa-square-check text-success-600 dark__text-success-300"></span></div>
                    <div class="flex-1">
                      <div class="d-flex justify-content-between flex-column flex-xl-row mb-2 mb-sm-0">
                        <div class="flex-1 me-2">
                          <h5 class="text-1000 lh-sm">Designing the dungeon</h5>
                          <p class="fs--1 mb-0">by<a class="ms-1" href="#!">Jackson Pollock</a></p>
                        </div>
                        <div class="fs--1"><span class="fa-regular fa-calendar-days text-primary me-2"></span><span class="fw-semi-bold">19 September, 2022, 4:39pm </span></div>
                      </div>
                      <p class="fs--1 mb-0">To get off the runway and paradigm shift, we should take brass tacks with above-the-board actionable analytics, ramp up with viral partnering, not the usual goat rodeo putting socks on an octopus. </p>
                    </div>
                  </div>
                </div>
                <div class="border-bottom py-4">
                  <div class="d-flex">
                    <div class="d-flex bg-primary-100 rounded-circle flex-center me-3 bg-warning-100" style="width:25px; height:25px"><span class="fa-solid text-primary-600 dark__text-primary-300 fs--1 fa-phone-alt text-warning-600 dark__text-warning-300"></span></div>
                    <div class="flex-1">
                      <div class="d-flex justify-content-between flex-column flex-xl-row mb-2 mb-sm-0">
                        <div class="flex-1 me-2">
                          <h5 class="text-1000 lh-sm">Purchasing-Related Vendors</h5>
                          <p class="fs--1 mb-0">by<a class="ms-1" href="#!">Ansolo Lazinatov</a></p>
                        </div>
                        <div class="fs--1"><span class="fa-regular fa-calendar-days text-primary me-2"></span><span class="fw-semi-bold">22 September, 2022, 4:30pm</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="border-bottom py-4">
                  <div class="d-flex">
                    <div class="d-flex bg-primary-100 rounded-circle flex-center me-3 bg-danger-100" style="width:25px; height:25px"><span class="fa-solid text-primary-600 dark__text-primary-300 fs--1 fa-envelope text-danger-600 dark__text-danger-300"></span></div>
                    <div class="flex-1">
                      <div class="d-flex justify-content-between flex-column flex-xl-row mb-2 mb-sm-0">
                        <div class="flex-1 me-2">
                          <h5 class="text-1000 lh-sm">Quary about purchased soccer socks</h5>
                          <p class="fs--1 mb-0">by<a class="ms-1" href="#!">Ansolo Lazinatov</a></p>
                        </div>
                        <div class="fs--1"><span class="fa-regular fa-calendar-days text-primary me-2"></span><span class="fw-semi-bold">15 September, 2022, 3:33pm</span></div>
                      </div>
                      <p class="fs--1 mb-0">I’ve come across your posts and found some favorable deals on your page. I’ve added a load of products to the cart and I don’t know the payment options you avail. Also, can you enlighten me about any discount.</p>
                    </div>
                  </div>
                </div>
                <div class="pt-4">
                  <div class="d-flex">
                    <div class="d-flex bg-primary-100 rounded-circle flex-center me-3 bg-primary-100" style="width:25px; height:25px"><span class="fa-solid text-primary-600 dark__text-primary-300 fs--1 fa-paperclip text-primary-600 dark__text-primary-300"></span></div>
                    <div class="flex-1">
                      <div class="d-flex justify-content-between flex-column flex-xl-row mb-2 mb-sm-0">
                        <div class="flex-1 me-2">
                          <h5 class="text-1000 lh-sm">Added image</h5>
                          <p class="fs--1 mb-0">by<a class="ms-1" href="#!">Ansolo Lazinatov</a></p>
                        </div>
                        <div class="fs--1"><span class="fa-regular fa-calendar-days text-primary me-2"></span><span class="fw-semi-bold">11 September, 2022, 12:15am </span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-notes" role="tabpanel" aria-labelledby="notes-tab">
                <h2 class="mb-4">Notes</h2>
                <textarea class="form-control mb-3" id="notes" rows="4"> </textarea>
                <div class="row gy-4">
                  <div class="col-12 col-xl-auto flex-1">
                    <div class="border-2 border-dashed mb-4 pb-4 border-bottom">
                      <p class="mb-1 text-1000">Gave us a nice feedback</p>
                      <div class="d-flex">
                        <div class="fs--1 text-600"><span class="fa-solid fa-clock me-2"></span><span class="fw-semi-bold me-1">clock 12 Nov, 2018</span></div>
                        <p class="fs--1 mb-0 text-600">by<a class="ms-1 fw-semi-bold" href="#!">Ansolo Lazinatov</a></p>
                      </div>
                    </div>
                    <div class="border-2 border-dashed mb-4 pb-4 border-bottom">
                      <p class="mb-1 text-1000">I also want to let you know that I am available to you as your real estate insider from now on. If you have any questions about the market, even if they sound silly, call or text anytime. </p>
                      <div class="d-flex">
                        <div class="fs--1 text-600"><span class="fa-solid fa-clock me-2"></span><span class="fw-semi-bold me-1"> 30 Jan, 2019</span></div>
                        <p class="fs--1 mb-0 text-600">by<a class="ms-1 fw-semi-bold" href="#!">Ansolo Lazinatov</a></p>
                      </div>
                    </div>
                    <div class="border-2 border-dashed mb-4 pb-4 border-bottom">
                      <p class="mb-1 text-1000">To get off the runway and paradigm shift, we should take brass tacks with above-the-board actionable analytics, ramp up with viral partnering, not the usual goat rodeo putting socks on an octopus. </p>
                      <div class="d-flex">
                        <div class="fs--1 text-600"><span class="fa-solid fa-clock me-2"></span><span class="fw-semi-bold me-1">19 September, 2022, 4:39pm </span></div>
                        <p class="fs--1 mb-0 text-600">by<a class="ms-1 fw-semi-bold" href="#!">Jackson Pollock</a></p>
                      </div>
                    </div>
                    <div class="border-2 border-dashed">
                      <p class="mb-1 text-1000">Utilizing best practices to better leverage our assets, we must engage in black sky leadership thinking, not the usual band-aid solution. </p>
                      <div class="d-flex">
                        <div class="fs--1 text-600"><span class="fa-solid fa-clock me-2"></span><span class="fw-semi-bold me-1">22 September, 2022, 4:30pm</span></div>
                        <p class="fs--1 mb-0 text-600">by<a class="ms-1 fw-semi-bold" href="#!">Ansolo Lazinatov</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-meeting" role="tabpanel" aria-labelledby="meeting-tab">
                <h2 class="mb-4">Meeting</h2>
                <div class="row align-items-center g-2 flex-wrap justify-content-start mb-3">
                  <div class="col-12 col-sm-auto">
                    <div class="search-box mb-2 mb-sm-0">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search meeting" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>

                      </form>
                    </div>
                  </div>
                  <div class="col-auto d-flex flex-md-grow-1">
                    <p class="mb-0 fs--1 text-700 fw-bold"><span class="fas fa-filter me-1 fw-extra-bold fs--2"></span>23 tasks</p>
                    <button class="btn btn-link p-0 ms-3 fs--1 text-primary fw-bold text-decoration-none"><span class="fas fa-sort me-1 fw-extra-bold fs--2"></span>Sorting</button>
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-primary"><span class="fa-solid fa-plus me-2"></span>Add Meeting </button>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-xxl-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-4 gap-2">
                          <div class="mb-3 mb-sm-0">
                            <h4 class="line-clamp-1 mb-2 mb-sm-1">Onboarding Meeting</h4>
                            <div><span class="uil uil-calendar-alt text-primary me-2"></span><span class="fw-semi-bold text-800 fs--1">5:30 pm</span><span class="text-600"> to</span><span class="fw-semi-bold text-800 fs--1">7:00pm</span><span class="text-800 fs--1"> - 1h 30min</span></div>
                          </div>
                          <div class="avatar-group avatar-group-dense">
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/9.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/25.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/32.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/35.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <div class="avatar-name rounded-circle "><span>+1</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center"><span class="badge badge-phoenix me-2 badge-phoenix-primary ">today</span>
                          <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-circle me-1 text-danger" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900">Urgent</span></div>
                          <button class="btn btn-phoenix-primary"><span class="fa-solid fa-video me-2 d-none d-sm-inline-block"></span>Join</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-4 gap-2">
                          <div class="mb-3 mb-sm-0">
                            <h4 class="line-clamp-1 mb-2 mb-sm-1">Agile Mindset Meetup</h4>
                            <div><span class="uil uil-calendar-alt text-primary me-2"></span><span class="fw-semi-bold text-800 fs--1">4:30 pm</span><span class="text-600"> to</span><span class="fw-semi-bold text-800 fs--1">6:00pm</span><span class="text-800 fs--1"> - 1h 30min</span></div>
                          </div>
                          <div class="avatar-group avatar-group-dense">
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/11.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/26.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/33.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/30.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <div class="avatar-name rounded-circle "><span>+1</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center"><span class="badge badge-phoenix me-2 badge-phoenix-warning">tomorrow</span>
                          <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-circle me-1 text-success" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900">Medium</span></div>
                          <button class="btn btn-phoenix-primary"><span class="fa-solid fa-video me-2 d-none d-sm-inline-block"></span>Join</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-4 gap-2">
                          <div class="mb-3 mb-sm-0">
                            <h4 class="line-clamp-1 mb-2 mb-sm-1">Meeting Fundamentals</h4>
                            <div><span class="uil uil-calendar-alt text-primary me-2"></span><span class="fw-semi-bold text-800 fs--1">6:00 pm</span><span class="text-600"> to</span><span class="fw-semi-bold text-800 fs--1">7:20pm</span><span class="text-800 fs--1"> - 1h 20min</span></div>
                          </div>
                          <div class="avatar-group avatar-group-dense">
                            <div class="avatar avatar-s  rounded-circle">
                              <div class="avatar-name rounded-circle"><span>R</span></div>
                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/12.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/28.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/22.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <div class="avatar-name rounded-circle "><span>+2</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center"><span class="badge badge-phoenix me-2 badge-phoenix-warning">tomorrow</span>
                          <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-circle me-1 text-warning" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900">High</span></div>
                          <button class="btn btn-phoenix-primary"><span class="fa-solid fa-video me-2 d-none d-sm-inline-block"></span>Join</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xxl-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-4 gap-2">
                          <div class="mb-3 mb-sm-0">
                            <h4 class="line-clamp-1 mb-2 mb-sm-1">Design System Meeting</h4>
                            <div><span class="uil uil-calendar-alt text-primary me-2"></span><span class="fw-semi-bold text-800 fs--1">7:30 pm</span><span class="text-600"> to</span><span class="fw-semi-bold text-800 fs--1">8:45pm</span><span class="text-800 fs--1"> - 1h 45min</span></div>
                          </div>
                          <div class="avatar-group avatar-group-dense">
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/13.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/24.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/62.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <img class="rounded-circle " src="assets/img/team/34.webp" alt="" />

                            </div>
                            <div class="avatar avatar-s  rounded-circle">
                              <div class="avatar-name rounded-circle "><span>+4</span></div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center"><span class="badge badge-phoenix me-2 badge-phoenix-warning">tomorrow</span>
                          <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-circle me-1 text-info" data-fa-transform="shrink-6 up-1"></span><span class="fw-bold fs--1 text-900">Low</span></div>
                          <button class="btn btn-phoenix-primary"><span class="fa-solid fa-video me-2 d-none d-sm-inline-block"></span>Join</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-task" role="tabpanel" aria-labelledby="task-tab">
                <h2 class="mb-4">Tasks</h2>
                <div class="row align-items-center g-0 justify-content-start mb-3">
                  <div class="col-12 col-sm-auto">
                    <div class="search-box w-100 mb-2 mb-sm-0" style="max-width:30rem;">
                      <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search tasks" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>

                      </form>
                    </div>
                  </div>
                  <div class="col-auto d-flex">
                    <p class="mb-0 ms-sm-3 fs--1 text-700 fw-bold"><span class="fas fa-filter me-1 fw-extra-bold fs--2"></span>23 tasks</p>
                    <button class="btn btn-link p-0 ms-3 fs--1 text-primary fw-bold"><span class="fas fa-sort me-1 fw-extra-bold fs--2"></span>Sorting</button>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-1">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-0" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-0">Platforms for data administration</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">19 Nov, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">11:56 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-2">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-1" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-1">Make wiser business choices.</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">05 Nov, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">09:30 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-3">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-2" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-2">Market and consumer insights</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">02 Nov, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">05:25 AM</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-4">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-3" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-3">Dashboards for business insights</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">29 Oct, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">08:21 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-5">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-4" checked="checked" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-4">Analytics and consultancy for data</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">21 Oct, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">03:45 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-6">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-5" checked="checked" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-5">Planning your locations Customer data platform</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">14 Oct, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">10:00 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-200 py-3 gx-0 border-top">
                  <div class="col-12 col-lg-auto flex-1">
                    <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-7">
                      <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                        <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-6" checked="checked" />
                        <label class="form-check-label mb-0 fs-0 me-2 line-clamp-1" for="checkbox-todo-6">Promotion of technology</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto">
                    <div class="d-flex ms-4 lh-1 align-items-center">
                      <p class="text-700 fs--2 mb-md-0 me-2 me-lg-3 mb-0">12 Oct, 2022</p>
                      <div class="d-none d-lg-block end-0 position-absolute" style="top: 23%;">
                        <div class="hover-actions end-0">
                          <button class="btn btn-phoenix-secondary btn-icon me-1 fs--2 text-900 px-0 me-1"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-phoenix-secondary btn-icon fs--2 text-danger px-0"><span class="fas fa-trash"></span></button>
                        </div>
                      </div>
                      <div class="hover-lg-hide">
                        <p class="text-700 fs--2 ps-lg-3 border-start-lg border-300 fw-bold mb-md-0 mb-0">02:00 AM</p>
                      </div>
                    </div>
                  </div>
                </div><a class="fw-bold fs--1 mt-4" href="#!"><span class="fas fa-plus me-1"></span>Add new task</a>
              </div>
              <div class="tab-pane fade" id="tab-call" role="tabpanel" aria-labelledby="call-tab">
                <div class="row align-items-center gx-4 gy-3 flex-wrap mb-3">
                  <div class="col-auto d-flex flex-1">
                    <h2 class="mb-0">Call</h2>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex gap-3 gap-sm-4">
                      <div class="form-check">
                        <input class="form-check-input" id="allCall" type="radio" name="allCall" checked="checked" />
                        <label class="form-check-label" for="allCall">All Call</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" id="incomingCall" type="radio" name="allCall" />
                        <label class="form-check-label" for="incomingCall">Incoming Call</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" id="outgoingCall" type="radio" name="allCall" />
                        <label class="form-check-label" for="outgoingCall">OutgoingCall</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-primary"><span class="fa-solid fa-plus me-2"></span>Add Call</button>
                  </div>
                </div>
                <div class="border-top border-bottom border-200" id="leadDetailsTable" data-list='{"valueNames":["name","description","create_date","create_by","last_activity"],"page":5,"pagination":true}'>
                  <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table fs--1 mb-0">
                      <thead>
                        <tr>
                          <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select='{"body":"lead-details-table-body"}' />
                            </div>
                          </th>
                          <th class="sort white-space-nowrap align-middle pe-3 ps-0 text-uppercase" scope="col" data-sort="name" style="width:20%; min-width:100px">Name</th>
                          <th class="sort align-middle pe-6 text-uppercase" scope="col" data-sort="description" style="width:20%; max-width:60px">description</th>
                          <th class="sort align-middle text-start text-uppercase" scope="col" data-sort="create_date" style="width:20%; min-width:115px">create date</th>
                          <th class="sort align-middle text-start text-uppercase" scope="col" data-sort="create_by" style="width:20%; min-width:150px">create by</th>
                          <th class="sort align-middle ps-0 text-end text-uppercase" scope="col" data-sort="last_activity" style="width:20%; max-width:115px">Last Activity</th>
                          <th class="align-middle pe-0 text-end" scope="col" style="width:15%;"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="lead-details-table-body">
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="fs--1 align-middle px-0 py-3">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select-row='{"Name":{"avatar":"/team/35.webp","name":"Ansolo Lazinatov","status":"online"},"description":"Purchasing-Related Vendors","date":"Dec 29, 2021","creatBy":"Ansolo Lazinarov","lastActivity":{"iconColor":"text-success","label":"Active"}}' />
                            </div>
                          </td>
                          <td class="name align-middle white-space-nowrap py-2 ps-0"><a class="d-flex align-items-center text-1000" href="#!">
                              <div class="avatar avatar-m me-3 status-online"><img class="rounded-circle" src="assets/img/team/35.webp" alt="" />
                              </div>
                              <h6 class="mb-0 text-1000 fw-bold">Ansolo Lazinatov</h6>
                            </a></td>
                          <td class="description align-middle white-space-nowrap text-start fw-bold text-700 py-2 pe-6">Purchasing-Related Vendors</td>
                          <td class="create_date text-end align-middle white-space-nowrap text-900 py-2">Dec 29, 2021</td>
                          <td class="create_by align-middle white-space-nowrap fw-semi-bold text-1000">Ansolo Lazinarov</td>
                          <td class="last_activity align-middle text-center py-2">
                            <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-clock me-1 text-success" data-fa-transform="shrink-2 up-1"></span><span class="fw-bold fs--1 text-900">Active</span></div>
                          </td>
                          <td class="align-middle text-end white-space-nowrap pe-0 action py-2">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="fs--1 align-middle px-0 py-3">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select-row='{"Name":{"avatar":"/team/9.webp","name":"Jackson Pollock","status":"offline"},"description":"Based on emails sent rate, the top 10 users","date":"Mar 27, 2021","creatBy":"Jackson Pollock","lastActivity":{"iconColor":"text-500","label":"6 hours ago"}}' />
                            </div>
                          </td>
                          <td class="name align-middle white-space-nowrap py-2 ps-0"><a class="d-flex align-items-center text-1000" href="#!">
                              <div class="avatar avatar-m me-3 status-offline"><img class="rounded-circle" src="assets/img/team/9.webp" alt="" />
                              </div>
                              <h6 class="mb-0 text-1000 fw-bold">Jackson Pollock</h6>
                            </a></td>
                          <td class="description align-middle white-space-nowrap text-start fw-bold text-700 py-2 pe-6">Based on emails sent rate, the top 10 users</td>
                          <td class="create_date text-end align-middle white-space-nowrap text-900 py-2">Mar 27, 2021</td>
                          <td class="create_by align-middle white-space-nowrap fw-semi-bold text-1000">Jackson Pollock</td>
                          <td class="last_activity align-middle text-center py-2">
                            <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-clock me-1 text-500" data-fa-transform="shrink-2 up-1"></span><span class="fw-bold fs--1 text-900">6 hours ago</span></div>
                          </td>
                          <td class="align-middle text-end white-space-nowrap pe-0 action py-2">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="fs--1 align-middle px-0 py-3">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select-row='{"Name":{"avatar":"/team/35.webp","name":"Ansolo Lazinatov","status":"online"},"description":"Based on the percentage of recipients","date":"Jun 24, 2021","creatBy":"Ansolo Lazinarov","lastActivity":{"iconColor":"text-success","label":"Active"}}' />
                            </div>
                          </td>
                          <td class="name align-middle white-space-nowrap py-2 ps-0"><a class="d-flex align-items-center text-1000" href="#!">
                              <div class="avatar avatar-m me-3 status-online"><img class="rounded-circle" src="assets/img/team/35.webp" alt="" />
                              </div>
                              <h6 class="mb-0 text-1000 fw-bold">Ansolo Lazinatov</h6>
                            </a></td>
                          <td class="description align-middle white-space-nowrap text-start fw-bold text-700 py-2 pe-6">Based on the percentage of recipients</td>
                          <td class="create_date text-end align-middle white-space-nowrap text-900 py-2">Jun 24, 2021</td>
                          <td class="create_by align-middle white-space-nowrap fw-semi-bold text-1000">Ansolo Lazinarov</td>
                          <td class="last_activity align-middle text-center py-2">
                            <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-clock me-1 text-success" data-fa-transform="shrink-2 up-1"></span><span class="fw-bold fs--1 text-900">Active</span></div>
                          </td>
                          <td class="align-middle text-end white-space-nowrap pe-0 action py-2">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="fs--1 align-middle px-0 py-3">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select-row='{"Name":{"avatar":"/team/9.webp","name":"Jackson Pollock","status":"offline"},"description":"Obtaining leads today","date":"May 19, 2024","creatBy":"Jackson Pollock","lastActivity":{"iconColor":"text-500","label":"6 hours ago"}}' />
                            </div>
                          </td>
                          <td class="name align-middle white-space-nowrap py-2 ps-0"><a class="d-flex align-items-center text-1000" href="#!">
                              <div class="avatar avatar-m me-3 status-offline"><img class="rounded-circle" src="assets/img/team/9.webp" alt="" />
                              </div>
                              <h6 class="mb-0 text-1000 fw-bold">Jackson Pollock</h6>
                            </a></td>
                          <td class="description align-middle white-space-nowrap text-start fw-bold text-700 py-2 pe-6">Obtaining leads today</td>
                          <td class="create_date text-end align-middle white-space-nowrap text-900 py-2">May 19, 2024</td>
                          <td class="create_by align-middle white-space-nowrap fw-semi-bold text-1000">Jackson Pollock</td>
                          <td class="last_activity align-middle text-center py-2">
                            <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-clock me-1 text-500" data-fa-transform="shrink-2 up-1"></span><span class="fw-bold fs--1 text-900">6 hours ago</span></div>
                          </td>
                          <td class="align-middle text-end white-space-nowrap pe-0 action py-2">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="fs--1 align-middle px-0 py-3">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select-row='{"Name":{"avatar":"/team/35.webp","name":"Ansolo Lazinatov","status":"online"},"description":"Sums up the many phases of new and existing businesses.","date":"Aug 19, 2024","creatBy":"Ansolo Lazinarov","lastActivity":{"iconColor":"text-success","label":"Active"}}' />
                            </div>
                          </td>
                          <td class="name align-middle white-space-nowrap py-2 ps-0"><a class="d-flex align-items-center text-1000" href="#!">
                              <div class="avatar avatar-m me-3 status-online"><img class="rounded-circle" src="assets/img/team/35.webp" alt="" />
                              </div>
                              <h6 class="mb-0 text-1000 fw-bold">Ansolo Lazinatov</h6>
                            </a></td>
                          <td class="description align-middle white-space-nowrap text-start fw-bold text-700 py-2 pe-6">Sums up the many phases of new and existing businesses.</td>
                          <td class="create_date text-end align-middle white-space-nowrap text-900 py-2">Aug 19, 2024</td>
                          <td class="create_by align-middle white-space-nowrap fw-semi-bold text-1000">Ansolo Lazinarov</td>
                          <td class="last_activity align-middle text-center py-2">
                            <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-clock me-1 text-success" data-fa-transform="shrink-2 up-1"></span><span class="fw-bold fs--1 text-900">Active</span></div>
                          </td>
                          <td class="align-middle text-end white-space-nowrap pe-0 action py-2">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                          <td class="fs--1 align-middle px-0 py-3">
                            <div class="form-check mb-0 fs-0">
                              <input class="form-check-input" type="checkbox" data-bulk-select-row='{"Name":{"avatar":"/team/35.webp","name":"Ansolo Lazinatov","status":"online"},"description":"Purchasing-Related Vendors","date":"Aug 19, 2024","creatBy":"Ansolo Lazinarov","lastActivity":{"iconColor":"text-success","label":"Active"}}' />
                            </div>
                          </td>
                          <td class="name align-middle white-space-nowrap py-2 ps-0"><a class="d-flex align-items-center text-1000" href="#!">
                              <div class="avatar avatar-m me-3 status-online"><img class="rounded-circle" src="assets/img/team/35.webp" alt="" />
                              </div>
                              <h6 class="mb-0 text-1000 fw-bold">Ansolo Lazinatov</h6>
                            </a></td>
                          <td class="description align-middle white-space-nowrap text-start fw-bold text-700 py-2 pe-6">Purchasing-Related Vendors</td>
                          <td class="create_date text-end align-middle white-space-nowrap text-900 py-2">Aug 19, 2024</td>
                          <td class="create_by align-middle white-space-nowrap fw-semi-bold text-1000">Ansolo Lazinarov</td>
                          <td class="last_activity align-middle text-center py-2">
                            <div class="d-flex align-items-center flex-1"><span class="fa-solid fa-clock me-1 text-success" data-fa-transform="shrink-2 up-1"></span><span class="fw-bold fs--1 text-900">Active</span></div>
                          </td>
                          <td class="align-middle text-end white-space-nowrap pe-0 action py-2">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                    <div class="col-auto d-flex">
                      <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                    <div class="col-auto d-flex">
                      <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                      <ul class="mb-0 pagination"></ul>
                      <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-emails" role="tabpanel" aria-labelledby="emails-tab">
                <h2 class="mb-4">Emails</h2>
                <div>
                  <div class="scrollbar">
                    <ul class="nav nav-underline flex-nowrap mb-1" id="emailTab" role="tablist">
                      <li class="nav-item me-3"><a class="nav-link text-nowrap border-0 active" id="mail-tab" data-bs-toggle="tab" href="#tab-mail" aria-controls="mail-tab" role="tab" aria-selected="true">Mails (68)<span class="text-700 fw-normal"></span></a></li>
                      <li class="nav-item me-3"><a class="nav-link text-nowrap border-0" id="drafts-tab" data-bs-toggle="tab" href="#tab-drafts" aria-controls="drafts-tab" role="tab" aria-selected="true">Drafts (6)<span class="text-700 fw-normal"></span></a></li>
                      <li class="nav-item me-3"><a class="nav-link text-nowrap border-0" id="schedule-tab" data-bs-toggle="tab" href="#tab-schedule" aria-controls="schedule-tab" role="tab" aria-selected="true">Scheduled (17)</a></li>
                    </ul>
                  </div>
                  <div class="search-box w-100 mb-3">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                      <input class="form-control search-input search" type="search" placeholder="Search..." aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>

                    </form>
                  </div>
                  <div class="tab-content" id="profileTabContent">
                    <div class="tab-pane fade show active" id="tab-mail" role="tabpanel" aria-labelledby="mail-tab">
                      <div class="border-top border-bottom border-200" id="allEmailsTable" data-list='{"valueNames":["subject","sent","date","source","status"],"page":7,"pagination":true}'>
                        <div class="table-responsive scrollbar mx-n1 px-1">
                          <table class="table fs--1 mb-0">
                            <thead>
                              <tr>
                                <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select='{"body":"all-email-table-body"}' />
                                  </div>
                                </th>
                                <th class="sort white-space-nowrap align-middle pe-3 ps-0 text-uppercase" scope="col" data-sort="subject" style="width:31%; min-width:350px">Subject</th>
                                <th class="sort align-middle pe-3 text-uppercase" scope="col" data-sort="sent" style="width:15%; min-width:130px">Sent by</th>
                                <th class="sort align-middle text-start text-uppercase" scope="col" data-sort="date" style="min-width:165px">Date</th>
                                <th class="sort align-middle pe-0 text-uppercase" scope="col" style="width:15%; min-width:100px">Action</th>
                                <th class="sort align-middle text-end text-uppercase" scope="col" data-sort="status" style="width:15%; min-width:100px">Status</th>
                              </tr>
                            </thead>
                            <tbody class="list" id="all-email-table-body">
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"Quary about purchased soccer socks","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 29, 2021 10:23 am","source":"Call","type_status":{"label":"sent","type":"badge-phoenix-success"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">Quary about purchased soccer socks</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 29, 2021 10:23 am</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-success">sent</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"How to take the headache out of Order","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 27, 2021 3:27 pm","source":"Call","type_status":{"label":"delivered","type":"badge-phoenix-info"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">How to take the headache out of Order</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 27, 2021 3:27 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-info">delivered</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"The Arnold Schwarzenegger of Order","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 24, 2021 10:44 am","source":"Call","type_status":{"label":"Bounce","type":"badge-phoenix-warning"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">The Arnold Schwarzenegger of Order</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 24, 2021 10:44 am</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-warning">Bounce</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"My order is not being taken","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 19, 2021 4:55 pm","source":"Call","type_status":{"label":"Spam","type":"badge-phoenix-danger"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">My order is not being taken</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 19, 2021 4:55 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-danger">Spam</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"Shipment is missing","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 19, 2021 2:43 pm","source":"Call","type_status":{"label":"sent","type":"badge-phoenix-success"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">Shipment is missing</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 19, 2021 2:43 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-success">sent</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"How can I order something urgently?","email":"ansolo45@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 19, 2021 2:43 pm","source":"Call","type_status":{"label":"Delivered","type":"badge-phoenix-info"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">How can I order something urgently?</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 19, 2021 2:43 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-info">Delivered</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"How the delicacy of the products will be handled?","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 16, 2021 5:18 pm","source":"Call","type_status":{"label":"bounced","type":"badge-phoenix-warning"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">How the delicacy of the products will be handled?</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 16, 2021 5:18 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-warning">bounced</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                          <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                          </div>
                          <div class="col-auto d-flex">
                            <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul>
                            <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab-drafts" role="tabpanel" aria-labelledby="drafts-tab">
                      <div class="border-top border-bottom border-200" id="draftsEmailsTable" data-list='{"valueNames":["subject","sent","date","source","status"],"page":7,"pagination":true}'>
                        <div class="table-responsive scrollbar mx-n1 px-1">
                          <table class="table fs--1 mb-0">
                            <thead>
                              <tr>
                                <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select='{"body":"drafts-email-table-body"}' />
                                  </div>
                                </th>
                                <th class="sort white-space-nowrap align-middle pe-3 ps-0 text-uppercase" scope="col" data-sort="subject" style="width:31%; min-width:350px">Subject</th>
                                <th class="sort align-middle pe-3 text-uppercase" scope="col" data-sort="sent" style="width:15%; min-width:130px">Sent by</th>
                                <th class="sort align-middle text-start text-uppercase" scope="col" data-sort="date" style="min-width:165px">Date</th>
                                <th class="sort align-middle pe-0 text-uppercase" scope="col" style="width:15%; min-width:100px">Action</th>
                                <th class="sort align-middle text-end text-uppercase" scope="col" data-sort="status" style="width:15%; min-width:100px">Status</th>
                              </tr>
                            </thead>
                            <tbody class="list" id="drafts-email-table-body">
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"Quary about purchased soccer socks","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 29, 2021 10:23 am","source":"Call","type_status":{"label":"sent","type":"badge-phoenix-success"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">Quary about purchased soccer socks</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 29, 2021 10:23 am</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-success">sent</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"How to take the headache out of Order","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 27, 2021 3:27 pm","source":"Call","type_status":{"label":"delivered","type":"badge-phoenix-info"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">How to take the headache out of Order</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 27, 2021 3:27 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-info">delivered</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"The Arnold Schwarzenegger of Order","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 24, 2021 10:44 am","source":"Call","type_status":{"label":"Bounce","type":"badge-phoenix-warning"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">The Arnold Schwarzenegger of Order</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 24, 2021 10:44 am</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-warning">Bounce</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"My order is not being taken","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 19, 2021 4:55 pm","source":"Call","type_status":{"label":"Spam","type":"badge-phoenix-danger"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">My order is not being taken</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 19, 2021 4:55 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-danger">Spam</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"Shipment is missing","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 19, 2021 2:43 pm","source":"Call","type_status":{"label":"sent","type":"badge-phoenix-success"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">Shipment is missing</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 19, 2021 2:43 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-success">sent</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                          <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                          </div>
                          <div class="col-auto d-flex">
                            <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul>
                            <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab-schedule" role="tabpanel" aria-labelledby="schedule-tab">
                      <div class="border-top border-bottom border-200" id="scheduledEmailsTable" data-list='{"valueNames":["subject","sent","date","source","status"],"page":7,"pagination":true}'>
                        <div class="table-responsive scrollbar mx-n1 px-1">
                          <table class="table fs--1 mb-0">
                            <thead>
                              <tr>
                                <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select='{"body":"scheduled-email-table-body"}' />
                                  </div>
                                </th>
                                <th class="sort white-space-nowrap align-middle pe-3 ps-0 text-uppercase" scope="col" data-sort="subject" style="width:31%; min-width:350px">Subject</th>
                                <th class="sort align-middle pe-3 text-uppercase" scope="col" data-sort="sent" style="width:15%; min-width:130px">Sent by</th>
                                <th class="sort align-middle text-start text-uppercase" scope="col" data-sort="date" style="min-width:165px">Date</th>
                                <th class="sort align-middle pe-0 text-uppercase" scope="col" style="width:15%; min-width:100px">Action</th>
                                <th class="sort align-middle text-end text-uppercase" scope="col" data-sort="status" style="width:15%; min-width:100px">Status</th>
                              </tr>
                            </thead>
                            <tbody class="list" id="scheduled-email-table-body">
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"Quary about purchased soccer socks","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 29, 2021 10:23 am","source":"Call","type_status":{"label":"sent","type":"badge-phoenix-success"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">Quary about purchased soccer socks</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 29, 2021 10:23 am</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-success">sent</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"How to take the headache out of Order","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 27, 2021 3:27 pm","source":"Call","type_status":{"label":"delivered","type":"badge-phoenix-info"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">How to take the headache out of Order</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 27, 2021 3:27 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-info">delivered</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"The Arnold Schwarzenegger of Order","email":"ansolo45@mail.com"},"active":true,"sent":"Ansolo Lazinatov","date":"Dec 24, 2021 10:44 am","source":"Call","type_status":{"label":"Bounce","type":"badge-phoenix-warning"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">The Arnold Schwarzenegger of Order</a>
                                  <div class="fs--2 d-block">ansolo45@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Ansolo Lazinatov</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 24, 2021 10:44 am</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-warning">Bounce</span></td>
                              </tr>
                              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs--1 align-middle px-0 py-3">
                                  <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"mail":{"subject":"My order is not being taken","email":"jackson@mail.com"},"active":true,"sent":"Jackson Pollock","date":"Dec 19, 2021 4:55 pm","source":"Call","type_status":{"label":"Spam","type":"badge-phoenix-danger"}}' />
                                  </div>
                                </td>
                                <td class="subject order align-middle white-space-nowrap py-2 ps-0 text-"><a class="fw-semi-bold text-primary" href="#!">My order is not being taken</a>
                                  <div class="fs--2 d-block">jackson@mail.com</div>
                                </td>
                                <td class="sent align-middle white-space-nowrap text-start fw-bold text-700 py-2">Jackson Pollock</td>
                                <td class="date align-middle white-space-nowrap text-900 py-2">Dec 19, 2021 4:55 pm</td>
                                <td class="align-middle white-space-nowrap ps-3"><span class="fa-solid fa-phone text-primary me-2"></span>Call
                                </td>
                                <td class="status align-middle fw-semi-bold text-end py-2"><span class="badge badge-phoenix fs--2 badge-phoenix-danger">Spam</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                          <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                          </div>
                          <div class="col-auto d-flex">
                            <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul>
                            <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-attachments" role="tabpanel" aria-labelledby="attachments-tab">
                <h2 class="mb-4">Attachments</h2>
                <div class="border-top border-dashed border-300 pt-3 pb-4">
                  <div class="d-flex flex-between-center">
                    <div class="d-flex mb-1"><span class="fa-solid fa-image me-2 text-700 fs--1"></span>
                      <p class="text-1000 mb-0 lh-1">Silly_sight_1.png</p>
                    </div>
                    <div class="font-sans-serif btn-reveal-trigger">
                      <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                    </div>
                  </div>
                  <p class="fs--1 text-700 mb-2"><span>768kB</span><span class="text-400 mx-1">| </span><a href="#!">Shantinan Mekalan </a><span class="text-400 mx-1">| </span><span class="text-nowrap">21st Dec, 12:56 PM</span></p><img class="rounded-2" src="assets/img/generic/40.png" alt="" />
                </div>
                <div class="border-top border-dashed border-300 py-4">
                  <div class="d-flex flex-between-center">
                    <div>
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-image me-2 fs--1 text-700"></span>
                        <p class="text-1000 mb-0 lh-1">All_images.zip</p>
                      </div>
                      <p class="fs--1 text-700 mb-0"><span>12.8 mB</span><span class="text-400 mx-1">|</span><a href="#!">Yves Tanguy </a><span class="text-400 mx-1">| </span><span class="text-nowrap">19th Dec, 08:56 PM</span></p>
                    </div>
                    <div class="font-sans-serif btn-reveal-trigger">
                      <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                    </div>
                  </div>
                </div>
                <div class="border-top border-dashed border-300 py-4">
                  <div class="d-flex flex-between-center">
                    <div>
                      <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-file-lines me-2 fs--1 text-700"></span>
                        <p class="text-1000 mb-0 lh-1">Project.txt</p>
                      </div>
                      <p class="fs--1 text-700 mb-0"><span>123 kB</span><span class="text-400 mx-1">| </span><a href="#!">Shantinan Mekalan </a><span class="text-400 mx-1">| </span><span class="text-nowrap">12th Dec, 12:56 PM</span></p>
                    </div>
                    <div class="font-sans-serif btn-reveal-trigger">
                      <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse </a></div>
                    </div>
                  </div>
                </div>
              </div>
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
    <div class="support-chat-container">
      <div class="container-fluid support-chat">
        <div class="card bg-white">
          <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom">
            <h5 class="mb-0 d-flex align-items-center gap-2">Demo widget<span class="fa-solid fa-circle text-success fs--3"></span></h5>
            <div class="btn-reveal-trigger">
              <button class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h text-900"></span></button>
              <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown"><a class="dropdown-item" href="#!">Request a callback</a><a class="dropdown-item" href="#!">Search in chat</a><a class="dropdown-item" href="#!">Show history</a><a class="dropdown-item" href="#!">Report to Admin</a><a class="dropdown-item btn-support-chat" href="#!">Close Support</a></div>
            </div>
          </div>
          <div class="card-body chat p-0">
            <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
              <div class="text-end mt-6"><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                  <p class="mb-0 fw-semi-bold fs--1">I need help with something</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                  <p class="mb-0 fw-semi-bold fs--1">I can’t reorder a product I previously ordered</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                  <p class="mb-0 fw-semi-bold fs--1">How do I place an order?</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                </a><a class="false d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                  <p class="mb-0 fw-semi-bold fs--1">My payment method not working</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                </a>
              </div>
              <div class="text-center mt-auto">
                <div class="avatar avatar-3xl status-online"><img class="rounded-circle border border-3 border-white" src="assets/img/team/30.webp" alt="" /></div>
                <h5 class="mt-2 mb-3">Eric</h5>
                <p class="text-center text-black mb-0">Ask us anything – we’ll get back to you here or by email within 24 hours.</p>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center gap-2 border-top ps-3 pe-4 py-3">
            <div class="d-flex align-items-center flex-1 gap-3 border rounded-pill px-4">
              <input class="form-control outline-none border-0 flex-1 fs--1 px-0" type="text" placeholder="Write message" />
              <label class="btn btn-link d-flex p-0 text-500 fs--1 border-0" for="supportChatPhotos"><span class="fa-solid fa-image"></span></label>
              <input class="d-none" type="file" accept="image/*" id="supportChatPhotos" />
              <label class="btn btn-link d-flex p-0 text-500 fs--1 border-0" for="supportChatAttachment"> <span class="fa-solid fa-paperclip"></span></label>
              <input class="d-none" type="file" id="supportChatAttachment" />
            </div>
            <button class="btn p-0 border-0 send-btn"><span class="fa-solid fa-paper-plane fs--1"></span></button>
          </div>
        </div>
      </div>
      <button class="btn p-0 border border-200 btn-support-chat"><span class="fs-0 btn-text text-primary text-nowrap">Chat demo</span><span class="fa-solid fa-circle text-success fs--1 ms-2"></span><span class="fa-solid fa-chevron-down text-primary fs-1"></span></button>
    </div>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
    <div class="offcanvas-header align-items-start border-bottom flex-column">
      <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
        <div>
          <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-0"></span>Theme Customizer</h5>
          <p class="mb-0 fs--1">Explore different styles according to your preferences</p>
        </div>
        <button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span class="fas fa-times fs-0"> </span></button>
      </div>
      <button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span class="fas fa-arrows-rotate me-2 fs--2"></span>Reset to default</button>
    </div>
    <div class="offcanvas-body scrollbar px-card" id="themeController">
      <div class="setting-panel-item mt-0">
        <h5 class="setting-panel-item-title">Color Scheme</h5>
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="phoenixTheme" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="assets/img/generic/default-light.png" alt="" /></span><span class="label-text">Light</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="phoenixTheme" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="assets/img/generic/default-dark.png" alt="" /></span><span class="label-text"> Dark</span></label>
          </div>
        </div>
      </div>
      <div class="border rounded-3 p-4 setting-panel-item bg-white">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="setting-panel-item-title mb-1">RTL </h5>
          <div class="form-check form-switch mb-0">
            <input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixIsRTL" />
          </div>
        </div>
        <p class="mb-0 text-700">Change text direction</p>
      </div>
      <div class="border rounded-3 p-4 setting-panel-item bg-white">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="setting-panel-item-title mb-1">Support Chat </h5>
          <div class="form-check form-switch mb-0">
            <input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixSupportChat" />
          </div>
        </div>
        <p class="mb-0 text-700">Toggle support chat</p>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Navigation Type</h5>
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="navbarPositionVertical" name="navigation-type" type="radio" value="vertical" data-theme-control="phoenixNavbarPosition" data-page-url="documentation/layouts/vertical-navbar.html" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarPositionVertical"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="assets/img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="assets/img/generic/default-dark.png" alt="" /></span><span class="label-text">Vertical</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbarPositionHorizontal" name="navigation-type" type="radio" value="horizontal" data-theme-control="phoenixNavbarPosition" data-page-url="documentation/layouts/horizontal-navbar.html" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarPositionHorizontal"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="assets/img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="assets/img/generic/top-default-dark.png" alt="" /></span><span class="label-text"> Horizontal</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbarPositionCombo" name="navigation-type" type="radio" value="combo" data-theme-control="phoenixNavbarPosition" data-page-url="documentation/layouts/combo-navbar.html" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarPositionCombo"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="assets/img/generic/nav-combo-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="assets/img/generic/nav-combo-dark.png" alt="" /></span><span class="label-text"> Combo</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbarPositionTopDouble" name="navigation-type" type="radio" value="dual-nav" data-theme-control="phoenixNavbarPosition" data-page-url="documentation/layouts/dual-nav.html" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarPositionTopDouble"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="assets/img/generic/dual-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="assets/img/generic/dual-dark.png" alt="" /></span><span class="label-text"> Dual nav</span></label>
          </div>
        </div>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="navbar-style-default" type="radio" name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle" />
            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-default"> <img class="img-fluid img-prototype d-dark-none" src="assets/img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="assets/img/generic/default-dark.png" alt="" /><span class="label-text d-dark-none"> Default</span><span class="label-text d-light-none">Default</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbar-style-dark" type="radio" name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle" />
            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-dark"> <img class="img-fluid img-prototype d-dark-none" src="assets/img/generic/vertical-darker.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="assets/img/generic/vertical-lighter.png" alt="" /><span class="label-text d-dark-none"> Darker</span><span class="label-text d-light-none">Lighter</span></label>
          </div>
        </div>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="navbarShapeDefault" name="navbar-shape" type="radio" value="default" data-theme-control="phoenixNavbarTopShape" data-page-url="documentation/layouts/horizontal-navbar.html" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="assets/img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="assets/img/generic/top-default-dark.png" alt="" /></span><span class="label-text">Default</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbarShapeSlim" name="navbar-shape" type="radio" value="slim" data-theme-control="phoenixNavbarTopShape" data-page-url="documentation/layouts/horizontal-navbar.html#horizontal-navbar-slim" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarShapeSlim"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="assets/img/generic/top-slim.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="assets/img/generic/top-slim-dark.png" alt="" /></span><span class="label-text"> Slim</span></label>
          </div>
        </div>
      </div>
      <div class="setting-panel-item">
        <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="navbarTopDefault" name="navbar-top-style" type="radio" value="default" data-theme-control="phoenixNavbarTopStyle" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="assets/img/generic/top-default.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="assets/img/generic/top-style-darker.png" alt="" /></span><span class="label-text">Default</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbarTopDarker" name="navbar-top-style" type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="navbarTopDarker"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="assets/img/generic/navbar-top-style-light.png" alt="" /><img class="img-fluid img-prototype d-light-none mb-0" src="assets/img/generic/top-style-lighter.png" alt="" /></span><span class="label-text d-dark-none">Darker</span><span class="label-text d-light-none">Lighter</span></label>
          </div>
        </div>
      </div><a class="bun btn-primary d-grid mb-3 text-white dark__text-100 mt-5 btn btn-primary" href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/" target="_blank">Purchase template</a>
    </div>
  </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
    <div class="card-body d-flex align-items-center px-2 py-1">
      <div class="position-relative rounded-start" style="height:34px;width:28px">
        <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                </svg></span></span></span></div>
      </div><small class="text-uppercase text-700 fw-bold py-2 pe-2 ps-1 rounded-end">customize</small>
    </div>
  </a>


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
  <script src="vendors/dropzone/dropzone.min.js"></script>
  <script src="assets/js/phoenix.js"></script>

</body>

</html>