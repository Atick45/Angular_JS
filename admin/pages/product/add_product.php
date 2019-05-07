<?php

  if(isset($_POST["btnSubmit"])){
	  
	  $category_id=$_POST["cmbCategoryId"];
	  $name=$_POST["txtProductName"];
	  $old_price=$_POST["txtOldPrice"];
	  $new_price=$_POST["txtNewPrice"];
	  $uom=$_POST["cmbUoM"];
	  
	  $photo_tmp=$_FILES["file"]["tmp_name"];
	  $photo_name=$_FILES["file"]["name"];
	 
	  $photo_loc="../img/";
	  
	  $db->query("insert into products(name,old_price,new_price,uom,category_id,photo)values('$name','$old_price','$new_price','$uom','$category_id','')");
	  
	   copy($photo_tmp,$photo_loc.$db->insert_id.".jpg");
	   
	  $db->query("update products set photo='$db->insert_id.jpg' where id='$db->insert_id'");
	  
	 
	  
	  
	  echo "Success";
	  
	  
	  
  }

?>
<form action="#" method="post" enctype="multipart/form-data">
 <div>Category<br/>
   <select name="cmbCategoryId">
     <?php
       $cate_table=$db->query("select id,name from category");
	   while(list($id,$name)=$cate_table->fetch_row()){
		   echo "<option value='$id'>$name</option>";
		}
	 
	 ?>
   </select>
 </div>
 <div>
    Product Name<br/>
    <input type="text" name="txtProductName" />
 </div>
 <div>
    Old Price<br/>
    <input type="text" name="txtOldPrice" />
 </div>
 <div>
    New Price<br/>
    <input type="text" name="txtNewPrice" />
 </div>
 <div>
 UoM<br/>
   <select name="cmbUoM">
     <option value="kg">Kg</option>
     <option value="piece">Piece</option>
     <option value="gm">Gm</option>
   </select>
 </div>
 <div>
   Photo<br/>
   <input  type="file" name="file" />
 </div>
 <br/>
 <div>
 <input type="submit" name="btnSubmit" value="Submit" />
 </div>
 
</form>