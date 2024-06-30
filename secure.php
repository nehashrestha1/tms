<?php
session_start();

if(!isset($_SESSION['email'])){

}
else{
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?msg=error\">";
}

?>