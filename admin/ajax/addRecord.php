
	
<?php
    if(isset($_POST['item_name']) && isset($_POST['item_description']) && isset($_POST['item_price']))
    {
        // include Database connection file 
        include("db_connection.php");
 
        // get values 
        $item_name = $_POST['item_name'];
        $item_description = $_POST['item_description'];
        $item_price = $_POST['item_price'];
 
        $query = "INSERT INTO menu_items(item_name, item_description, item_price) VALUES('$item_name', '$item_description', '$item_price')";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        echo "1 Record Added!";
    }
?>