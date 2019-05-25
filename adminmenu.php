<!-- <nav class="navbar navbar-fixed-top" style="background-color: #F5F5DC"> -->
<?php

session_start();
$role=$_SESSION['role'];
$role;
if($role!='admin')
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
<a class="navbar-brand" href="adminhome.php"></a>
      <li><a href="adminhome.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="country.php"><span class="glyphicon glyphicon-globe"></span> Locations</a></li>
      <li><a href="empregister.php"><span class="glyphicon glyphicon-user"></span> Employee</a></li>
      <li><a href="branch.php"><span class="glyphicon glyphicon-home"></span> Branches</a></li>
      <!-- <li><a href="category.php"><span class="glyphicon glyphicon-user"></span> Category</a></li>
      <li><a href="items.php"><span class="glyphicon glyphicon-user"></span> Items</a></li> -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-lemon-o"></i> Category & Items<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="category.php">Categories </a></li>
          <li><a href="items.php">Items </a></li>
        </ul>
      </li>
      <li><a href="allorders.php"><i class="fa fa-sort"></i> Orders</a></li>
      <li><a href="viewfeedback.php"><i class="fa fa-comment"></i> Feedbacks</a></li>
      <li><a href="adminmails.php"><i class="fa fa-envelope"></i> Mails</a></li> 
      <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li> 
     
  </ul>

  <ul class="nav navbar-nav navbar-right"> 
<li><a><strong>Welcome: </strong><strong style="color:red"><?php echo $email=$_SESSION['emailid']; ?></strong></a></li>
  </ul>       
     </div> 
  </div>
</nav>
