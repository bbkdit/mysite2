<!DOCTYPE html>
<html lang="en">
<?php  include("includes/db.php");  ?>

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>admin area</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.theme.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
<body>
	
	<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"></a></p>
      <p><a href="#"></a></p>
      <p><a href="#"></a></p>
    </div>
    <div class="col-sm-8 text-left">


     <div class="panel panel-info">
    <div class="panel-heading"><h2>welcome admine</h2></div>
    <div class="panel-body">

      <hr>
      <p>insert product detail</p>  
      <form action="admin_area.php" method="post" enctype="multipart/form-data">
      <table class="table">
    <thead>
      <tr>
        <th>products</th>
        <th>input</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>product title</td>
        
        <td><input type="textbox" name="prod_title"></td>
      </tr>
      <tr>
        <td>product category</td>
        
        <td><select name="prod_cat"><option>select category</option>

            <?php
            $get_cats="select * from categories";
  $run_cats=mysqli_query($con, $get_cats);

  while ($row_cats=mysqli_fetch_array($run_cats)) {
    $cat_id=$row_cats['cat_id'];
    $cat_title=$row_cats['cat_title'];

    echo "<option value='$cat_id'>$cat_title</option>" ;
  }

            ?>

        </select></td>
      </tr>
      <tr>
        <td>product brand</td>
        
        <td><select name="prod_brand"><option>select brand</option>
         <?php
                 $get_brands="select * from brands";
  $run_brands=mysqli_query($con, $get_brands);

  while ($row_brands=mysqli_fetch_array($run_brands)) {
    $brand_id=$row_brands['brand_id'];
    $brand_title=$row_brands['brand_title'];
       
        echo( "<option value='$brand_id'>$brand_title</option>" );
    
  }
    ?>


        </td>
      </tr>
      <tr>
        <td>product image</td>
        
        <td><input type="file" name="prod_image"></td>
      </tr>
      <tr>
        <td>product price</td>
        
        <td><input type="textbox" name="prod_price"></td>
      </tr>
      <tr>
        <td>product description</td>
        
        <td><textarea name="prod_desc" cols="22" rows="5 "></textarea></td>
      </tr>
      <tr>
        <td>product keywords</td>
        
        <td><input type="textbox" name="prod_key"></td>
      </tr>
     <tr>
     <td>
         
       <button class="btn btn-primary" type="submit" name="insert_post" value="insert now">insert</button></td>
      </tr>
    </tbody>
  </table>
  </form>
    </div>
    <div class="panel-footer"><?php include("includes/footer.php") ?></div>
    </div>


      
      
      
    </div>
    
  </div>
</div>


</body>
</html>





<?php

if(isset($_POST['insert_post'])){

  $product_title=$_POST['prod_title'];
  $product_cat=$_POST['prod_cat'];
  $product_brand=$_POST['prod_brand'];
  $product_price=$_POST['prod_price'];
  $product_desc=$_POST['prod_desc'];
  $product_key=$_POST['prod_key'];


  $producta_image= $_FILES['prod_image'] ['name'];
  $producta_image_tmp= $_FILES['prod_image'] ['tmp_name'];
  $store="../images/".$producta_image;

  move_uploaded_file($producta_image_tmp, $store );

 
  $insert_product="INSERT INTO products(prod_cat, prod_brand, prod_title, prod_price, prod_desc, prod_image, prod_keyword) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$producta_image','$product_key')";

  $insert_pro=mysqli_query($con, $insert_product);

     if($insert_pro){
      echo" <script>alert('product has been inserted')</script>";
      echo "<script>window.open('admin_area.php','_self')</script>";
     }
}

   ?>