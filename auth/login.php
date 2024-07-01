<?php 
require ('../config/config.php');
session_start();
if (isset($_POST["login"])){
    $email = $_POST["email"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    if($email != "" && $password !== ""){
        $sql = "SELECT *FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);



        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];

            echo header("<meta http-equiv=\"refresh\" content=\"2;URL=../index.php\">");
        }
        else{
             
        }
    } else{
        echo" Email and Password is required" ;
    }
}
?>