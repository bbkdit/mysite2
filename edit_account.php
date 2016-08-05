<?php 
    
   /* include("includes/db.php");


   $user2=$_SESSION['customer_email'];
   $get_detail="select * from customers where customer_email='$user2'";
   $run_detail=mysqli_query($con, $get_detail);

    while ($row_detail=mysqli_fetch_array($run_detail)) {
    $custome_id=$row_detail['customer_id'];
    $customer_name=$row_detail['customer_name'];
    $customer_email=$row_detail['customer_email'];
    $customer_country=$row_detail['customer_country'];
    $customer_city=$row_detail['customer_city'];
    $customer_contact=$row_detail['customer_contact'];
    $customer_address=$row_detail['customer_address'];
    $customer_image=$row_detail['customer_image'];  
    
     echo "$customer_name";
     */
  ?>
<html>
<h3>Update your Account</h3><br>

<form class="form-horizontal" role="form" action="edit_account.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="c_name" placeholder="name" required="naam kya hai?">
      </div>

    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" name="c_email" placeholder="Enter email" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-8">          
        <input type="password" class="form-control" name="c_password" placeholder="Enter password" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="image">Image:</label>
      <div class="col-sm-5">          
        <input type="file" class="form-control" name="c_image" required="">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" >Country:</label>
      <div class="col-sm-5">
        <select class="form-control" name="c_country">
        <option>select country</option>
        <option>India</option>
        <option>Pakistan</option>
        <option>Austrelia</option>
        <option>America</option>
        <option>Chaina</option>
        

        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" name="c_city" placeholder="Enter your city" required="">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="c_contact" placeholder="Enter contect no" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-8">
        <textarea type="text" class="form-control" name="c_address" placeholder="Enter Address" required=""></textarea>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  name="register1" value="update">
      </div>
    </div>
    
  </form>
  </html>