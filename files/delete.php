

<?php

require('../config/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query= "SELECT *FROM files WHERE id =$id";
    $query_result = mysqli_query($conn, $query);

    $row= mysqli_fetch_assoc($query_result);

    $image= $row['file_link'];

    $filelink='../uploads/'.$image;
    unlink($filelink);


    $select = "DELETE FROM files WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?msg=success\">";

}

?>
