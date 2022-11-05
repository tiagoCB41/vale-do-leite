<?php
require_once "../dbconfig.php";
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');
if (isset($_SESSION['logado'])) :
else :
    header("Location: login.php");
endif;
error_reporting(~E_ALL); // avoid notice

if (isset($_POST['btnsave'])) {
    $id = $_POST['btnsave'];

    $stmt = $DB_con->prepare("UPDATE formulario SET condicao = 'visto' WHERE id = '$id';");
    
    if ($stmt->execute()) {
        echo ("<script> window.location.href = './form.php'; </script>");
      } else {
        echo "deu erro";
      }}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>


    <!-- Favicons -->




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blueadv: '#013589',
                    }
                }
            }
        }
    </script>





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

    <?php include "./components/nav.php" ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Painel de controle</h1>

        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                <?php include "./components/cardsMenu.php" ?>
                    <!-- Header -->
                    <div style="margin-top: -40px;" class="relative bg-cocais-primary md:pt-16 pb-28 pt-12">
                    </div>
                    <div class="px-4 md:px-10 mx-auto w-full -m-24">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                                        <div class="text-center flex justify-between">
                                            <h6 class="text-blueadv text-xl font-bold">
                                                Formulários
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                        <br><br>
                                        <div class="container">
                                            <div class="row gy-4">

                                            <?php $stmt = $DB_con->prepare("SELECT * FROM formulario ORDER BY id DESC;");
                                                $stmt->execute();
                                                if ($stmt->rowCount() > 0) {
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row);
                                            ?>
                                                <div class="col-12 col-md-12">
                                                    <div class="card" style="width: 100%;">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $nome ?></h5>
                                                            <p class="card-text"><strong>Assunto: </strong> <?php echo $assunto ?></p>
                                                        </div>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item"><strong>Telefone: </strong><?php echo $telefone ?></li>
                                                            <li class="list-group-item"><strong>Email: </strong><?php echo $email ?></li>
                                                            <li class="list-group-item"><strong>Cidade: </strong><?php echo $cidade ?> | <strong>Estado: </strong><?php echo $estado ?></li>
                                                            <li class="list-group-item"><strong>Mensagem: </strong><?php echo $mensagem ?></li>
                                                        </ul>
                                                        <div class="card-body">
                                                            <?php
                                                            if(empty($condicao)){?>
                                                             <form method="POST">
                                                                <button style="margin-top:20px" value="<?php echo $id ?>" class="bg-blueadv text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit" name="btnsave">
                                                                    Marcar como visto
                                                                </button>
                                                            </form>
                                                           <?php }
                                                           if(!empty($condicao)){
                                                            ?>
                                                            <div style="margin-top:20px" class="alert alert-success" role="alert">
                                                               Item já foi marcado como visto
                                                            </div>
                                                            <?php }?>

                                                        </div>
                                                    </div>
                                                </div>

                                               <?php }}?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                /* Make dynamic date appear */
                (function() {
                    if (document.getElementById("get-current-year")) {
                        document.getElementById(
                            "get-current-year"
                        ).innerHTML = new Date().getFullYear();
                    }
                })();
                /* Sidebar - Side navigation menu on mobile/responsive mode */
                function toggleNavbar(collapseID) {
                    document.getElementById(collapseID).classList.toggle("hidden");
                    document.getElementById(collapseID).classList.toggle("bg-white");
                    document.getElementById(collapseID).classList.toggle("m-2");
                    document.getElementById(collapseID).classList.toggle("py-3");
                    document.getElementById(collapseID).classList.toggle("px-6");
                }
                /* Function for dropdowns */
                function openDropdown(event, dropdownID) {
                    let element = event.target;
                    while (element.nodeName !== "A") {
                        element = element.parentNode;
                    }
                    Popper.createPopper(element, document.getElementById(dropdownID), {
                        placement: "bottom-start",
                    });
                    document.getElementById(dropdownID).classList.toggle("hidden");
                    document.getElementById(dropdownID).classList.toggle("block");
                }
            </script>
            <script src="./assets/js/fileinput.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js" integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                tinymce.init({
                    selector: 'textarea#default',
                    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
                    menu: {
                        tc: {
                            title: 'Comments',
                            items: 'addcomment showcomments deleteallconversations'
                        }
                    },
                    menubar: 'file edit view insert format tools table tc help',
                    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment'
                });
            </script>
            </div>
            <script src="./assets/js/fileinput.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
            <script>
                const setup = () => {
                    const getTheme = () => {
                        if (window.localStorage.getItem('dark')) {
                            return JSON.parse(window.localStorage.getItem('dark'))
                        }
                        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
                    }

                    const setTheme = (value) => {
                        window.localStorage.setItem('dark', value)
                    }

                    return {
                        loading: true,
                        isDark: getTheme(),
                        toggleTheme() {
                            this.isDark = !this.isDark
                            setTheme(this.isDark)
                        },
                    }
                }
            </script>


            </div><!-- End Left side columns -->









        </section>


    </main><!-- End #main -->

    <section class="">

    </section>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>