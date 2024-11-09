<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kidz00ne</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../favicon.png" rel="icon">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" background="img6.jpeg">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/image2.png" alt="" length="100px" height="100px">

        <h1>KidzOOne</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li class="dropdown"><a href="#"><span>Category</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="education.php">Education</a></li>
              <li><a href="cartoon.php">Cartoon</a></li>
              <li><a href="rhymes.php">Rhymes</a></li>
              <li><a href="colours.php">colours</a></li>
            </ul>
          </li>
          <li><a href="../Login.html">Logout</a></li>
          <li><a href="Login2.html">Screen Time</a></li>


        
        </ul>
      </nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <style>
        p1 {
          margin-left: 900px;
          color: green;
          font-style: ariel;
          text-align: right;
          font-size: 30px;
          margin-top: 0px;
        }
        </style>

      <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);
        
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
        
                display.textContent = minutes + ":" + seconds;
        
                if (--timer < 0) {
                    timer = 0;
                    alert("Daily Limit Reached")
                    window.location.href="../Login.html";
                   
                }
            }, 1000);
        }

        <script>
        window.onload = function () {
            var time = 120// your time in seconds here
                display = document.querySelector('#safeTimerDisplay');
            startTimer(time, display);
        };
        </script>
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Welcome to KidzOOne </h2>
          <p>An Online Video Sharing Platform for Kids</p>
          <p1 id="safeTimerDisplay"></p1>
        </div>
      </div>
    </div>
  </section>

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid" style="background-color:white;">

        <div class="row gy-4 justify-content-center">


        <?php
        $videoDirectory = 'uploads/';
        $videoFiles = glob($videoDirectory . '*.mp4');
        if (!empty($videoFiles)) {
          foreach ($videoFiles as $videoFile) {
            $videoName = pathinfo($videoFile, PATHINFO_FILENAME); // Extract the filename without the extension
            echo '<div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="video-item">
                      <video width="315" height="210" controls>
                        <source src="' . $videoFile . '" type="video/mp4" />
                      </video>
                      <p style="color: black; text-align: center;">' . $videoName . '</p>
                    </div>
                  </div>';
          }
        } else {
          echo "No videos found in the 'uploads' folder.";
        }
        ?>

          
          
      </div>
            
          </div>

        </div>

      </div>
    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>KidzOOne</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>