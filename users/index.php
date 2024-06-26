<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>


<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm " href="create.php" role="button"> Add user</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // $select = "SELECT * FROM users ORDER BY id DESC ";
                $select = "SELECT * FROM users ORDER BY name ASC ";
                $select_result = mysqli_query($conn, $select);
                $i=1;
                while ($data = mysqli_fetch_array($select_result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $data['name'] ;?></td>
                        <td><?php echo $data['username'] ;?></td>
                        <td><?php echo $data['email'] ;?></td>
                        <td>
                            <a class="btn btn-primary btn-sm " href="#" role="button">Edit </a>
                            <a class="btn btn-info btn-sm " href="#" role="button">Sow </a>
                            <a class="btn btn-danger btn-sm " href="#" role="button">Delete </a>
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