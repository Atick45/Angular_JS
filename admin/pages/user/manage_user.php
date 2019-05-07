<?php
      
	  if(isset($_POST["btnDelete"])){
		  $user_id=$_POST["txtId"];
		  
		  $db->query("delete from user where id='$user_id'");
		  echo "Deleted";
		  
	   }
	   
   $con_table=$db->query("select u.id,u.username,u.password,r.name,u.inactive from user u,role r where r.id=u.role_id");
   
   echo "<table class='table'>";
   echo "<tr><th>Id</th><th>Username</th><th>Password</th><th>Role</th><th>Status</th><th>&nbsp;</th></tr>";
   
   while(list($id,$username,$password,$rolename,$inactive)=$con_table->fetch_row()){
	   
	   //$added_on=date("d M Y h:i A",strtotime($added_on));
	   $status=$inactive==0?"Active":"Inactive";
	   
	 echo "<tr><td>$id</td><td>$username</td><td>$password</td><td>$rolename</td><td>$status</td><td><form action='home.php?page=3' method='post' style='display:inline'>
<input type='hidden' name='txtId' value='5' />
<input type='submit' name='btnEdit' class='material-icons red600' value='edit'>
</form><form action='home.php?page=5' method='post' style='display:inline' onsubmit='return confirm(\"Are you sure?\")'><input type='hidden' name='txtId' value='$id' /><input type='submit' name='btnDelete' class='material-icons red600' value='delete'></form></td></tr>";  
   }
   
   echo "</table>";
   
?>