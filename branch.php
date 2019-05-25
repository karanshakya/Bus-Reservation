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
$('#date').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script> 
<script type="text/javascript">
function fun1(val)
{
//alert("val")
obj=new XMLHttpRequest();

obj.open("post","country1.php?id="+val,true)
obj.send()
      obj.onreadystatechange=fun2
      
      }
      function fun2()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('branchstate').innerHTML=(obj.responseText)
}
}
</script>
<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#addbranch").show();
               $("#viewbranch").hide();
      });
    $("#view").click(function(){
               $("#addbranch").hide();
               $("#viewbranch").show();
      });
});
</script>

</head>
<?php include "header.php"; ?>
<?php include "adminmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">

<br><br>
<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-info">Add Branches</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Branches</strong></label>
   </center> 
      </div>
    </div>
 <div id="addbranch">
<center><h3><strong>Branch</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Branch alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Branch details is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#3333ff'>*&nbsp; Branch details is successfully added. </b>";       
                }
            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="branchaction.php" enctype="multipart/form-data" >
<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-home"></i></span>
      <input type="text" class="form-control" id="branchname" placeholder="Branch Name" name="branchname" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="brancharea" placeholder="Branch Area" name="brancharea" required>
      </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-image"></i></span>
          <input type="file" name="file" class="form-control" placeholder="Image" required>
      </div>
    </div> 
  <?php     
$sql=mysqli_query($db,"SELECT * FROM register WHERE role='employee' ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
   <select class="form-control" id="empmailid" name="empmailid" required>
  <option value="">Please Select Employee</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['emailid'];?>><?php echo $row['fullname'] ." (". $row['emailid'] . ")"; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
  </div> 
 <div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="branchaddress" placeholder="Branch Address" name="branchaddress" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="branchcity" placeholder="Town / City" name="branchcity" required>
    </div>
    </div>
 </div> 

<div class="row">
<?php     
$sql=mysqli_query($db,"SELECT * FROM country ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
   <select class="form-control" id="branchcountry" name="branchcountry" onChange="fun1(this.value)" required>
  <option value="">Please Select Country</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['id'];?>><?php echo $row['countryname']; ?></option>
<?php } ?>
   </select>    
    </div>
 </div>
<div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>         
<select class="form-control" id="branchstate" name="branchstate" required>
 <option value=""> Please Select State </option>   
</select>
    </div>
</div>
</div>   
<div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
  <input type="text" class="form-control" id="branchpostal" placeholder="Postal Code" name="branchpostal" required maxlength="6" title="The postal number must enter 6 digits number"
  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
     </div>
    </div>
</div>  
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <textarea class="form-control" rows="2" id="branchdesc" name="branchdesc" placeholder="Describe about the branch details in 4000 words." required></textarea> 
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
  

<div id="viewbranch" style="display:none">

<?php

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT b.id, b.branchname, b.brancharea, b.branchimage, b.empmailid, b.branchaddress, b.branchcity, b.branchpostal, b.branchdesc, b.branchstatus, b.branchdate, r.fullname, c.countryname, s.statename FROM register r, country c, state s, branch b WHERE r.emailid=b.empmailid AND b.branchcountry=c.id AND b.branchstate=s.id  ";

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
                    echo "<td style='display:none'>" . $row['id'] . "</td>";
?><td>

<?php echo '<img src="Branch/'.$row['branchimage'].'" height="120px"; width="200px">'; ?>
</td>
<br>
<?php
echo "<tr>";
                    echo "<td style='display:none'>" . $row['id'] . "</td>";
                    echo "<td style='display:none'>" . $row['branchname'] . "</td>";
                    echo "<td style='display:none'>" . $row['brancharea'] . "</td>";
                    echo "<td style='display:none'>" . $row['empmailid'] . "</td>";
                    echo "<td style='display:none'>" . $row['branchaddress'] . ", " . $row['branchcity'] . ", " .  $row['statename'] . ", " .  $row['countryname'] . ", " .  $row['branchpostal'] . "</td>";

                    echo "<td style='display:none'>" . $row['branchdesc'] . "</td>";
                    echo "<td style='display:none'>" . $row['branchstatus'] . "</td>";
                    echo "<td style='display:none'>" . $row['branchdate'] . "</td>";

?>
<td>
<br>
<span>Name: </span><strong class="viewmodal" data-toggle="modal"><?php echo $row['branchname']; ?></strong><br>
<span>Area: </span><strong class="viewmodal" data-toggle="modal"><?php echo $row['brancharea']; ?></strong><br>

</td>
</tr>
<tr>
<td><br>
   <center><a href="branchupdate.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm">Update</a></center>
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



<!-- Model Start -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Branch Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bn"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Branch Arae:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ba"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Employee:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="be"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Status:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bs"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Address:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="baddr"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Assign date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bad"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bdesc"></span></div>
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

<!-- Model Close -->

</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>


<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#bn').text($(this).closest("tr").find('td:eq(1)').text());
    $('#ba').text($(this).closest("tr").find('td:eq(2)').text());
    $('#be').text($(this).closest("tr").find('td:eq(3)').text());
    $('#bs').text($(this).closest("tr").find('td:eq(6)').text());
    $('#baddr').text($(this).closest("tr").find('td:eq(4)').text());
    $('#bad').text($(this).closest("tr").find('td:eq(7)').text());
    $('#bdesc').text($(this).closest("tr").find('td:eq(5)').text());

    $('#myModal').modal('show');

});
</script>