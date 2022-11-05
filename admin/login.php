<?php
session_start();
require_once 'config/conexao.php';
require_once 'config/logar.php';
include 'config/add_log.php';
require_once '../dbconfig.php';

if (isset($_POST['ok'])) :
  $login = filter_input(INPUT_POST, "login");
  $senha = filter_input(INPUT_POST, "senha");
  $_1 = new Login;
  $_1->setLogin($login);
  $_1->setSenha($senha);

  if ($_1->logar()) :
    $successMSG = "Entrando";
  else :
    $errMSG = "Usuário ou senha inválidos ...";
  endif;
endif;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a href="index.html" class="logo d-flex align-items-center w-auto">
              
              <span class="d-none d-lg-block"></span>
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3">

            <div class="card-body">

              <div class="pt-4 pb-2">
              
              <div style="display: flex; justify-content: center;"><img src="../assets/img/logo.jpg" style="max-width: 200px; max-height: 90px;" alt=""></div>
                <h5 class="card-title text-center pb-0 fs-4">Entrar no Sistema</h5>
              </div>
              <form class="row g-3" action="" method="POST">
                <div class="col-12">
                  <label class="form-label">usuário</label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="login" class="form-control" />
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourPassword" class="form-label">senha</label>
                  <input type="password" name="senha" placeholder="Senha" class="form-control" />
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Lembrar de mim</label>
                  </div>
                </div>
                <div class="col-12">
                  <button style="background-color: #214e39; border: none;" type="submit" name="ok" class="btn btn-primary w-100">Login</button>
                </div>
              <?php
                if (isset($successMSG)) {
                  if (isset($_SESSION['logado'])) :
                  else :
                    header("Location: login.php");
                  endif;
                ?>
                  <form action="" method="POST">
                    <input type="hidden" class="form-control" type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" />
                    <input type="hidden" class="form-control" type="text" name="tipo" value="login" />
                    <button style="display: none;" id="clickButton" type="submit" name="submit" value="LOG"></button>
                  </form>
                  <div id="sucess" class="col-12 alert alert-success" role="alert">
                    <div style="margin-right: 15px;" class="c-loader"></div>
                    <div><?php echo $successMSG; ?></div>
                  </div>
               
                <?php
                }
                ?>
                <?php
                if (isset($errMSG)) {
                ?>
                  <div id="error" class="col-12 alert alert-danger" role="alert">
                  <i style="margin-right: 15px;" class="bi bi-x-octagon"></i><?php echo $errMSG; ?>
                  </div>  
            </div>
          <?php
                }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
          </div>
        </div>
        <script type="text/javascript">
          window.setTimeout(function() {
            document.getElementById("clickButton").click();
          }, 1500);
        </script>
</body>