
    <div class="col-sm-8">    
       
        <div class="panel panel-info" style="align:center;">
      <div class="panel-heading">LOGIN  OR  REGISTER  FOR  PAYMENT.</div>
      <div class="panel-body" style="background-color:#99ffff;">
         <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="pass"  placeholder="Enter password" required="">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="login">Login</button>
      </div>
    </div>
    <p><a href="checkout.php?forgot_pass">forgot password?</a></p>
  </form>
  
  <h3>new?<a href="customer_register.php" style="text-decoration:none;"><span class="label label-info">Register here</span></a></h3>
      </div>
    </div>
                 
   </div>
   <?php 
     if(isset($_POST['login'])){

      $c_email=$_POST['email'];
      $c_pass=$_POST['pass'];

      $sel_c="select * from customers where customer_password='$c_pass' AND customer_email='$c_email'";
       $run_c=mysqli_query($con, $sel_c);
         $check_customer= mysqli_num_rows($run_c);
         if($check_customer==0){
           echo "<script>alert('incorrect password or email!! try again !!')</script>";
           exit();
         }

         $ip=getIp();
          $sel_cart="select * from cart where ip_add='$ip'";
         $run_cart=mysqli_query($con, $sel_cart);
         $check_cart= mysqli_num_rows($run_cart);

         if($check_customer>0 AND $check_cart==0){
            $_SESSION['customer_email']=$c_email;
          echo "<script>alert('you logged in sucessfully!!')</script>";
          echo "<script>window.open('my_account.php','_self')</script>";
         }
         else{
            $_SESSION['customer_email']=$c_email;
          echo "<script>alert('you logged in sucessfully!! thanks')</script>";
          echo "<script>window.open('checkout.php','_self')</script>";
         }
     }


    ?>
 