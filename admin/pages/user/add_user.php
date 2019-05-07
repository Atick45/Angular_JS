<?php

  if(isset($_POST["btnSubmit"])){
	  
	  $role_id=$_POST["cmbRoleId"];
	  $username=$_POST["txtUsername"];
	  $password=md5(trim($_POST["txtPassword"]));
	  $repassword=md5(trim($_POST["txtRePassword"]));
	  
	  if($password==$repassword){
	  
	  $db->query("insert into user(username,password,role_id,inactive)values('$username','$password','$role_id',0)");
	  
	  echo "Success";
	  
	  }else{
		echo "password uporar shathe melanai";  
	   }
	  
  }

?>
<form action="#" method="post">
 <div>Role<br/>
   <select name="cmbRoleId">
     <?php
       $role_table=$db->query("select id,name from role");
	   while(list($id,$name)=$role_table->fetch_row()){
		   echo "<option value='$id'>$name</option>";
		}
	 
	 ?>
   </select>
 </div>
 <div>
    Username<br/>
    <input type="text" name="txtUsername" />
 </div>
 <div>
    Password<br/>
    <input type="password" name="txtPassword" />
 </div>
 <div>
    Retype Password<br/>
    <input type="password" name="txtRePassword" />
 </div>
 <div>
 <input type="submit" name="btnSubmit" value="Submit" />
 </div>
 
</form>