<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tasks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Task</li>
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
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Fetch the task details from the database
                    $select = "SELECT * FROM tasks WHERE id='$id'";
                    $select_result = mysqli_query($conn, $select);

                    if ($select_result) {
                        $select_data = mysqli_fetch_assoc($select_result);
                    } else {
                        echo "<div class='alert alert-danger'>Error fetching task details</div>";
                        exit;
                    }
                }

                if (isset($_POST['save'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $status = $_POST['status'];

                    if ($title != "" && $description != "" && $status != "") {
                        $updated_at = date("Y-m-d H:i:s");

                        // Update the task in the database
                        $update = "UPDATE tasks SET title='$title', description='$description', status='$status', updated_at='$updated_at' WHERE id='$id'";
                        $result = mysqli_query($conn, $update);

                        if ($result) {
                            echo "<div class='alert alert-success'>Task has been updated successfully</div>";
                            echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                        } else {
                            echo "<div class='alert alert-danger'>Error updating the task</div>";
                            header('Refresh: 2; URL=edit.php');
                        }
                    } else {
                        echo "<div class='alert alert-danger'>All fields are required</div>";
                    }

                    // Redirect after 2 seconds
                    header('Refresh: 2; URL=edit.php?id=' . $id);
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="<?php echo htmlspecialchars($select_data['title']); ?>" class="form-control" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required><?php echo htmlspecialchars($select_data['description']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="Pending" <?php echo $select_data['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="In Progress" <?php echo $select_data['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                            <option value="Completed" <?php echo $select_data['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                        </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="https://dummyimage.com/800x300/dddddd/fff.png&text=Responsive+Image" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</section>

<?php require('../includes/footer.php'); ?>
