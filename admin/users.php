<?php 
	include 'navBar.php';
?>
<body>


<!-- Content Section -->
<div class = "table">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Users:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->

<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" id="item_name" placeholder="Item Name" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="item_description">Item Description</label>
                    <input type="text" id="item_description" placeholder="Item Description" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="item_price">Item Price</label>
                    <input type="text" id="item_price" placeholder="Item Price" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Item</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 
<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="update_item_name">Item Name</label>
                    <input type="text" id="update_item_name" placeholder="" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_item_description">Item Description</label>
                    <input type="text" id="update_item_description" placeholder="" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_item_price">Item Price</label>
                    <input type="text" id="update_item_price" placeholder="" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_item_id">
            </div>
        </div>
    </div>
</div>
</div>
<!-- // Modal -->
 
<!-- Jquery JS file -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
 
<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
 
<!-- Custom JS file -->
<script type="text/javascript" src="js/script2.js"></script>
<script src="js/index.js"></script>
</body>
</html>
  
		<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
