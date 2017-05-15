<?php
    // include Database connection file 
    include("db_connection.php");
 
    // Design initial table header 
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Item Name</th>
                            <th>Item Description</th>
                            <th>Item Price</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';
 
    $query = "SELECT * FROM menu_items";
 
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
 
    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['item_name'].'</td>
                <td>'.$row['item_description'].'</td>
                <td>'.$row['item_price'].'</td>
                <td>
                    <button onclick="GetUserDetails('.$row['item_id'].')" class="btn btn-warning">Update</button>
                </td>
                <td>
                    <button onclick="DeleteUser('.$row['item_id'].')" class="btn btn-danger">Delete</button>
                </td>
            </tr>';
            $number++;
        }
    }
    else
    {
        // records now found 
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
 
    $data .= '</table>';
 
    echo $data;
?>