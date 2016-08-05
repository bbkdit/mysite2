<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
 include("functions/functions.php");  
include("includes/head.php");
include("includes/nav.php");

 ?>
 <div class="container">
 <h1>my account</h1>
  <?php 
          if(!isset($_SESSION['customer_email'])){

             echo "<script>window.open('checkout.php','_self')</script>";
          }
         
        ?> 
          <div class='panel panel-info' style='align:center;'>
		      <div class='panel-body'>
		      
		      
		        <div class='col-sm-4' style='border:1px solid #c6c6c6; background-color:#ccffff;'><br>
        


     <?php 
         
         $user=$_SESSION['customer_email'];
         $get_detail="select * from customers where customer_email='$user'";
         $run_detail=mysqli_query($con, $get_detail);

         while ($row_detail=mysqli_fetch_array($run_detail)) {
         //$custome_id=$row_detail['customer_id'];
         $customer_name=$row_detail['customer_name'];
           // echo " " . $customer_name;
         }
          getDetail();
	
     ?>
          </div>
          <div class='col-sm-6' style='background-color:#fcfcfc;'>
          <p>
     <?php 
       if(!isset($_GET['my_orders'])){
          if(!isset($_GET['edit_account'])){
               if(!isset($_GET['change_pass'])){
                   if(!isset($_GET['delet_account'])){

                    echo "
                     <h2>About  $customer_name </h2><br>
       There was still enough time left for dusk. But the sky over the city of Delhi was getting darker with
every passing minute. It was the end of May. Summer was at its peak. After breaking the previous
year’s record, yet again, the maximum temperature in the city was at an all-time high. To escape the
hottest part of the day, in the afternoons, people preferred to stay confined to the shelter of their offices
and homes. The air was dry.
     </p>
      <p>
       There was still enough time left for dusk. But the sky over the city of Delhi was getting darker with
every passing minute. It was the end of May. Summer was at its peak. After breaking the previous
year’s record, yet again, the maximum temperature in the city was at an all-time high. To escape the
hottest part of the day, in the afternoons, people preferred to stay confined to the shelter of their offices
and homes. The air was dry.
     </p>
  ";
                   }

               }
          }
      
     }

     ?>
<?php
      if(isset($_GET['my_orders'])){
          include('my_orders.php');
      }
?>


<?php
      if(isset($_GET['edit_account'])){
          include('edit_account.php');
      }
?>

   </div>
     <div class='col-sm-2' style='background-color:#fcfcfc;'>
     <div class="btn-group">
      <ul>
        <li><a href="my_account.php?my_orders"><button  class="btn btn-primary">my order</button></a></li>
         <li><a href="my_account.php?edit_account"><button class="btn btn-primary">Edit Account</button></a></li>
          <li><a href="my_account.php?change_pass"><button class="btn btn-primary">Change Password</button></a></li>
           <li><a href="my_account.php?delet_account"><button class="btn btn-primary">Delete Account</button></a></li>
            <li><a href="my_account.php?"></a></li>
      </ul>
      </div>
     </div>
		        </div>

                
               </div>
 </div>
 </html>