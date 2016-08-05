<!DOCTYPE html>
<html lang="en">
<?php
session_start();
 include("functions/functions.php");  ?>
<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>

 


<div class="container">
<h1>Hellow world</h1>


     
  <div class="row">
    <div class="col-sm-2 sidenav">
     <div class="panel panel-primary">
        <div class="panel-heading">Category</div>
        <div class="panel-body">
       <p> <?php getCats();  ?></p>
        </div> 
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">Brand</div>
        <div class="panel-body">
          <?php getBrands() ?>   
        </div>   
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading">Price</div>
        <div class="panel-body">
          <p><a href="#">5000-10000</a></p>
          <p><a href="#">10000-15000</a></p>
          <p><a href="#">15000-30000</a></p>
        </div>        
      </div>
      
    </div>
    
    <div class="col-sm-8">    
       <p> 
          <?php 
             $get_pro="select * from products";
  $run_pro=mysqli_query($con, $get_pro);

  while($row_pro=mysqli_fetch_array($run_pro)){
    $pro_id=$row_pro['prod_id'];
    $pro_cat=$row_pro['prod_cat'];
    $pro_brand=$row_pro['prod_brand'];
    $pro_title=$row_pro['prod_title'];
    $pro_price=$row_pro['prod_price'];
    $pro_image=$row_pro['prod_image'];

    echo " <div class='col-sm-4'>


       <div class='panel panel-default'>
            <div class='panel-heading'><h4>$pro_title</h4></div>
            <div class='panel-body'><img src='images/$pro_image' width='180' hight='180' /><h5> $ $pro_price</h5>
            
          <a href='details.php?prod_id=$pro_id' style='float:left'>Detail</a>
          <a href='site.php?prod_id=$pro_id'><button type='button' class='btn btn-primary'style='float:right'>add to cart</button></a>
          </div>
           </div>
          </div>
        
    ";
  }

           ?>

       </p>          
   </div>
 
<div class="col-sm-2 style=float:right">
    <div class="sidebar style=float:right" >
      <div class="well">
       <p><h4>Wellcome guest</h4>
          <a href="cart.php">Go to cart</a>
       </p>
    </div>

     <div class="well">
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