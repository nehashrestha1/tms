<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Tasks</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="create.php" role="button">Add Task</a>
        <div class="row mt-3">
            <div class="col-lg-12">
                <?php

                // Fetch all tasks from the database
                $query = "SELECT * FROM tasks ORDER BY created_at DESC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Title</th>";
                    echo "<th>Description</th>";
                    echo "<th>Status</th>";
                    echo "<th>Created At</th>";
                    echo "<th>Updated At</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['updated_at'] . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-warning btn-sm' href='edit.php?id=" . $row['id'] . "'>Edit</a> ";
                        echo "<a class='btn btn-info btn-sm ' href='show.php?id=" .$row['id'] . "'>Show </a>";
                        echo "<a class='btn btn-danger btn-sm' href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<div class='alert alert-warning'>No tasks found.</div>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</section>

<?php require('../includes/footer.php'); ?>
