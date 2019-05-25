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
<?php include "adminmenu.php" ?>   
<?php include "connection.php" ?>          
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<br>


<center>
<h4>Change <strong style="color:red">Branch</strong> Details</h4>
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
$id=$_GET['id'];
    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT b.id, b.branchname, b.brancharea, b.branchimage, b.empmailid, b.branchaddress, b.branchcity, b.branchpostal, b.branchdesc, b.branchstatus, b.branchdate, r.fullname, c.countryname, s.statename FROM register r, country c, state s, branch b WHERE r.emailid=b.empmailid AND b.branchcountry=c.id AND b.branchstate=s.id AND b.id='$id' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="branchupdateaction.php" enctype="multipart/form-data">

<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
      
   <input type="hidden" class="form-control" id="id" placeholder="Id" name="id" value='<?php echo $row['id'] ?>' readonly>
      </div>
</div>

<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
        <label for="">Branch Name :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-home"></i></span>
      <input type="text" class="form-control" id="branchname" placeholder="Branch Name" name="branchname" value="<?php echo $row['branchname'] ?>" readonly>
      </div>
    </div>
    <div class="col-xs-12 col-sm-5 form-group">
      <label for="">Branch Area :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="brancharea" placeholder="Branch Area" name="brancharea" value="<?php echo $row['brancharea'] ?>" required>
      </div>
    </div>
</div> 
<div class="row">
  <?php     
$sql6=mysqli_query($db,"SELECT * FROM register WHERE role='employee' ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
    <label for="">Employee :</label>
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
   <select class="form-control" id="empmailid" name="empmailid" required>
    <option value=<?php echo $row['empmailid'];?>><?php echo $row['fullname'] ." (". $row['empmailid'] . ")"; ?></option>
  <option value="" style="color:red">Please Select Employee</option> 
     <?php while ($row6=mysqli_fetch_array($sql6)) { ?>
  <option value=<?php echo $row6['emailid'];?>><?php echo $row6['fullname'] ." (". $row6['emailid'] . ")"; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
 <div class="col-xs-12 col-sm-5 form-group">
  <label for="">Address :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="branchaddress" placeholder="Branch Address" name="branchaddress" value="<?php echo $row['branchaddress'] ?>" required>
      </div>
    </div>  
  </div> 
 <div class="row">
    <div class="col-xs-12 col-sm-5 form-group">
      <label for="">City :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="branchcity" placeholder="Town / City" name="branchcity" value="<?php echo $row['branchcity'] ?>" readonly>
    </div>
    </div>
 <div class="col-xs-12 col-sm-5 form-group">
  <label for="">Country :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="branchcountry" placeholder="Country" name="branchcountry" value="<?php echo $row['countryname'] ?>" readonly>
    </div>
    </div>    
 </div> 

<div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
  <label for="">State :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="branchstate" placeholder="State" name="branchstate" value="<?php echo $row['statename'] ?>" readonly>
    </div>
    </div>
 <div class="col-xs-12 col-sm-5 form-group">
  <label for="">Postal :</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
  <input type="text" class="form-control" id="branchpostal" placeholder="Postal Code" name="branchpostal" value="<?php echo $row['branchpostal'] ?>" required maxlength="6" title="The postal number must enter 6 digits number"
  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
     </div>
    </div>
</div>   
<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
    <label for="">Status :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
    <select class="form-control" id="branchstatus" name="branchstatus" required>
      <option value="<?php echo $row['branchstatus']; ?>"><?php echo $row['branchstatus']; ?></option>
         <option value="">Please Select Status</option>
         <option value="Open">Open</option>
         <option value="Close">Close</option>
      </select>
     </div>
   </div>
</div>  
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <label for="">Description :</label>
    <textarea class="form-control" rows="2" id="branchdesc" name="branchdesc" placeholder="Describe about the branch details in 4000 words." value="<?php echo $row['branchdesc'] ?>" required><?php echo $row['branchdesc'] ?></textarea> 
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
    




