<?php

  if(isset($_POST["btnUpdate"])){
	  
	  $user_id=$_POST["txtId"];
	  $role_id=$_POST["cmbRoleId"];
	  $username=$_POST["txtUsername"];
	  $password=md5(trim($_POST["txtPassword"]));
	  $repassword=md5(trim($_POST["txtRePassword"]));
	  
	  if($password==$repassword){
	  
	  $db->query("update user set username='$username' where id='$user_id'");
	  
	  echo "Successfully updated";
	  
	  }else{
		echo "password uporar shathe melanai";  
	   }
	  
  }
  
  
  if(isset($_POST["btnEdit"])){
	  $id=$_POST["txtId"];
	  
	  $user=$db->query("select username,password,role_id,inactive from user where id='$id'");
	  
	  list($username,$password,$role_id,$inactive)=$user->fetch_row();
	  
	  
	}
  

?>
<form action="#" method="post" onSubmit="return confirm('Are you sure?')">
  <div>
    Id<br/>
    <input type="text" name="txtId" value="<?php echo isset($id)?$id:""?>" />
 </div>
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
    <input type="text" name="txtUsername" value="<?php echo isset($username)?$username:""?>" />
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
 <input type="submit" name="btnUpdate" value="Update" />
 </div>
 
</form>