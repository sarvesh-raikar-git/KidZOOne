<!DOCTYPE html>
<html>
<head>
    <title>My Webpage</title>
    <style>
        body {
            background-color: black;
            color: white;
            margin: 0;
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
            left: 20px;
            display: flex; /* Create a horizontal flex container for the videos */
            flex-wrap: wrap; /* Allow videos to wrap to the next row if the screen is narrow */
        }

        .video-item {
            margin-right: 20px; /* Adjust this value to control the horizontal spacing between videos */
            margin-bottom: 20px; /* Adjust this value to control the vertical spacing between videos */
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            position: absolute;
            top: 0;
            right: 0;
            margin-right: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
    <img src="assets/img/image2.png" alt="" />
    <div><h2>Nature Category</h2></div>
</a>
<a href="index.php">HOME</a>

<div class="videos">
<?php
    $videoDirectory = 'uploads/nature/';
    $videoFiles = glob($videoDirectory . '*.mp4');
    if (!empty($videoFiles)) {
        foreach ($videoFiles as $videoFile) {
            // Get the video file name without the path
            $videoFileName = basename($videoFile);
            
            echo '<div class="video-item">
                <video width="315" height="210" controls>
                    <source src="' . $videoFile . '" type="video/mp4" />
                </video>
                <p>' . $videoFileName . '</p> <!-- Display the video file name -->
            </div>';
        }
    } else {
        echo "No education videos";
    }
    ?>
</div>
</body>
</html>
