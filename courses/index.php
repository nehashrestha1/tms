<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Courses</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="create.php" role="button">Add Course</a>
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];

            if ($msg == 'success') {
                echo "<div class='alert alert-success'>Data is DELETED</div>";
                echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
            }
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "SELECT * FROM Courses ORDER BY id DESC";
                $select_result = mysqli_query($conn, $select);
                $i = 1;
                while ($data = mysqli_fetch_array($select_result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $data['c_name']; ?></td>
                        <td><?php echo $data['description']; ?></td>
                        <td><?php echo $data['duration']; ?></td>
                        <td><?php echo $data['fees']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><?php echo $data['created_at']; ?></td>
                        <td><?php echo $data['updated_at']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                            <a class="btn btn-info btn-sm" href="show.php?id=<?php echo $data['id']; ?>" role="button">Show</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this data?')" href="delete.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php require('../includes/footer.php'); ?>
