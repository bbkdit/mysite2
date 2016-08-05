<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shopping.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="site.php">Home</a></li>
      <li><a href="allproduct.php">All product</a></li>
      <li><a href="my_account.php">my account</a></li>
      <li><a href="#"></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
       <?php 
            if(!isset($_SESSION['customer_email'])){
              echo "<li><a href='checkout.php'><span class='glyphicon glyphicon-log-in'> Login</span></a></li>";
            }
             else{
              echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'> Logout</span></a></li>";
             }
           ?>
    </ul   
  </div>
</nav>
<div class="container">
<div class="panel panel-default">
      <div class="panel-body">
      
      <?php

if( isset( $_SESSION['counter'] ) )
  {
$_SESSION['counter'] += 1;
}
else
{
$_SESSION['counter'] = 1;
}
$msg = "You have visited this page ". $_SESSION['counter'];
$msg .= " times in this session.";
?>


        <?php
         echo date('H:i, jS F'); ?>
        <?php 
          if(isset($_SESSION['customer_email'])){
            echo "<b>wellcome:</b>" . $_SESSION['customer_email'] ;
          }
          else{
            echo "<b>wellcome:guest!!</b>";
          }
            ?>
            <?php echo ( $msg );



             ?>
          
      </div>
    </div>
    </div>