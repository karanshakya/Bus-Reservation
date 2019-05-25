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
<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#additem").show();
               $("#viewitem").hide();
      });
    $("#view").click(function(){
               $("#additem").hide();
               $("#viewitem").show();
      });
});
</script>
<script type="text/javascript">
function fun1(val)
{
//alert("val")
obj=new XMLHttpRequest();

obj.open("post","assign1.php?id="+val,true)
obj.send()
      obj.onreadystatechange=fun2
      
      }
      function fun2()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('assignitems').innerHTML=(obj.responseText)
}
}
</script>
</head>
<?php include "header.php"; ?>
<?php include "empmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-success">Assign Items</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Assined Items</strong></label>
   </center> 
      </div>
    </div>
 <div id="additem">
<center><h3><strong>Assign Items</strong></h3>
<?php
      if(isset($_GET['error'])==true){
         if($_GET['error']==1){ 
            echo "<b style='color:red'>*&nbsp; Items already exist. </b>";       
          }
        elseif($_GET['error']==2){
           echo "<b style='color:red'>*&nbsp; Items are Assigned successfully not added . </b>";
          }
        elseif($_GET['error']==3){  
           echo "<b style='color:#ff9900'>*&nbsp; Items are assigned successfully done. </b>";       
           }
        }
?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="assignitemsaction.php" enctype="multipart/form-data" >

<div class="row">
<?php     
$sql=mysqli_query($db,"SELECT * FROM branch WHERE empmailid='$email' ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
    <label>Branch :</label>
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-lemon-o"></i></span>
   <select class="form-control" id="branchid" name="branchid" required>
  <option value="">Please Select Branch</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['id'];?>><?php echo $row['branchname'] . " - " . $row['brancharea'] ; ?></option>
<?php } ?>
   </select>    
    </div>
 </div>
  <?php     
$sql2=mysqli_query($db,"SELECT * FROM category ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
    <label>Category :</label>
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-lemon-o"></i></span>
   <select class="form-control" id="catid" name="catid" onChange="fun1(this.value)" required>
  <option value="">Please Select Category</option> 
     <?php while ($row2=mysqli_fetch_array($sql2)) { ?>
  <option value=<?php echo $row2['id'];?>><?php echo $row2['categoryname']; ?></option>
<?php } ?>
   </select>    
    </div>
 </div>
</div>

<br>
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <label>Select Items : </label>
<div id="assignitems"></div>
</div>
</div>

<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>
</div>
  
<div id="viewitem" style="display:none">
<?php

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT DISTINCT  a.branchid, a.catid, c.categoryname, c.categoryimage, c.categorydesc FROM assignitems a, category c, branch b WHERE c.id=a.catid AND b.id=a.branchid AND b.empmailid='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

   ?>

<div class="">

<div class="col-xs-12 col-sm-3 form-group"> 
<center>
<table>
<th></th> 
<?php
echo "<tr>";
                    echo "<td style='display:none'>" . $row['catid'] . "</td>";
                    echo "<td style='display:none'>" . $row['branchid'] . "</td>";
?><td>

<?php echo '<img src="Category/'.$row['categoryimage'].'" height="120px"; width="200px">'; ?>
</td>
<br>
<?php
echo "<tr>";
                    echo "<td style='display:none'>" . $row['id'] . "</td>";
                    echo "<td style='display:none'>" . $row['categoryname'] . "</td>";
                    echo "<td style='display:none'>" . $row['categorydesc'] . "</td>";


?>
<td>
<br>
<span>Name: </span><strong class="viewmodal" data-toggle="modal"><?php echo $row['categoryname']; ?></strong><br>

</td>
</tr>
<tr>
<td><br>
   <center><a href="assignitems2.php?catid=<?php echo $row['catid'] ?> & branchid=<?php echo $row['branchid'] ?>" class="btn btn-info btn-sm">Go To</a></center>
</td>
</tr>

</table>

</center>


</div>
</div>


<?php           

            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);

        } else{
            echo "<center><strong style='color:red'>Sorry, Records not available.</strong></center>";
        }

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);

    }
    
    // Close connection
    mysqli_close($db);

    ?>




</div>



<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Train Route Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Train Number:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tnb" name="trainnumber" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Train Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tn" name="trainname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Train Start - End :</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tse" name="trainstartend" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Train Routes:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="trt" name="trainroutes" value=""></span></div>
                    </div>
                  
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">
                    <i class="fa fa-close"></i>  Close
                </button>
            </div>
        </div>
    </div>
</div> 



</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>


<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#tnb').text($(this).closest("tr").find('td:eq(0)').text());
    $('#tn').text($(this).closest("tr").find('td:eq(1)').text());
    $('#tse').text($(this).closest("tr").find('td:eq(2)').text());
    $('#trt').text($(this).closest("tr").find('td:eq(4)').text());

    $('#myModal').modal('show');

});
</script>