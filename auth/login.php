<?php

require('../config/config.php');

session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "") {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Verify the password
                if (password_verify($password, $row['password'])) {
                    // Set session variables
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=../dashboard.php?msg=success\">";
                } else {
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php?msg=error\">";
                }
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php?msg=error\">";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php?msg=error\">";
        }
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php?msg=warning\">";
    }
}

?>
