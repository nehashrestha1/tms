<?php
require('../includes/header.php');
require('../includes/navbar.php');

// Assuming $conn is your database connection object
// Example: $conn = new mysqli($servername, $username, $password, $dbname);

$select_query = "SELECT * FROM files ORDER BY id DESC";
$result = mysqli_query($conn, $select_query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="create.php" role="button">Add Files</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $select = "SELECT *FROM files";
                $result = mysqli_query($conn, $select);
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo ($row['title']); ?></td>
                        <td><?php echo ($row['description']); ?></td>
                        <td><img src="<?php echo '../uploads/'. $row['file_link']; ?>" width="100" height="100" alt=""></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>
                            <a class="btn btn-info btn-sm" href="show.php?id=<?php echo $row['id']; ?>" role="button">Show</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this files?')" href="delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
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