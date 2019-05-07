<?php
   $user_id=$_SESSION["s_id"];
   $db=new mysqli("localhost","root","","apcl");
   $con_table=$db->query("select cb.name,cb.phone,cb.email,cb.added_on,c.name from contact_book cb,category c where c.id=cb.category_id and cb.user_id='$user_id'");
   
   echo "<table class='table'>";
   echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Added On</th><th>Category</th></tr>";
   
   while(list($name,$phone,$email,$added_on,$category)=$con_table->fetch_row()){
	   
	   $added_on=date("d M Y h:i A",strtotime($added_on));
	   
	   
	 echo "<tr><td>$name</td><td>$phone</td><td>$email</td><td>$added_on</td><td>$category</td></tr>";  
   }
   
   echo "</table>";
   
?>