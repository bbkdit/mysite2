
<?php
session_start(); 
 include("includes/leftside.php"); ?>
    
    <div class="col-sm-8">    
       <p> <?php  cart(); ?>
          <div class="panel panel-default" >
      <div class="panel-heading">Welcome to your cart.</div>
      <div class="panel-body">
      <form action="" method="post" enctype="multipart/form-data">
       <table class="table table-hover">
    <thead>
      <tr>
        <th>Remove</th>
        <th>Products</th>
        <th>Quantity</th>
        <th>Total Price</th>
      </tr>
    </thead>



    <tbody>

  <?php
   $total=0;
   global $con;
   $ip=getIp();
   $sel_price="select * from cart where ip_add='$ip'";
   $run_price=mysqli_query($con, $sel_price);
    while ($p_price=mysqli_fetch_array($run_price)) {
      $pro_id=$p_price['p_id'];
      $pro_price="select * from products where prod_id='$pro_id'";
      $run_pro_price=mysqli_query($con, $pro_price);
      while ($pp_price=mysqli_fetch_array($run_pro_price)) {
        $product_price=array($pp_price['prod_price']);
        $product_title=$pp_price['prod_title'];
        $product_image=$pp_price['prod_image'];
        $single_price=$pp_price['prod_price'];
        $values=array_sum($product_price);
        $total+=$values;
       
      
  
     ?>
      <tr>
        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
        <td><?php echo  $product_title  ?><br>
          <img src="images/<?php echo $product_image; ?>"  width="60" hight="60" >
        </td>
        <td><input type="text" size="4" name="qty" value="<?php  $_SESSION['qty'] ?>"></td>

        <?php
         
            if(isset($_POST['update_cart'])){
              $qty=$_POST['qty'];
              
              
              $update_qty="update cart set qty='$qty'";
              $run_qty=mysqli_query($con, $update_qty);
              $_SESSION['qty']=$qty;
              $total=$total*$qty;
            }
          
         ?>
        
        

        <td><?php echo "Rs. " . $single_price; ?></td>
      </tr>
      <?php }   } ?>
      <tr style="color:#000000;">
        <td></td>
        <td></td>
        <td><b>Sub Total</b></td>
        <td><b><?php echo "RS. " . $total; ?></b></td>
      </tr>
      <tr>
        <td><input type="submit" name="remove_cart" value="remove"></td>
        <td><input type="submit" name="update_cart" value="update cart"></td>
        <td><input type="submit" name="continue" value="continue shopping"></td>
        <td><button class="btn btn-primary"><a href="checkout.php" style="color:white; text-decoration:none">checkout</a></button></td>
        
      </tr>
    </tbody>
  </table>
  </form>

  

<?php 
  //function updatecart(){
   // global $con;
     $ip=getIp();

     if(isset($_POST['remove_cart'])){
      foreach ($_POST['remove'] as $remove_id) {
        $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
        $run_delete=mysqli_query($con, $delete_product);
        if($run_delete){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      
      }
     }

    
  // echo @ $up_cart=updatecart();
// }
  if(isset($_POST['continue'])){
      echo "<script>window.open('site.php','_self')</script>";
     
   }
      ?>

  </div>
    </div>
       </p>          
   </div>
 
<div class="col-sm-2 style=float:right">
    <div class="sidebar style=float:right" >
      <div class="well" style="background-color:#ff6600;">
      <hr>
          
          No Of Items:<?php  total_items(); 
                           ?><br>
          Total Price:<?php  total_price(); ?><hr>
          <a href="site.php">Back to shopping</a><br>

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

     <div class="well" style="background-color:#ccffff;">
       <p><h4>Ads hear</h4>
          <img src="images/lap2.jpg" width="120" height="150">
          <a href="cart.php">get it</a>
       </p>
    </div>


  </div>
</div> 
</div>  
 <?php  include("includes/footer.php");  ?>
 </div>