<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Food</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>

<link rel="stylesheet" type="text/css" href="css/style/style1.css"/>
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/admin/main.js"></script>    
<style type="text/css">
body{
background-image: url('Images/lock.gif');
}
</style>

</head>
<?php include "header.php"; ?>
<?php include "topmenu.php"; ?>

<body>
<div class="container-fluid">    
<div class="row">     
<div class="col-xs-12 col-sm-12">


<br><br>

<div class="row">
 
    <div class="col-xs-12 col-sm-3"></div>         
            <div class="col-xs-12 col-sm-9 form-group">
           
      <!-- --------------Login Account----------- -->
 
<form method="POST" action="loginaction.php">

              <div class="row">
                <div class="col-xs-12 col-sm-8 form-group">
                <h3 style="margin-bottom:5px; color:#0000FF;">
            <label>Please Login Your Account</label></h3><br><br>
             <?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){  
                echo " <b style='color:red'>*&nbsp; Username or Password is wrong. </b>";       
                }
            }
            ?> 
               </div>
            </div>
                   
       <div class="row">
         <div class="col-xs-12 col-sm-5 form-group">
          <div class="input-group">
           <span class="input-group-addon"><i class ="fa fa-user"></i></span>
            <input type="email" class="form-control" id="username" placeholder="Emaili Id" name="username" required>
           </div>
         </div>
      </div>
      <br>     
      <div class="row">
        <div class="col-xs-12 col-sm-5 form-group">
           <div class="input-group">
            <span class="input-group-addon"><i class ="fa fa-unlock-alt"></i></span>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
         </div>
        </div>
      </div>                     
       <div class="row btngrp">
        <div class="col-xs-12 col-sm-2">
  <a href="register.php"><button type="button" name="submit" class="btn btn-warning btn-md pull-left">Sign Up</button></a>   
         </div>

<div class="col-xs-12 col-sm-3">
  <!-- <input type="submit" name="submit" class="btn btn-success btn-md pull-right" value="Login"> -->
  <button type="submit" class="btn btn-success btn-md pull-right"><span><span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</span></button>       
</div>
          </div>       
        </form>  
     </div>
  

</div>       







</div>
</div>
</div>


<?php include "footer.php" ?>
</body>
</html>
    




