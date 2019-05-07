<?php
      
	  if(isset($_GET["edit"])){
		  $user_id=$_GET["edit"];
		  
		  $db->query("delete from user where id='$user_id'");
		  echo "Deleted";
		  
	   }
	  
	  
   $con_table=$db->query("select u.id,u.username,u.password,r.name,u.inactive from user u,role r where r.id=u.role_id");
   
   echo "<table class='table'>";
   echo "<tr><th>Id</th><th>Username</th><th>Password</th><th>Role</th><th>Status</th><th>&nbsp;</th></tr>";
   
   while(list($id,$username,$password,$rolename,$inactive)=$con_table->fetch_row()){
	   
	   //$added_on=date("d M Y h:i A",strtotime($added_on));
	   $status=$inactive==0?"Active":"Inactive";
	   
	 echo "<tr><td>$id</td><td>$username</td><td>$password</td><td>$rolename</td><td>$status</td><td><a href=''><i class='material-icons red600'>edit</i></a><a href='home.php?page=5&edit=$id'><i class='material-icons red600'>delete</i></a></td></tr>";  
   }
   
   echo "</table>";
   
?>