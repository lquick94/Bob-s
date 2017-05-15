
	
// Add Record
function addRecord() {
    // get values
    var item_name = $("#item_name").val();
    var item_description = $("#item_description").val();
    var item_price = $("#item_price").val();
 
    // Add record
    $.post("ajax/addRecord.php", {
        item_name: item_name,
        item_description: item_description,
        item_price: item_price
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");
 
        // read records again
        readRecords();
 
        // clear fields from the popup
        $("#item_name").val("");
        $("#item_description").val("");
        $("#item_price").val("");
    });
}
 
// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 
 
function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete this item?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
 
function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_item_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_item_name").val(user.item_name);
            $("#update_item_description").val(user.item_description);
            $("#update_item_price").val(user.item_price);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
 
function UpdateUserDetails() {
    // get values
    var item_name = $("#update_item_name").val();
    var item_description = $("#update_item_description").val();
    var item_price = $("#update_item_price").val();
 
    // get hidden field value
    var id = $("#hidden_item_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            item_name: item_name,
            item_description: item_description,
            item_price: item_price
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
 
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});