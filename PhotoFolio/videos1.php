<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['video']) && isset($_POST['type'])) {
        $tempFile = $_FILES['video']['tmp_name'];
        $videoFileName = basename($_FILES['video']['name']);

        // Define upload directory and category
        $uploadDir = 'C:\xampp\htdocs\sarvesh\project\KidzOOne\PhotoFolio\uploads\\';
        $category = preg_replace("/[^a-zA-Z0-9_-]/", "", $_POST['type']);
        $categoryFolder = $uploadDir . $category;

        // Create category folder if it does not exist
        if (!is_dir($categoryFolder)) {
            mkdir($categoryFolder, 0777, true);
        }

        // Final path for the file to be uploaded
        $uploadFile = $categoryFolder . DIRECTORY_SEPARATOR . uniqid() . '_' . $videoFileName;

        // Move uploaded file to the destination
        if (move_uploaded_file($tempFile, $uploadFile)) {
            // Call the Python script for content analysis
            $command = escapeshellcmd("python analyze_video.py " . escapeshellarg($uploadFile));
            $output = shell_exec($command);

            if (strpos($output, "Harmful") !== false) {
                // Redirect to violent.html if the content is harmful
                header("Location: violent.html");
                exit();
            } else {
                // If safe, proceed with database storage
                $con = mysqli_connect('localhost', 'root', '', 'kidzOOne');
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Insert video path and category into the database
                $sql = "INSERT INTO videos (video_path, category) VALUES (?, ?)";
                $stmt = mysqli_prepare($con, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ss", $uploadFile, $category);

                    if (mysqli_stmt_execute($stmt)) {
                        echo '<script>alert("Video Successfully Uploaded");</script>';
                        header("Location: about.html"); // Redirect to success page
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: " . mysqli_error($con);
                }

                mysqli_close($con);
            }
        } else {
            echo "Error moving uploaded video.";
        }
    } else {
        echo "No file selected or category not provided.";
    }
}
?>
