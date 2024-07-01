<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tasks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Task</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Tasks</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                if (isset($_POST['save'])) {

                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $status = $_POST['status'];

                    if ($title != "" && $description != "" && $status != "") {

                        // Insert the task into the database
                        $created_at = date("Y-m-d H:i:s");
                        $updated_at = $created_at;

                        $insert = "INSERT INTO tasks (title, description, status, created_at, updated_at) 
                                   VALUES ('$title', '$description', '$status', '$created_at', '$updated_at')";
                        
                        $result = mysqli_query($conn, $insert);

                        if ($result) {
                            echo "<div class='alert alert-success'>Task has been added successfully</div>";
                            echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                        } else {
                            echo "<div class='alert alert-danger'>There was an error adding the task</div>";
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
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
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
