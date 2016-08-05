<!DOCTYPE html>
<?php
   include("includes/db.php");

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <style>


  
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>


  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"></a></p>
      <p><a href="#"></a></p>
      <p><a href="#"></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>welcome admine</h1>
      <hr>
      <p>insert product detail</p>
      <form action="insert_product.php" method="post" enctype="multipart/form-data">
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
        <td><input type="submit" name="insert_post" value="insert now"></td>
      </tr>
    </tbody>
  </table>
  </form>
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
  $store="product_images/".$producta_image;

  move_uploaded_file($producta_image_tmp, $store );

 
  $insert_product="INSERT INTO products(prod_cat, prod_brand, prod_title, prod_price, prod_desc, prod_image, prod_keyword) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$producta_image','$product_key')";

  $insert_pro=mysqli_query($con, $insert_product);

     if($insert_pro){
      echo" <script>alert('product has been inserted')</script>";
      echo "<script>window.open('insert_product.php','_self')</script>";
     }
}

















?>s