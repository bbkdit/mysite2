<?php
session_start();
// include("includes/leftside.php"); ?>


 <!DOCTYPE html>
<html lang="en">
<?php include("functions/functions.php");  ?>
<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>

  <?php $ip=getIp();
          $sel_cart="select * from cart where ip_add='$ip'";
         $run_cart=mysqli_query($con, $sel_cart);
         $check_cart= mysqli_num_rows($run_cart);

        /* if($check_cart==0){
            $_SESSION['customer_email']=$c_email;
         
          echo "<script>window.open('my_account.php','_self')</script>";

         */ ?>


<div class="container">



     
  <div class="row">
    <div class="col-sm-2 sidenav">
    
    </div>
    <div class="col-sm-8">    
       <p>
       <?php 
          if(!isset($_SESSION['customer_email'])){

            include("customer_login.php");
          }
         else{
               
            include("payment.php");
          }
        ?> 
       </p>          
   </div>
 
<div class="col-sm-2 style=float:right">
    <div class="sidebar style=float:right" >
      <div class="well" style="background-color:#ff6600;">
       <p><h4>Wellcome guest!!<?php echo  $ip=getIp(); ?></h4><hr>
          
          No Of Items:<?php  total_items(); 
                           ?><br>
          Total Price:<?php  total_price(); ?><hr>
          <a href="cart.php">Go to cart</a><br>

       </p>
    </div>

     <div class="well">
       <p><h4>Ads hear</h4>
          <img src="images/kajal_agarwal_hot_in_saree_stills_007.jpg" width="130" height="180">
          <a href="cart.php">get it</a>
       </p>
    </div>


  </div>
</div> 
</div>  
 <?php  include("includes/footer.php");  ?>
 </div>