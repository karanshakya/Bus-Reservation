<!-- <nav class="navbar navbar-fixed-top" style="background-color: #F5F5DC"> -->
<?php

session_start();
$role=$_SESSION['role'];
$role;
if($role!='user')
{
  header('Location: login.php');
}

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
</div>
      
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
<a class="navbar-brand" href="userhome.php"></a>
      <li><a href="userhome.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="viewitems.php"><i class="fa fa-lemon-o"></i> Items</a></li>
      <li><a href="cart.php"><i class="fa fa-cart-plus"></i> Cart</a></li>
      <li><a href="cartorders.php"><i class="fa fa-sort"></i> Orders</a></li>
      <li><a href="feedback.php"><i class="fa fa-comment"></i> Feedback</a></li>

      <li><a href="usermails.php"><i class="fa fa-envelope"></i> Mails</a></li> 
      <li><a href="userprofile.php"><i class="fa fa-pencil"></i> Profile</a></li> 
      <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li> 
     
  </ul>

  <ul class="nav navbar-nav navbar-right"> 
<li><a><strong>Welcome: </strong><strong style="color:red"><?php  echo $email=$_SESSION['emailid']; ?></strong></a></li>
  </ul>       
     </div> 
  </div>
</nav>


