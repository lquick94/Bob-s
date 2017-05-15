<?php
    // include Database connection file 
    include("ajax/db_connection.php");
		include("navBar.php");
    // Design initial table header 
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Active</th>
                            <th>Delete</th>
                        </tr>';
 
    $query = "SELECT * FROM users";
?>
<body>
<div class = "table">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Users:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<?php
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
                <td>'.$row['first_name'].'</td>
                <td>'.$row['last_name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['active'].'</td>
                <td>
                    <button onclick="DeleteUser('.$row['User_Id'].')" class="btn btn-danger">Delete</button>
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
?></body>