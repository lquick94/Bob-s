<?php
// include Database connection file
include("db_connection.php");
 
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $item_price = $_POST['item_price'];
 
    // Updaste User details
    $query = "UPDATE menu_items SET item_name = '$item_name', item_description = '$item_description', item_price = '$item_price' WHERE item_id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}