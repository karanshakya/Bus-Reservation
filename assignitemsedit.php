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
<script type="text/javascript">
function fun1(val)
{
//alert("val");
obj=new XMLHttpRequest();


 var emailid = document.getElementById("emailid").value;

 console.log("id--"+val+"- emailid----"+emailid);
/*obj.open("post","addassigntask.php?ids="+val,true)*/
obj.open("post","country3.php?id="+val+"&emailid="+emailid,true)
obj.send()
      obj.onreadystatechange=fun2
      
      }
      function fun2()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('state').innerHTML=(obj.responseText)
}
}
</script>
</head>
<?php include "header.php" ?>
<?php include "empmenu.php" ?>   
<?php include "connection.php" ?>          
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<br>

<?php
$aid=$_GET['id'];

?>
<?php   

$sql3=mysqli_query($db,"SELECT i.itemname FROM assignitems a, items i WHERE a.itemid=i.id AND a.id='$aid' ");
while ($row3=mysqli_fetch_array($sql3)) {
$iname = $row3['itemname'];
}  
?>
<center>
<h4>Change <strong style="color:red"><?php echo $iname ?></strong> Details</h4>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==2){
                    
                echo " <b style='color:red'>*&nbsp; Your details not updated. </b>";       

                }
                elseif($_GET['error']==1){
                    
                echo " <b style='color:#3333ff'>*&nbsp; Your details updated successfully. </b>";       

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

    $sql = "SELECT a.id, a.itemid, i.itemname, i.itemimage, i.itemprice, i.itemdesc, a.itemstatus FROM assignitems a, items i WHERE a.itemid=i.id AND a.id='$aid' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="assignitemseditaction.php" enctype="multipart/form-data">

<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
      
   <input type="hidden" class="form-control" id="id" placeholder="Id" name="id" value='<?php echo $aid ?>' readonly>
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
      <label for="">Price :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-rupee"></i></span>
      <input type="text" class="form-control" id="itemprice" placeholder="Price" name="itemprice" value="<?php echo $row['itemprice'] ?>" readonly>
      </div>
    </div>
</div> 
<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
    <label for="">Status :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
    <select class="form-control" id="itemstatus" name="itemstatus" required>
      <option value="<?php echo $row['itemstatus']; ?>"><?php echo $row['itemstatus']; ?></option>
         <option value="" style="color:red">Please Select Status</option>
         <option value="Available">Available</option>
         <option value="Not-Available">Not-Available</option>
      </select>
     </div>
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
    




