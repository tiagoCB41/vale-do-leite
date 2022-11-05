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
  $nome = $_POST['nome'];
  $subtitulo = $_POST['subtitulo'];

  $link = $_POST['link'];
  
  $infoNutri = $_POST['infoNutri'];
  $autor = $_POST['autor'];
  $categoria = $_POST['categoria'];

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];


  if (empty($nome)) {
    $errMSG = "Por favor, insira o nome do produto";
  }


  else {
    $upload_dir = 'uploads/produtos/'; // upload directory

    $imgExt =  strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
    

    $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
    // rename uploading image
    $userpic = rand(1000, 1000000) . "." . $imgExt;
    

    // allow valid image file formats
    if (in_array($imgExt, $valid_extensions)) {
      // Check file size '5MB'
      if ($imgSize < 5000000) {
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
      } else {
        $errMSG = "Imagem muito grande.";
      }
    }
   
  }
  if (!isset($errMSG)) {
    $stmt = $DB_con->prepare('INSERT INTO produtos (nome,infoNutri,img1,categoria) VALUES(:unome,:uinfoNutri,:upic,:ucategoria)');
    $stmt->bindParam(':unome', $nome);
    $stmt->bindParam(':uinfoNutri', $infoNutri);
    $stmt->bindParam(':upic', $userpic);
    $stmt->bindParam(':ucategoria', $categoria);

  

    if (empty($imgFile)) {
      $stmt->bindValue(':upic', $nulo);
      $nulo = '';
    }

    if (!empty($imgFile)) {
      $stmt->bindParam(':upic', $userpic);
    }

    if ($stmt->execute()) {
      echo ("<script>
      window.location = 'dashboard.php';
      alert('Produto enviado com sucesso')
      </script>");
    } else {
      $errMSG = "Erro..";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>adicionar produto</title>
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
            primaryvale: '#214e39',
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

   
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
        <?php //include "./components/cardsMenu.php" ?>
           <!-- Header -->
        <div style="margin-top: -40px;" class="relative bg-cocais-primary md:pt-16 pb-28 pt-12">
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap">
            <div class="w-full px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <?php
                  if (isset($errMSG)) {
                  ?>
                    <div class="alert alert-danger">
                      <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="text-center flex justify-between">
                    <h6 class="text-primaryvale text-xl font-bold">
                      Adicionar Produtos
                    </h6>
                    <a href="dashboard.php">
                     <button class="bg-primaryvale text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                       Voltar
                     </button>
                   </a>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form method="POST" enctype="multipart/form-data">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                      Informações
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Nome
                          </label>
                          <input value="<?php echo $nome; ?>" name="nome" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Nome do produto" />
                        </div>
                      </div>
                     
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Categoria
                          </label>
                          <select name="categoria" class="uppercase mb-2 border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                          <option value=''></option>  
                          <option value="manteiga">manteiga</option>
                            <option value="noticia"></option>
                          </select>
                        </div>
                      </div>
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Informação nutricional
                          </label>
                          <input class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="<?php echo $infoNutri; ?>" name="infoNutri" type="text" id="default" placeholder=""></input>
                        </div>
                      </div>        
                      <div class="w-full lg:w-6/12 px-4">

                      </div>

                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                      Imagens
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Capa
                          </label>
                          <div style="position: relative;" class="file-loading">
                            <input id="curriculo" class="file" data-theme="fas" type="file" name="user_image" accept="image/*">
                          </div>
                        </div>
                      </div>
                      <input value="<?php echo $_SESSION['nome']; ?>" name="autor" type="hidden" />
                      <button style="margin:20px" class="bg-primaryvale text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit" name="btnsave">
                        Adicionar
                      </button>
                    </div>
                  </form>
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