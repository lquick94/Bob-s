

// READ records
function readRecords() {
    $.get("ajax/readUsers.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 
 
function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete this item?");
    if (conf == true) {
        $.post("ajax/delete.php", {
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
    $.post("ajax/readUserDetails2.php", {
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

 
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});