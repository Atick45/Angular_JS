<?php
 if(isset($_POST["btnSubmit"])){
	 
	 $category_id=$_POST["cmbCategory"];
	 $name=$_POST["txtName"];
	 $phone=$_POST["txtPhone"];
	 $email=$_POST["txtEmail"];
	 $address=$_POST["txtAddress"];
	 
	 $user_id=$_SESSION["s_id"];
	 
	 $now=date("Y-m-d H:i:s");
	 
	 $db=new mysqli("localhost","root","","apcl");
	 
	 $db->query("insert into contact_book(user_id,name,phone,email,address,category_id,added_on)values('$user_id','$name','$phone','$email','$address','$category_id','$now')");
	 
	 $msg="Successfull added!"; 
 }
 
?>
<form class="form-horizontal" action="home.php?page=1" method="post">
  <div><?php echo isset($msg)?$msg:"";?></div>
   <div class="form-group">
    <label  class="col-sm-2 control-label">Category</label>
    <div class="col-sm-10">
      <select name="cmbCategory"  class="form-control">
        <?php
          $db=new mysqli("localhost","root","","apcl");
		  
		  $category_table=$db->query("select id,name from category");
		  
		  while(list($id,$name)=$category_table->fetch_row()){
			  echo "<option value='$id'>$name</option>";
		  }
		  
		?>
      </select>
    </div>
  </div>
  
   <div class="form-group">
    <label  class="col-sm-2 control-label">Contact Name *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Contact Name" name="txtName" required>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Phone *</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Phone" name="txtPhone" required>
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="txtEmail"  placeholder="Email">
    </div>
  </div>
  
  
  
  <div class="form-group">
    <label  class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control"  placeholder="Address" name="txtAddress"></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Add" name="btnSubmit">
    </div>
  </div>
</form>