<?php
      
   $con_table=$db->query("select u.id,u.username,u.password,r.name,u.inactive from user u,role r where r.id=u.role_id");
   
   echo "<table class='table'>";
   echo "<tr><th>Id</th><th>Username</th><th>Password</th><th>Role</th><th>Status</th></tr>";
   
   while(list($id,$username,$password,$rolename,$inactive)=$con_table->fetch_row()){
	   
	   //$added_on=date("d M Y h:i A",strtotime($added_on));
	   $status=$inactive==0?"Active":"Inactive";
	   
	 echo "<tr><td>$id</td><td>$username</td><td>$password</td><td>$rolename</td><td>$status</td></tr>";  
   }
   
   echo "</table>";
   
?>