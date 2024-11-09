<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KidzOOne-About</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

    <title>My Webpage</title>
    <style>
         body {
            background-color: black;
            color: white;
            margin: 50px;
        }

        .logo {
            position: absolute;
            top: 0;
            left: 0;
            height: 100px;
            width: 100px;
        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
        }

        .logo h2 {
            margin-left: 110px;
        }

        .videos {
            position: absolute;
            top: 300px;
            left: 40px;
            display: flex; /* Create a horizontal flex container for the videos */
            flex-wrap: wrap; /* Allow videos to wrap to the next row if the screen is narrow */
        }

        .video-item {
            margin-right: 170px; /* Adjust this value to control the horizontal spacing between videos */
            margin-bottom: 20px; /* Adjust this value to control the vertical spacing between videos */
        }

        navbar.ul.li {
            margin-left: 100px;
        }
    </style>
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <!-- <i class="bi bi-camera"></i> -->
        <img src="assets/img/image2.png" alt="" length="100px" height="100px">
        <h1>KidzOOne</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul style="margin-left: 550px;">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.html" class="active">About</a></li>
          <li class="dropdown"><a href="#"><span>Category</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>    
              <li><a href="education.php">Education</a></li>
              <li><a href="cartoon.php">Cartoon</a></li>
              <li><a href="rhymes.php">Rhymes</a></li>
              <li><a href="colours.php">colours</a></li>

            </ul>
          </li>
          <li><a href="../Login.html">Logout</a></li>
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
        

<!-- <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
    <img src="assets/img/image2.png" alt="" /> -->
    
<!-- </a>
<a href="index.php">HOME</a> -->

<!-- ======= End Page Header ======= -->
<div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Rhymes</h2>
          </div>
        </div>
      </div>
    </div><!-- End Page Header -->


<div class="videos">
<?php
    $videoDirectory = 'uploads/rhymes/';
    $videoFiles = glob($videoDirectory . '*.mp4');
    if (!empty($videoFiles)) {
        foreach ($videoFiles as $videoFile) {
            $videoName = pathinfo($videoFile, PATHINFO_FILENAME); // Extract the filename without the extension
            echo '<div class="video-item">
                        <video width="315" height="210" controls>
                            <source src="' . $videoFile . '" type="video/mp4" />
                        </video>
                        <p style="text-align: center;">' . $videoName . '</p>
                    </div>';
        }
    } else {
        echo "No videos found in the 'uploads' folder.";
    }
    ?>
</div>
</body>
</html>
