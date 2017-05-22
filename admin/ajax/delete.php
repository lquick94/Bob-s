<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");
 
    // get user id
    $item_id = $_POST['id'];
 
    // delete User
    $query = "DELETE FROM users WHERE User_id = '$item_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>