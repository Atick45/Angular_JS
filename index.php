<?php
require_once("config.php");
?>
<!doctype html>
<html ng-app="myApp">
<head>
<meta charset="utf-8">
<title>{{title}}</title>
<script src="js/angular.min.js"></script>
<script src="js/ngStorage.js"></script>
<script src="js/angular-route.min.js"></script> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php include("css_basic.php");?>
</head>
<body ng-init="cart=[];total=0">

<div class="container-fluid">

   <div class="row">
     <div class="col-md-10">
        <?php
        include("main_menu.php");
		?>
     </div>
    <div class="col-md-2">
      <strong>Your Cart: ${{total}}</strong> 
    </div>
   </div>
   
   <div class="jumbotron">
    <h1>Shop24</h1>
    <p>Welcome to my {{test}}</p>
   </div>
   
  <div class="row">
  
     <div class="col-md-2">
      <?php include("nav.php");?>
     </div>
     
      <div class="col-md-7">
        <div ng-view></div> 
      </div>
  
      <div class="col-md-3">
       <table class='table' style="box-sizing:border-box;">
         <tr><th>&nbsp;</th><th>Item</th><th>Qty</th><th>Price</th></tr>
          <tr ng-repeat="item in cart">
             <td>
             <div class="btn-group">
             <input class="btn btn-primary" type="button" value="Del" ng-click="deleteItem(item.id)" /><input  class="btn btn-primary" type="button" value=" + " ng-click="qtyIn(item)" /><input class="btn btn-primary"  type="button" value=" - " ng-click="qtyOut(item)" />
             </div>
             </td>
             <td>{{item.name}}</td><td>{{item.qty}}</td><td>{{item.price*item.qty}}</td>
          </tr>
          <tr><td colspan="3"><b>Total</b></td><td><b>{{total}}</b></td></tr>
        </table>
         <a class="btn btn-primary" id="v-pills-settings-tab" data-toggle="pill" href="#!checkout">Checkout</a>
      </div>
      
  </div><!--end row-->
  
  
  <div class="row">
    <div class="col-md-12">copyright&copy; 2018</div>
  </div>
  
</div>

<script src="app.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>