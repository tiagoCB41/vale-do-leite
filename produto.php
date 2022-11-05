<?php
require_once "dbconfig.php";
require "classes/Helper.php";
require "classes/Url.class.php";
$URI = new URI();
//error_reporting(~E_ALL);

function remove_simbolos_acentos($string)
{
  $string = trim(strtolower($string));
  $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
  $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
  $string = strtr($string, utf8_decode($a), $b);
  $string = str_replace(".", "-", $string);
  $string = preg_replace("/[^0-9a-zA-Z\.]+/", '-', $string);
  return utf8_decode(rtrim($string, "-"));
}


$url = explode("/", $_SERVER['REQUEST_URI']);
$idPost = $url[3];

$idPost2 = "";



$stmt = $DB_con->prepare("SELECT * FROM produtos");
$stmt->execute();
if ($stmt->rowCount() > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $string1 = remove_simbolos_acentos(utf8_decode($idPost));
    $string2 = remove_simbolos_acentos(utf8_decode($nome));
    if ($string1 == $string2) {
      $idPost2 = $nome;
    }
  }
}


$stmt = $DB_con->prepare("SELECT nome FROM produtos where nome='$idPost2' ORDER BY id DESC");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  $post = $nome;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $nome ?> - Vale do Leite</title>
  <meta content="Vale do Leite - O sabor da vida vem do campo" name="description">
  <meta content="Vale do leite, leite, vale, laticinios, queijo" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo $URI->base('/assets/img/logo.jpg') ?>" rel="icon">
  <link href="<?php echo $URI->base('/assets/img/logo.jpg') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo $URI->base('/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo $URI->base('/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?php echo $URI->base('/assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?php echo $URI->base('/assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?php echo $URI->base('/assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo $URI->base('/assets/css/main.css') ?>" rel="stylesheet">

</head>

<body style="background-color: #f7fbfc;">
  <?php include "./components/nav.php" ?>
  <main id="main">
    <?php
    $stmt = $DB_con->prepare("SELECT * FROM produtos where nome='$post'");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
    ?>
        <section class="mt-4">
          <div id="flexContainer" class=" mt-5">
            <div class="d-flex align-items-start">
              <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php
                if (!($img1 == "")) { ?>
                  <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <img class="showIcon" src="<?php echo $URI->base('/admin/uploads/produtos/' . $row['img1'] . '') ?>" alt="">
                  </button>
                <?php } ?>
                <?php
                if (!($img2 == "")) { ?>
                  <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <img class="showIcon" src="./assets/img/produtos/pneus/EP422PLUS.jpeg" alt="">
                  </button>
                <?php } ?>
                <?php
                if (!($img3 == "")) { ?>
                  <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <img class="showIcon" src="./assets/img/produtos/pneus/ATREVO2.jpeg" alt="">
                  </button>
                <?php } ?>
              </div>
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                  <img class="showImg" src="<?php echo $URI->base('/admin/uploads/produtos/' . $row['img1'] . '') ?>" alt="">
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                  <img class="showImg" src="./assets/img/produtos/pneus/EP422PLUS.jpeg" alt="">
                </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                  <img class="showImg" src="./assets/img/produtos/pneus/ATREVO2.jpeg" alt="">
                </div>
              </div>
            </div>
            <div id="ShowContent">
              <div class="into">

                <h4 class="textInto"><?php echo $nome ?></h4>
                <span style="font-size: 14px; color: color #5f5f5f;;"><strong>Informações nutricionais:</strong><br>
                  <?php echo $infoNutri ?>
                </span>
                <br><br>
              </div>
              

              <div class="contactIcon" style=" margin: 0 2% 0 18%;" id="whatsaIcon">
                <a class="nav-link" style=" margin: 0 2% 0 2%;" href=""><i class="bi bi-whatsapp" style="width: 35px;"></i><strong style="margin-left: 4px;">clique aqui</strong></a>
              </div>
            </div>
          </div>
          </div>
        </section>
    <?php }
    } ?>

    <section style="background-color:#007432;">
      <div class="container">
        <div class="divisor">
          <h6 class="TextDivisor text-white"><strong>Procurados relacionados</strong></h6>
          <hr class="lineDivisor">
        </div>
        <br><br>
        <div class="catalogoHome1 menu row">
          <?php
          $stmt = $DB_con->prepare("SELECT * FROM produtos");
          $stmt->execute();
          if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
          ?>
              <div class="col-sm-12 col-lg-4 menu-item" style="margin-top: 50px;">


<div class="chef-member">
  <div class="member-img">
    <img src="<?php echo $URI->base('/admin/uploads/produtos/' . $row['img1'] . '') ?>" class="img-fluid produto" alt="">

  </div>
  <div class="member-info">
    <h4 style="height: 50px;"><?php echo $nome; ?></h4>
    <p style="overflow: hidden; /* remove o estouro do elemento */
      text-overflow: ellipsis; /* adiciona “...” no final */
      display: -webkit-box;
      -webkit-line-clamp: 4; /* quantidade de linhas */
      -webkit-box-orient: vertical; /* conteúdo será apresentado verticalmente */; min-height:120px" class="ingredients">
      <?php echo $infoNutri; ?>
    </p>
    <p class="price">
     
    </p>
    <a href="<?php echo $URI->base('/produto/' . slugify($nome)); ?>"><button type="button" class="btn">Ver detalhes</button></a>
  </div>
</div>

</div>
<!-- Menu Item -->
          <?php }
          } ?>
        </div>
      </div>
    </section>
  </main>
  <?php include "./components/footer.php" ?>
   <!-- Vendor JS Files -->
   <script src="<?php echo $URI->base('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo $URI->base('/assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?php echo $URI->base('/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?php echo $URI->base('/assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo $URI->base("/assets/js/main.js")?></script>
</body>

</html>