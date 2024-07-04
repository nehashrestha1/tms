<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>

    <section>
        <div class="container w-25 mx-auto py-5 my-5 shadow">
            <div class="title">
                <h3>Login</h3>
            </div>
            <?php

            if(isset($_GET['msg'])){
                $msg= $_GET['msg'];

                if($msg=='email_error'){
                    echo "email does not Match ";
                    // header("Refresh:2; URL=index.php");

                }
                if($msg=='password_error'){
                    echo "password does not match";
                }
                if($msg=='not_found'){
                    echo "user is not found";
                }
                if($msg=='required'){
                    echo "Email and password are required";
                }
            }
            
            
            ?>
            <form action="auth/login.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-sm">Submit</button>
               <p> Don't have an account  <a href="register.php">Sign Up</a></p>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>