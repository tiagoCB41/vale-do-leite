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



$stmt = $DB_con->prepare("SELECT * FROM eventos");
$stmt->execute();
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $string1 = remove_simbolos_acentos(utf8_decode($idPost));
        $string2 = remove_simbolos_acentos(utf8_decode($titulo));
        if ($string1 == $string2) {
            $idPost2 = $titulo;
        }
    }
}


$stmt = $DB_con->prepare("SELECT titulo FROM eventos where titulo='$idPost2' ORDER BY id DESC");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $post = $titulo;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $titulo ?> - Vale do Leite</title>
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

    <!-- =======================================================
  * Template Name: Yummy - v1.2.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-color: #f7fbfc;">
    <?php include "./components/nav.php" ?>
    <?php
    $stmt = $DB_con->prepare("SELECT * FROM eventos where titulo='$post'");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
    ?>
            <main class="main" id="main">
                <section class="blog-page container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div>

                                    <img style="height: 600px; float: center;" class="rounded mx-auto d-block" src="<?php echo $URI->base('/admin/uploads/eventos/' . $row['img'] . '') ?>">
                                </div>
                                <div class="card-body">
                                    <h2 class="my-5"><?php echo $titulo ?></h2>
                                    <p class="card-text text-bold"><?php echo $descricao; ?></p>
                                    <div class="d-flex justify-content-between">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </main>
    <?php }
    } ?>
    <?php include "./components/footer.php" ?>
     <!-- Vendor JS Files -->
  <script src="<?php echo $URI->base('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo $URI->base('/assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?php echo $URI->base('/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?php echo $URI->base('/assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>