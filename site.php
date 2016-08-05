<?php
 session_start();
 include("includes/leftside.php"); ?>
    
    <div class="col-sm-8">    
       <p> <?php  cart(); ?>
          <?php  getPro(); ?>
          <?php  getcatPro(); ?>
          <?php  getBrandPro(); ?>
       </p>          
   </div>
 
<div class="col-sm-2 style=float:right">
    <div class="sidebar style=float:right" >
      <div class="well">
       <p><hr>
          
          No Of Items:<?php  total_items(); 
                           ?><br>
          Total Price:<?php  total_price(); ?><hr>
          <a href="cart.php">Go to cart</a><br>
          <?php 
            if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php'>Login</a>";
            }
             else{
              echo "<a href='logout.php'>Logout</a>";
             }
           ?>

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