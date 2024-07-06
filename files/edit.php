<?php
require('../includes/header.php');
require('../includes/navbar.php');
?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">files</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add files</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage files</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $select = "SELECT * FROM files WHERE id='$id'";
                    $select_result = mysqli_query($conn, $select);

                    $select_data = mysqli_fetch_assoc($select_result);
                }

                if (isset($_POST['save'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];

                    $filename = $_FILES['dataFile']['name'];
                    $filesize = $_FILES['dataFile']['size'];

                    if ($title != "" && $description != "" && $filename == "") {
                        $select = "UPDATE files SET title='$title', description='$description' ";
                        $select_result = mysqli_query($conn, $select);
                        if ($select_result) {
                            echo "Data are updated";
                            header("Refresh:2; URL=index.php");
                        } else {
                            echo "Data are not updated";
                        }
                    } else {

                        if ($title != "" && $description != "" && $filename != "") {
                            $explode = explode('.', $filename);
                            $file = strtolower(@$explode['0']);
                            $ext = strtolower(@$explode['1']);

                            $rep = str_replace(' ', '', $file);
                            $finalname = $rep . time() . '.' . $ext;


                            if ($title != "" && $description != "" && $filename != "") {
                                if ($filesize < 2 * 1024 * 1024) {
                                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif') {

                                        $oldfilelink = $select_data['file_link'];
                                        $finallink = '../uploads/' . $oldfilelink;
                                        if (file_exists($finallink)) {
                                            unlink($finallink);
                                        }
                                        if (move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/' . $finalname)) {
                                            $insert = "UPDATE files SET title ='$title', description='$description', file_link='$finalname', type='$ext' WHERE id = $id";
                                            $result = mysqli_query($conn, $insert);
                                            if ($result) {
                                                echo "File is submitted";
                                                header("Refresh:2; URL=index.php");
                                            } else {
                                                echo " File is not submitted";
                                            }
                                        } else {
                                            echo "File is not uploaded";
                                        }
                                    } else {
                                        echo "File extension does not match";
                                    }
                                } else {
                                    echo "File size nust be less than 2 MB";
                                }
                            } else {
                                echo "All fields are required";
                            }
                        } else {
                            echo "All fields are required";
                        }
                    }
                }

                ?>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" value="<?php echo $select_data['title']; ?>" class="form-control" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $select_data['title']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Image</label>
                            <img src="<?php echo '../uploads/' . $select_data['file_link']; ?>" width="100" height="100" alt="">
                            <input type="file" name="dataFile" accept="image/*" class="form-control" id="file_link">
                        </div>
                        <button type="submit" name="save" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="https://dummyimage.com/800x300/dddddd/fff.png&text=Responsive+Image" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</section>


<?php
require('../includes/footer.php');
?>