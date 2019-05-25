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
background-image: url('Images/bg.jpg');
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('#dob').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script>
</head>
<?php include "header.php" ?>
<?php include "adminmenu.php" ?>   
<?php include "connection.php" ?>          
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<br>
<?php
$id=$_GET['id'];
?>
<?php   

$sql3=mysqli_query($db,"SELECT i.id, i.itemname, i.itemimage, i.itemprice, i.itemdesc, c.categoryname FROM category c, items i WHERE c.id=i.categoryid AND i.id='$id' ");
while ($row3=mysqli_fetch_array($sql3)) {
$iname = $row3['itemname'];
}  
?>
<center>
<h4>Change <strong style="color:red"><?php echo $iname ?></strong> Details</h4>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==2){
                    
                echo " <b style='color:red'>*&nbsp; Details not updated. </b>";       

                }
                elseif($_GET['error']==1){
                    
                echo " <b style='color:#3333ff'>*&nbsp; Details updated successfully. </b>";       

                }
            }
            ?>
</center>
<br>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>           
            <div class="col-xs-12 col-sm-10 form-group">


<?php

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT i.id, i.itemname, i.itemimage, i.itemprice, i.itemdesc, c.categoryname FROM category c, items i WHERE c.id=i.categoryid AND i.id='$id' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="itemupdateaction.php" enctype="multipart/form-data">

<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
      
   <input type="hidden" class="form-control" id="id" placeholder="Id" name="id" value='<?php echo $row['id'] ?>' readonly>
      </div>
</div>

<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
        <label for="">Item Name :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-home"></i></span>
      <input type="text" class="form-control" id="itemname" placeholder="Item Name" name="itemname" value="<?php echo $row['itemname'] ?>" readonly>
      </div>
    </div>
    <div class="col-xs-12 col-sm-5 form-group">
      <label for="">Category Name :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="categoryname" placeholder="Category" name="categoryname" value="<?php echo $row['categoryname'] ?>" readonly>
      </div>
    </div>
</div> 
<div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
  <label for="">Price :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="itemprice" placeholder="Price" name="itemprice" value="<?php echo $row['itemprice'] ?>" maxlength="5" title="Price enter digits only"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
      </div>
    </div>  
  </div> 
 
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <label for="">Description :</label>
    <textarea class="form-control" rows="2" id="itemdesc" name="itemdesc" placeholder="Describe about the branch details in 4000 words." value="<?php echo $row['itemdesc'] ?>" required><?php echo $row['itemdesc'] ?></textarea> 
  </div> 
</div>       
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Update</span></button>
  </div>
</div>  
               
</form>
</div>

<?php
              
            }

            mysqli_free_result($result);
        } else{
            echo "<center>No records available.</center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    } 
    // Close connection
    mysqli_close($db);

    ?>

  </div>
  </div>
  </div>

</div>
</div> 
</div>

<?php include "footer.php"; ?>

</body>
</html>
    




