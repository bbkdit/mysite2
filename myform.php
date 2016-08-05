 <!DOCTYPE >
 <?php  include("includes/db.php"); ?>
 <?php  include("functions/functions.php"); ?>
 <html>
 <head>
     <title>form</title>
 </head>
 <body>
   <form action="myform.php" method="post" enctype="multipart/form-data">
      name <input type="text" name="c_name">
       email <input type="text" name="c_email">
         password<input type="password" name="c_password">
          image<input type="file" name="c_image">
          country <input type="text" name="c_country">
           city <input type="text" name="c_city">
            contact <input type="text" name="c_contact">
             address <input type="text" name="c_address">
               <input type="submit" name="insert">
                
   </form>
 </body>
 </html>






 <?php

      if(isset($_POST['insert'])) {
           
        $ip=getIp();
        $c_name=$_POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_pass=$_POST['c_password'];
        $c_image=$_FILES['c_image'] ['name'];
        $c_image_tmp=$_FILES['c_image'] ['tmp_name'];
        $c_country=$_POST['c_country'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        
        move_uploaded_file($c_image_tmp, "images/customer_images/$c_image");

       echo $insert_customer="INSERT INTO customers(customer_ip,customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_image) values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
          if($insert_customer){
            echo "inserted";
          }
        $result=mysqli_query($con, $insert_customer);
        if(!$result){
          die('Could not enter data: ' . mysql_error()); } 
          echo "Entered data successfully\n";
        }

?>
