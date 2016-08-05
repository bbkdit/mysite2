<?php
$host="localhost";
$hname="root";
$hpass="";
$db="ecommerce";

$con = mysqli_connect("$host", "$hname", "") or die("Couldn't Connect");

mysqli_select_db($con, $db) or die ("Couldn't Find Database"); 


//catogery for defferent area//

function getCats(){
	global $con;
	$get_cats="select * from categories";
	$run_cats=mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)) {
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];

		echo " <div class='panel-body'>
                <a href='site.php?cat=$cat_id'>$cat_title</a>
               </div>" ;
	}
}


// brands for differents area//

function getBrands(){
	global $con;
	$get_brands="select * from brands";
	$run_brands=mysqli_query($con, $get_brands);

	while ($row_brands=mysqli_fetch_array($run_brands)) {
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
       
        echo " <div class='panel-body'>
                <a href='site.php?brand=$brand_id'>$brand_title</a>
               </div>" ;
		
	}
}

//showing products at content area//

function getPro(){

   if(!isset($_GET['cat'])){
   	  if(!isset($_GET['brand'])){

	global $con;
	$get_pro="select * from products order by RAND() LIMIT 0,9";
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
            <div class='panel-body'><img src='images/$pro_image' width='180' hight='180' /><h5> Rs. $pro_price</h5>
            
		      <a href='details.php?prod_id=$pro_id' style='float:left'>Detail</a>
		      <a href='site.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'style='float:right'>add to cart</button></a>
		      </div>
           </div>
		      </div>
        
		";
	}
}
}
}


// showing category   // 

function getcatPro(){

   if(isset($_GET['cat'])){

   	$cat_id=$_GET['cat'];

	global $con;
	$get_cat_pro="select * from products where prod_cat='$cat_id'";
	$run_cat_pro=mysqli_query($con, $get_cat_pro);
	$count_cat=mysqli_num_rows($run_cat_pro);
	if($count_cat==0){
		echo "<h2 style='color:red'>No product is found!!!</h2>";
	}

	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		$pro_id=$row_cat_pro['prod_id'];
		$pro_cat=$row_cat_pro['prod_cat'];
		$pro_brand=$row_cat_pro['prod_brand'];
		$pro_title=$row_cat_pro['prod_title'];
		$pro_price=$row_cat_pro['prod_price'];
		$pro_image=$row_cat_pro['prod_image'];

		echo " <div class='col-sm-4'>


		   <div class='panel panel-default'>
            <div class='panel-heading'><h4>$pro_title</h4></div>
            <div class='panel-body'><img src='images/$pro_image' width='180' hight='180' /><h5> Rs. $pro_price</h5>
            
		      <a href='details.php?prod_id=$pro_id' style='float:left'>Detail</a>
		      <a href='site.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'style='float:right'>add to cart</button></a>
		      </div>
           </div>
		      </div>
       
		";
	}
}
}




//  showing brands   //

function getBrandPro(){

   if(isset($_GET['brand'])){

   	$brand_id=$_GET['brand'];

	global $con;
	$get_brand_pro="select * from products where prod_brand='$brand_id'";
	$run_brand_pro=mysqli_query($con, $get_brand_pro);
	$count_brand=mysqli_num_rows($run_brand_pro);
	if($count_brand==0){
		echo "<h2 style='color:red'>No product of this brand is found!!!</h2>";
	}

	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
		$pro_id=$row_brand_pro['prod_id'];
		$pro_cat=$row_brand_pro['prod_cat'];
		$pro_brand=$row_brand_pro['prod_brand'];
		$pro_title=$row_brand_pro['prod_title'];
		$pro_price=$row_brand_pro['prod_price'];
		$pro_image=$row_brand_pro['prod_image'];

		echo " <div class='col-sm-4'>


		   <div class='panel panel-default'>
            <div class='panel-heading'><h4>$pro_title</h4></div>
            <div class='panel-body'><img src='images/$pro_image' width='180' hight='180' /><h5> Rs. $pro_price</h5>
            
		      <a href='details.php?prod_id=$pro_id' style='float:left'>Detail</a>
		      <a href='site.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'style='float:right'>add to cart</button></a>
		      </div>
           </div>
		      </div>
       
		";
	}
}
}



// get ip address  //

function getIp(){

	$ip= $_SERVER['REMOTE_ADDR'];

	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}





// cart  //

function cart(){

	if(isset($_GET['add_cart'])){
		global $con;
		$ip=getIp();

		$pro_id=$_GET['add_cart'];
		$check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_check=mysqli_query($con, $check_pro);
		  if(mysqli_num_rows($run_check)>0){
		  	echo"";
		  }
		  else{
		  	$insert_pro="insert into cart(p_id,ip_add) values('$pro_id','$ip')";
            $run_pro=mysqli_query($con, $insert_pro);

            echo"<script>window.open('site.php','_self')</script>";
		    
		  }
	}
}





//display no of items//

function total_items(){

	if(isset($_GET['add_cart'])){
		global $con;
		$ip=getIp();
		$get_items="select * from cart where ip_add='$ip'";
		$run_items=mysqli_query($con, $get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	else{
		global $con;
		$ip=getIp();
		$get_items="select * from cart where ip_add='$ip'";
		$run_items=mysqli_query($con, $get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	echo " " . $count_items;
}




//display total price//


function total_price(){

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
	  		$values=array_sum($product_price);
	  		$total +=$values;
	  		# code...
	  	}
	  	# code...
	  }
	  echo" <br><b> Rs " . $total;
}



function getDetail(){
	global $con;
	$user=$_SESSION['customer_email'];
	$get_detail="select * from customers where customer_email='$user'";
	$run_detail=mysqli_query($con, $get_detail);

	while ($row_detail=mysqli_fetch_array($run_detail)) {
		//$custome_id=$row_detail['customer_id'];
		$customer_name=$row_detail['customer_name'];
		$customer_email=$row_detail['customer_email'];
		$customer_country=$row_detail['customer_country'];
		$customer_city=$row_detail['customer_city'];
		$customer_contact=$row_detail['customer_contact'];
		$customer_address=$row_detail['customer_address'];
		$customer_image=$row_detail['customer_image'];
		
		echo "
		         <p><img src='images/customer_images/$customer_image'  class='img-rounded' width='335' hight='236'/></p><br>
		        <table class='table table-condensed'>
    
    <tbody>
      <tr>
        <td>NAME:</td>
        <td>$customer_name</td>
      </tr>
      <tr>
        <td>EMAIL:</td>
        <td>$customer_email</td>       
      </tr>
      <tr>
        <td>COUNTRY:</td>
        <td>$customer_country</td>    
      </tr>
       <tr>
        <td>CITY:</td>
        <td>$customer_city</td>       
      </tr>
       <tr>
        <td>CONTACT:</td>
        <td>$customer_contact</td>    
      </tr>
    </tbody>
  </table>
 ";
		
	}
}


function aboutCustomer(){

	  global $con;
	$user=$_SESSION['customer_email'];
	$get_detail="select * from customers where customer_email='$user'";
	$run_detail=mysqli_query($con, $get_detail);

	while ($row_detail=mysqli_fetch_array($run_detail)) {
		//$custome_id=$row_detail['customer_id'];
		$customer_name=$row_detail['customer_name'];
	  echo " " . $customer_name;
}
}




?>




