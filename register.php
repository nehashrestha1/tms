
<?php require('config/config.php'); ?>
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
                <h3>Create an Account</h3>
            </div>
            <?php
            if (isset($_POST['register'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                if ($name != "" && $username != "" && $email != "" && $password != "") {
                    // Check for duplicate email or username
                    $duplicate_query = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
                    $duplicate_query->bind_param("ss", $email, $username);
                    $duplicate_query->execute();
                    $result = $duplicate_query->get_result();

                    if ($result->num_rows == 0) {
                        // Insert the new user
                        $insert_query = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
                        $insert_query->bind_param("ssss", $name, $username, $email, $password);
                        if ($insert_query->execute()) {
                            echo "<div class='alert alert-success'>Data is submitted</div>";
                            echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                        } else {
                            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Email or Username already exists</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>All fields are required</div>";
                }
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary btn-sm" name="register">Submit</button>
                <p> Don't have an account <a href="index.php">Sign In</a></p>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>