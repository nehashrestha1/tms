<?php

require ('../config/config.php');

session_start();

if (isset($_POST['login'])) {
    // $username= $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    if ($email != "" && $password != "") {
        
        $query = "SELECT *FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        $data = mysqli_num_rows($result); // read individual row 

        if ($data == 0) {
            $row = mysqli_fetch_assoc($result);
            
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            echo "<meta http-equiv=\"refresh\" content=\"0;URL=../dashboard.php?msg=success\">";

        } else {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php?msg=error\">";

        }
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=../index.php?msg=warning\">";
    }
}


?>