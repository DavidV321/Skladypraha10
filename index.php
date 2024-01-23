<?php
//nastaveni uvodni stranky
 

//napojeni dat ze stranky kde vytvarim dynamicky seznam stranek
require "./seznam-stranek.php";

if (array_key_exists("id-stranky", $_GET)) {
    $id_stranky = $_GET["id-stranky"];
}else {
    $id_stranky = "uvod";
}

?>





<!DOCTYPE html>
<html lang="cs">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $pole_stranek[$id_stranky]->get_titulek(); ?></title>
    <!-- lightbox photogallery -->
    <link rel="stylesheet" href="images/lightbox.min.css"> 
    <!-- favi icon -->
    <link rel="icon" type="images/png" href="#">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="queries.css">

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>  
   

   <script src="images/lightbox-plus-jquery.min.js"></script>
  </head>
  <body>
    <!-- Start project here-->
  <header>
      <div class="header-items">
        <img src="images/logo.png" alt="" class="src">
        <p><i class="fa-solid fa-phone"></i>+420 / 267 713 520</p>
      </div>
      
  <!--  ------------  navigation ----------- -->
    <nav>
    
      <ul>
        <?php
         require "./menu.php";
        ?>
      </ul>
    
    </nav>

    <!-- ========= mobile navigation =========== -->

		<section class="mobile-nav">
		  <nav class="navbar navbar-light" style="background-color: #212121 ;">
			<div class="container-fluid">
			  <button
				class="navbar-toggler ms-auto"
				type="button"
				data-mdb-toggle="collapse"
				data-mdb-target="#navbarToggleExternalContent3"
				aria-controls="navbarToggleExternalContent3"
				aria-expanded="false"
				aria-label="Toggle navigation"
			  >
				<i class="fas fa-bars"></i>
			  </button>
			</div>
		  </nav>

		  <div class="collapse" id="navbarToggleExternalContent3">
			<div class="bg-dark shadow-3 p-4">
			 <a href="index.html"><button class="btn2 link-light btn-block border-bottom m-0">ÚVOD</button></a> 
			 <a href="kancelare.html"><button class="btn2 link-light btn-block border-bottom m-0">PRONÁJEM KANCELÁŘÍ</button></a>
			 <a href="haly.html"><button class="btn2 link-light btn-block border-bottom m-0">PRONÁJEM HAL</button></a>
			 <a href="plochy.html"><button class="btn2 link-light btn-block border-bottom m-0">PRONÁJEM PLOCH</button></a>
			 <a href="kontakty.html"><button class="btn2 link-light btn-block m-0">KONTAKTY</button></a>
			
			</div>
		  </div>
		</section>

  </header>

  <!-- zde obsah stranek -->
  
    <section>
        <?php
            // napojeni obsahu stranek
            echo $pole_stranek[$id_stranky]->get_obsah();
        ?>


    </section>

  </body>