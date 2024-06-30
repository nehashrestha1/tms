<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tasks</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Task</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage Tasks</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $select = "SELECT * FROM tasks WHERE id='$id'";
                    $select_result = mysqli_query($conn, $select);
                    $select_data = mysqli_fetch_assoc($select_result);
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label">Title</label>
                        <input type="text" name="title" value="<?php echo $select_data['title']; ?>" readonly class="form-control" id="taskTitle">
                    </div>
                    <div class="mb-3">
                        <label for="taskDescription" class="form-label">Description</label>
                        <textarea name="description" readonly class="form-control" id="taskDescription"><?php echo $select_data['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="taskStatus" class="form-label">Status</label>
                        <input type="text" name="status" value="<?php echo $select_data['status']; ?>" readonly class="form-control" id="taskStatus">
                    </div>
                    <div class="mb-3">
                        <label for="taskCreatedAt" class="form-label">Created At</label>
                        <input type="text" name="created_at" value="<?php echo $select_data['created_at']; ?>" readonly class="form-control" id="taskCreatedAt">
                    </div>
                    <div class="mb-3">
                        <label for="taskUpdatedAt" class="form-label">Updated At</label>
                        <input type="text" name="updated_at" value="<?php echo $select_data['updated_at']; ?>" readonly class="form-control" id="taskUpdatedAt">
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
