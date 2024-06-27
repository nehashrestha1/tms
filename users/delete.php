<?php require ('../config/config.php');
// Assuming there is a DELETE operation, not INSERT in this file
// Here is an example of deleting a user with a specific id
if (isset($_GET['id'])) 
    $id = $_GET['id'];

    // SQL statement to delete a record
    $sql = "DELETE FROM users WHERE id = $id";
    

//     if ($conn->query($sql) === TRUE) {
//         echo "Record deleted successfully";
//     } else {
//         echo "Error deleting record: " . $conn->error;
//     }
// }

echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";

// Close connection
// $conn->close();

?>
