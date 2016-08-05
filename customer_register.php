<?php
session_start();
 include("includes/db.php"); ?>

<?php//ss include("includes/leftside.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("functions/functions.php");  ?>
<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>

 


<div class="container">


     
  <div class="row">
    <div class="col-sm-2 sidenav">
    
      

     
      
    </div>
    
    <div class="col-sm-8">    
       
        
       <div class="panel panel-info" style="background-color:#99ff99;">
      <div class="panel-heading">Registration</div>
      <div class="panel-body">
         <form class="form-horizontal" role="form" action="customer_register.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="c_name" placeholder="Enter your nane" required="naam kya hai?">
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
        <input type="submit"  name="register" value="insert">
      </div>
    </div>
    
  </form>
      </div>
    </div> <?php  include("includes/footer.php");  ?>  
        </div>  
 
 </div>         
   </div>



 



           <?php

      if(isset($_POST['register'])) {
           
        $ip=getIp();
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_pass=$_POST['c_password'];
        $c_image=$_FILES['c_image'] ['name'];
        $c_image_tmp=$_FILES['c_image'] ['tmp_name'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        
        move_uploaded_file($c_image_tmp, "images/customer_images/$c_image");

       echo $insert_customer="INSERT INTO customers(customer_ip,customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_image) values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
          if($insert_customer){
            echo "inserted";
          }
        $result=mysqli_query($con, $insert_customer);
        if(!$result){
          die('Could not enter data: ' . mysql_error()); } 
          echo "Entered data successfully\n";
        


         
         

         $sel_cart="select * from cart where ip_add='$ip'";
         $run_cart=mysqli_query($con, $sel_cart);
         $check_cart= mysqli_num_rows($run_cart);
         if($check_cart==0){
            $_SESSION['customer_email']=$c_email;
          echo "<script>alert('Account has been created sucessfully!!')</script>";
          echo "<script>window.open('customer/my_account.php','_self')</script>";
         }
         else{
          $_SESSION['customer_email']=$c_email;
          echo "<script>alert('Account has been created sucessfully!!')</script>";
          echo "<script>window.open('checkout.php','_self')</script>";
         }
        
      }
      

     ?>