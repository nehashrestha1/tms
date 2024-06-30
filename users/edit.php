<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Users</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $select = "SELECT * FROM users WHERE id='$id'";
                    $select_result = mysqli_query($conn, $select);
                    
                    $select_data = mysqli_fetch_assoc($select_result);
                }


                if (isset($_POST['save'])) {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];

                    if ($name != "" && $username != "" && $email != "") {
                        $insert = "UPDATE users SET name='$name', username='$username', email='$email' WHERE id ='$id'";
                        $result = mysqli_query($conn, $insert);
                        if ($result) {
                            echo "<div class='alert alert-success'>Data is Updated</div>";
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                        } else {
                            echo "<div class='alert alert-danger'>Data is not Updated</div>";
                            header('Refresh: 2; URL=edit.php');
                        }
                    } else {
                        echo "<div class='alert alert-danger'>All fields are required</div>";
                    }

                    // Redirect after 2 seconds
                    header('Refresh: 2; URL=edit.php');
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $select_data['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" value="<?php echo $select_data['username']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $select_data['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="https://dummyimage.com/800x300/dddddd/fff.png&text=Responsive+Image" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</section>

<?php require('../includes/footer.php'); ?>