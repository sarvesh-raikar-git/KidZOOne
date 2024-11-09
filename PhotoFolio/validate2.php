<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';

    if (!empty($email) && !empty($password)) {
        // Securely connect to the database
        $con = mysqli_connect('localhost', 'root', '', 'kidzOOne');

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM register WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo '<script>alert("Login Successful")</script>';
                header("Location: timer.html"); // This should redirect correctly
                exit; // Always call exit after header redirect
            } else {
                echo '<script>alert("Login failed. Please check your email and password.")</script>';
                include "Login2.html"; 
                exit;
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo '<script>alert("Email and password are required.")</script>';
    }
}
?>
