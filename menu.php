<!doctype html>

<html lang="en">

<?php 
	include 'init.php';
	include 'overallHeader.php';
?>
    
<head>
  <meta charset="UTF-8">
  <title>Angularjs & jQuery - Responsive Tabs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='http://cdn.jsdelivr.net/jquery.responsive-tabs/1.5.1/responsive-tabs.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container" ng-app="myApp">
  <div class="row">
    <div class="col-lg-12">
      <div id="responsiveTabs" responsive-tabs>
        <ul>
          <li><a href="#tab-1">Appetizers</a></li>
          <li><a href="#tab-2">Burgers</a></li>
          <li><a href="#tab-3">Pizza</a></li>
          <li><a href="#tab-4">Pasta</a></li>
          <li><a href="#tab-5">Sides</a></li>
          <li><a href="#tab-6">Drinks</a></li>
          <li><a href="#tab-7">Desserts</a></li>
        </ul>

        <div id="tab-1"> Content tab 1 </div>
        <div id="tab-2"> Content tab 2 </div>
        <div id="tab-3"> Content tab 3 </div>
        <div id="tab-4"> Content tab 4 </div>
        <div id="tab-5"> Content tab 5 </div>
        <div id="tab-6"> Content tab 6 </div>
        <div id="tab-7"> Content tab 7 </div>
      </div>
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js'></script>
<script src='http://cdn.jsdelivr.net/jquery.responsive-tabs/1.5.1/jquery.responsiveTabs.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>