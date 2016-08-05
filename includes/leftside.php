<!DOCTYPE html>
<html lang="en">
<?php include("functions/functions.php");  ?>
<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>

 


<div class="container">


     
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