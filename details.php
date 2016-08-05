<!DOCTYPE html>
<html lang="en">
<?php include("functions/functions.php");  ?>
<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>

 <body>


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
  if(isset($_GET['prod_id'])){
    $product_id=$_GET['prod_id'];
  $get_pro="select * from products where prod_id='$product_id'";
  $run_pro=mysqli_query($con, $get_pro);

  while($row_pro=mysqli_fetch_array($run_pro)){
    $pro_id=$row_pro['prod_id'];
    $pro_title=$row_pro['prod_title'];
    $pro_price=$row_pro['prod_price'];
    $pro_image=$row_pro['prod_image'];
    $pro_desc=$row_pro['prod_desc'];

    echo " <div class='col-sm-8'>
        
          <div id='single_product'>
          <img src='images/$pro_image' width='480' hight='380' />
          <h3>$pro_title</h3>
          <h5> Rs. $pro_price</h5>
          <h4>$pro_desc</h4>
          <a href='site.php' style='float:left'>Back</a>
          <a href='site.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'style='float:right'>add to cart</button></a>
          </div
          </div>
        
      
              

    "; 
  }
  }
  ?>
  </p>
       <?php  include("includes/footer.php");  ?>       
   </div>
 


     

    
  
    
    
   

 