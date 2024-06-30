<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Course</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Courses</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                if (isset($_POST['save'])) {

                    $c_name = $_POST['c_name'];
                    $description = $_POST['description'];
                    $duration = $_POST['duration'];
                    $fees = $_POST['fees'];
                    $status = $_POST['status'];

                    if ($c_name != "" && $description != "" && $duration != "" && $fees != "" && $status != "") {

                        // Check for duplicate course name
                        $duplicate = "SELECT * FROM courses WHERE c_name='$c_name'";
                        $duplicate_result = mysqli_query($conn, $duplicate);
                        $row = mysqli_num_rows($duplicate_result);

                        if ($row == 0) { // Check if no duplicate course name exists
                            $insert = "INSERT INTO courses (c_name, description, duration, fees, status) VALUES ('$c_name', '$description', '$duration', '$fees', '$status')";
                            $result = mysqli_query($conn, $insert);
                            if ($result) {
                                echo "<div class='alert alert-success'>Course is added</div>";
                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                            } else {
                                echo "<div class='alert alert-danger'>Failed to add course</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Course name already exists</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>All fields are required</div>";
                    }

                    // Redirect after 2 seconds
                    header('Refresh: 2; URL=create.php');
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="courseName" class="form-label">Course Name</label>
                        <input type="text" name="c_name" class="form-control" id="courseName">
                    </div>
                    <div class="mb-3">
                        <label for="courseDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="courseDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="courseDuration" class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" id="courseDuration">
                    </div>
                    <div class="mb-3">
                        <label for="courseFees" class="form-label">Fees</label>
                        <input type="text" name="fees" class="form-control" id="courseFees">
                    </div>
                    <div class="mb-3">
                        <label for="courseStatus" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" id="courseStatus">
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
