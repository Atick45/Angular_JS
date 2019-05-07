<?php   
	 
	 
	 if(isset($_GET["order_id"])){
		 
		$order_id=$_GET["order_id"];
		
		echo "<b>Order No: ".$order_id."</b>";
		
		
		
		
		$order_details_table=$db->query("select p.name,od.qty,od.price from order_master o,products p,order_details od where o.id=od.order_id and p.id=od.item_id and o.id='$order_id'");
		
		
		echo "<table class='table'>";
		echo "<tr><th>SN</th><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>";
		$i=1;
		$invoice_total=0;
		while(list($product,$qty,$price)=$order_details_table->fetch_row()){
			
			$line_total=$qty*$price;
			$invoice_total+=$line_total;
			
			echo "<tr><td>".($i++)."</td><td>$product</td><td>$qty</td><td>$price</td><td>".($line_total)."</td></tr>";
			
		}
		echo "<tr><th colspan='4' style='text-align:right;'>Total= </th><th>$invoice_total</th></tr>";
		echo "</table>";
		
		 
	 }else{
	   
   $con_table=$db->query("select id,order_datetime,customer_name,shipping_address,payment_method,remark from order_master");
   
   echo "<table class='table'>";
   echo "<tr><th>Order Id</th><th>Order Date</th><th>Customer Name</th><th>Shipping Address</th><th>Payment Method</th><th>Remark</th></tr>";
   
   while(list($id,$order_datetime,$name,$shipping_address,$payment_method,$remark)=$con_table->fetch_row()){
	   
	   //$added_on=date("d M Y h:i A",strtotime($added_on));
	   $order_datetime=date("d M y h:i A",strtotime($order_datetime));
	   
	 echo "<tr><td><a href='home.php?page=11&order_id=$id'>$id</a></td><td>$order_datetime</td><td>$name</td><td>$shipping_address</td><td>$payment_method</td><td>$remark</td></tr>";  
   }
   
   echo "</table>";
	 }
?>