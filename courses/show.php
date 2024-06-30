<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Course Details</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Courses</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $select = "SELECT * FROM Courses WHERE id='$id'";
                    $select_result = mysqli_query($conn, $select);
                    $select_data = mysqli_fetch_assoc($select_result);
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="courseName" class="form-label">Course Name</label>
                        <input type="text" name="c_name" value="<?php echo $select_data['c_name']; ?>" readonly class="form-control" id="courseName">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" readonly id="description"><?php echo $select_data['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" value="<?php echo $select_data['duration']; ?>" readonly id="duration">
                    </div>
                    <div class="mb-3">
                        <label for="fees" class="form-label">Fees</label>
                        <input type="text" name="fees" class="form-control" value="<?php echo $select_data['fees']; ?>" readonly id="fees">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" value="<?php echo $select_data['status']; ?>" readonly id="status">
                    </div>
                    <div class="mb-3">
                        <label for="createdAt" class="form-label">Created At</label>
                        <input type="text" name="created_at" class="form-control" value="<?php echo $select_data['created_at']; ?>" readonly id="createdAt">
                    </div>
                    <div class="mb-3">
                        <label for="updatedAt" class="form-label">Updated At</label>
                        <input type="text" name="updated_at" class="form-control" value="<?php echo $select_data['updated_at']; ?>" readonly id="updatedAt">
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="https://dummyimage.com/800x300/dddddd/fff.png&text=Responsive+Image" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</section>

<?php require('../includes/footer.php'); ?>
