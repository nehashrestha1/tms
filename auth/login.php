<?php
require ('../config/config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "") {
        $query = "SELECT * FROM users WHERE email='$email' ";
        $result = mysqli_query($conn, $query);
        // var_dump($result);
        // $count = mysqli_num_rows($result);
        // var_dump($count);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // var_dump($user);
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                echo header("Location: ../dashboard.php?msg=login_success");
            } else {
                echo header("Location: ../index.php?msg=password_error");
            }

        } else {
            echo header("Location: ../index.php?msg=login_failed");
        }
    } else {
        echo "All fields are necessary.";
        header('Refresh: 1; url=../index.php');
    }
}
?>