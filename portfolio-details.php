<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DevFolio Bootstrap Portfolio Template - Portfolio Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: DevFolio - v4.8.1
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Protfolio</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto " href="index.php#work">Project</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div class="hero hero-single route bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="hero-title mb-4">Portfolio Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Portfolio Details</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <main id="main">
    
    <!-- ======= Portfolio Details Section ======= -->
    <?php
      include_once 'config/Database.php';
      include_once 'models/Project.php';
      // Instantiate DB & connect
      $database = new Database();
      $db = $database->connect();
      // Instantiate blog category object
      $project = new Project($db);
    
      // Get ID
      $project->id = isset($_GET['id']) ? $_GET['id'] : die();
    
            
      // Category read query
      $result = $project->read_single();
      
      // Get row count
      $num = $result->rowCount();
      $item = array();
      echo '
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">';

                if($num > 0) {

                  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $item = $row;
                  echo'<div class="swiper-slide">
                    <img src="'.$location.'" alt="">
                  </div>';
                  }
                }
          echo'</div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Project information</h3>
                <ul>
                  <li><strong>Category</strong>: '.$category.'</li>
                  <li><strong>Language</strong>: '.$language.'</li>
                  <li><strong>Database</strong>: '.$db.'</li>
                  <li><strong>Project date</strong>:'.$projectDate.'</li>
                  <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>'.$name.'</h2>
                <p>
                  '.$description.'
                </p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>';
      

    ?>
    <!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
   
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>