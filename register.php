<?php require ('config/config.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>

    <section class="bg-info">
        <div class="container py-5">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create an Account </li>
                </ol>
            </nav>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?php
                    if (isset($_POST['register'])) {

                        $name = $_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        if ($name != "" && $username != "" && $email != "" && $password != "") {

                            // Check for duplicate email
                            $duplicate = "SELECT * FROM users WHERE email='$email' OR username='$username'";
                            $duplicate_result = mysqli_query($conn, $duplicate);
                            $row = mysqli_num_rows($duplicate_result);

                            if ($row == 0) { // Check if no duplicate email exists
                                $insert = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
                                $result = mysqli_query($conn, $insert);
                                if ($result) {
                                    echo "<div class='alert alert-success'>Data is submitted</div>";
                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                } else {
                                    echo "<div class='alert alert-danger'>Data is not submitted</div>";
                                    header('Refresh: 2; URL=register.php');
                                }
                            } else {
                                echo "<div class='alert alert-warning'>Email or username is already exists</div>";
                                header('Refresh: 2; URL=register.php');
                            }
                        } else {
                            echo "<div class='alert alert-danger'>All fields are required</div>";
                        }

                        // Redirect after 2 seconds
                        header('Refresh: 2; URL=register.php');
                    }
                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <img src="https://dummyimage.com/800x300/dddddd/fff.png&text=Responsive+Image" class="img-fluid"
                        alt="...">
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>