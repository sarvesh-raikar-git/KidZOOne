<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $cpass= isset($_POST['cpass']) ? $_POST['cpass'] : '';

    if (!empty($name) && !empty($email) && !empty($age) && !empty($password)) {
        // Securely connect to the database
        $con = mysqli_connect('localhost', 'root', '', 'kidzOOne');

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO register (name, email, age, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $age, $password);

            if (mysqli_stmt_execute($stmt) && $password==$cpass) {
                echo '<script>alert("Registration Successful")</script>';
                header('Location:Login.html');
                //echo "Registration successful!";
            } else {
                echo '<script>alert("Retry!!!")</script>';
                include 'Register.html';
                //echo "Error: " . mysqli_error($con);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo "All fields are required.";
    }
}
?>
