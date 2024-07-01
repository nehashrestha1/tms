
<?php

require('../config/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "DELETE FROM tasks WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?msg=success\">";

}

?>