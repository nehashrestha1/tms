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

        if ($result) {
            $user = $result->fetch_assoc();
            // var_dump($user);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];

                    echo "Login successful.";
                     header("Refresh:0 url=../dashboard.php?msg=login_success");
                } else {
                    echo header("Refresh:0 url=../index.php?msg=password_error");
                }
            } else {
                echo header("Refresh:0 url=../index.php?msg=user_not_found");
            }
        } else {
            echo header("Refresh:0 url=../index.php?msg=email_error");
        }


    } else {
        
        header("Refresh:0; url=../index.php?msg=required");
    }
}

?>