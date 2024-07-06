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

               if(isset($_POST['save'])){
                $title = $_POST['title'];
                $description = $_POST['description'];

                $filename= $_FILES['dataFile']['name'];
                $filesize= $_FILES['dataFile']['size'];

                $explode=explode('.',$filename);
                $file=strtolower(@$explode['0']);
                $ext=strtolower(@$explode['1']);

                $rep=str_replace(' ','',$file);
                $finalname=$rep . time().'.'.$ext;

                if($title!="" && $description!="" && $filename!=""){
                    if($filesize< 2*1024 *1024){
                        if($ext=='jpg' || $ext=='png' || $ext=='jpeg' || $ext=='gif'){
                            if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'../uploads/'.$finalname)){
                                $insert="INSERT INTO files (title, description, file_link, type) VALUES('$title', '$description', '$finalname', '$ext')";
                                $result= mysqli_query($conn, $insert);
                                if($result){
                                    echo "File is submitted";
                                    header("Refresh:0; URL=index.php");
                                }
                                else{
                                    echo " File is not submitted";
                                }
                            }else{
                                echo "File is not uploaded";
                            }
                        }
                        else{
                            echo "File extension does not match";
                        }

                    }
                    else{
                        echo "File size nust be less than 2 MB";
                    }

                }else{
                    echo "All fields are required";
                }
              

               }
               
               ?>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Image</label>
                            <input type="file" name="dataFile" accept="image/*" class="form-control" id="file_link" >
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