<?php  if(isset($_POST['submit'])){
	$f_name=$_FILES['myfile']['name'];
    $f_tmp=$_FILES['myfile']['tmp_name'];
    $store="upload/".$f_name;
    move_uploaded_file($f_tmp, $store);
}
	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>tutorial</title>
	</head>
	<body>
	<form action="" method="post" enctype="multipart/form-data">
		<p><input type="file" name="myfile"></p>
		<p><input type="submit" value="upload" name="submit"></p>
	</form>
	
	</body>
	</html>