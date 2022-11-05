 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center shadow">
   <div class="container d-flex align-items-center justify-content-between">

     <a href="<?php echo $URI->base('/') ?>" class="logo d-flex align-items-center me-auto me-lg-0">
       <img width="120px" src="<?php echo $URI->base('/assets/img/logo.jpg') ?>" alt="">
     </a>

     <nav id="navbar" class="navbar">
       <ul>
         <li><a href="<?php echo $URI->base('/') ?>">Home</a></li>
         <li><a href="#menu">Produtos</a></li>
         <li><a href="#about">Sobre nós</a></li>
         <li><a href="#SecConsultor">Contato</a></li>
         <li><a href="#events">Noticias</a></li>
         <li id="btnCat" style=""><a style="border: none;" href="<?php echo $URI->base('/CATALOGO.pdf') ?>" target="_blank">Catálogo</a></li>
       </ul>
     </nav><!-- .navbar -->
     <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
     <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
   </div>
 </header><!-- End Header -->