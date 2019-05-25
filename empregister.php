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
input[class=form-control], select[class=form-control], input[type=date] {
background-image: url('Images/b3.jpg');
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
document.getElementById('state').innerHTML=(obj.responseText)
}
}
</script>
<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#addemp").show();
               $("#viewemps").hide();
               $("#viewusers").hide();
      });
    $("#view").click(function(){
               $("#addemp").hide();
               $("#viewemps").show();
               $("#viewusers").hide();
      });
    $("#views").click(function(){
               $("#addemp").hide();
               $("#viewemps").hide();
               $("#viewusers").show();
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


<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-info">Eemployee Register</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">Employees</strong></label>
<label class="radio-inline"><input type="radio" id="views" name="optradio"><strong class="text-warning">Users</strong></label>

   </center> 
  </div>
</div>

<div id="addemp">
<center><h3><strong>Employee Registration</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){
                    
                echo "<b style='color:red'>*&nbsp; Email id alreary exist please give the another email id. </b>";       

                }
                elseif($_GET['error']==2){
                    
                echo "<b style='color:red'>*&nbsp; Mobile number alreary exist please give the another mobile number. </b>";       

                }
                elseif($_GET['error']==3){
                    
                echo "<b style='color:red'>*&nbsp; Registration details successfully not added . </b>";       

                }
                elseif($_GET['error']==4){
                    
                echo "<b style='color:#3333ff'>*&nbsp; Your registration is successfully done. </b>";       

                }
            }
            ?> </center>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>          
       <div class="col-xs-12 col-sm-8 form-group">
           
<br><br>
<form method="POST" action="empregisteraction.php" enctype="multipart/form-data" >
<div class="row">
       <div class="col-xs-12 col-sm-6 form-group">
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-user"></i></span>
      <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
        </div>
      </div>
   <div class="col-xs-12 col-sm-6 form-group">
       <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-user"></i></span>
          <select class="form-control" id="gender" name="gender" required>
                <option value="">Please Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
          </select>
       </div>
   </div>
</div>
    <div class="row">
       <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
      <input type="email" class="form-control" id="emailid" placeholder="Email Id" name="emailid" required>
      </div>
    </div> 
    <div class="col-xs-12 col-sm-6 form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class ="fa fa-lock"></i></span>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
    </div>                               
  </div> 
   
  <div class="row">
    <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-phone"></i></span>
      <input type="text" class="form-control" id="mobile" placeholder="Contact Number" name="mobile" required maxlength="10" title="The contact number must enter 10 digits number"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-image"></i></span>
          <input type="file" name="file" class="form-control" placeholder="Image" onchange="document.getElementById('blah').src=window.URL.createObjectURL(this.files[0])" required>
      </div>
    </div>                       
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="date" class="form-control " data-date-format="" id="dobb" placeholder="Date of Birth" name="dob" required>
      </div>
    </div> 
    <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
<input type="text" class="form-control" id="address" placeholder="Address" name="address" required>    
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="city" placeholder="Town / City" name="city" required>
    </div>
    </div>       
<?php     
$sql=mysqli_query($db,"SELECT * FROM country ")
?>
  <div class="col-xs-12 col-sm-6 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
   <select class="form-control" id="country" name="country" onChange="fun1(this.value)" required>
  <option value="">Please Select Country</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['id'];?>><?php echo $row['countryname']; ?></option>
<?php } ?>
   </select>    
    </div>
 </div>
</div> 
<div class="row">
<div class="col-xs-12 col-sm-6 form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>         
<select class="form-control" id="state" name="state" required>
 <option value=""> Please Select State </option>   
</select>
    </div>
</div>
 <div class="col-xs-12 col-sm-6 form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
  <input type="text" class="form-control" id="postal" placeholder="Postal Code" name="postal" required 
  maxlength="6" title="The postal number must enter 6 digits number"
  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
     </div>
    </div>
</div> 
<div class="row btngrp">
  <div class="col-xs-12 col-sm-12">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>   

<div class="row">
    <div class="col-xs-12 col-sm-2">
<br><br><br>
<img id="blah" alt="your image" width="100" height="100" />
</div>
</div>

</div>
</div>


<div id="viewemps" style="display:none">
  <div id="row">
    <div class="table-responsive">
      <div class="panel panel-primary filterable">
        <div class="panel-heading"><center><h3 class="panel-title">Employee Details</h3></center>
          <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
          </div>
        </div>
       <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Gender" disabled></th>
          <th><input type="text" class="form-control" placeholder="Email" disabled></th>
          <th><input type="text" class="form-control" placeholder="Mobile" disabled></th>
          <!-- <th><input type="text" class="form-control" placeholder="Address" disabled></th>
          <th><input type="text" class="form-control" placeholder="Description" disabled></th> -->
          <th><input type="text" class="form-control" placeholder="View & Delete" disabled></th>


          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT r.id, r.fullname, r.gender, r.emailid, r.mobile, r.image, r.dob, r.address, r.city, r.postal, r.regdate, c.countryname, s.statename FROM country c, state s, register r WHERE r.country=c.id AND r.state=s.id AND r.role='employee' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
$dob = $row['dob'];
$dobb = date("d-M-Y", strtotime($dob));

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['emailid'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
?>

<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
   <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
</td>

<td style="display:none"><?php
 echo '<img src="Images/'.$row['image'].'" height="50px"; width="100px">';
 ?></td>
<?php
                    
                    echo "<td style='display:none'>" . $dobb . "</td>";

echo "<td style='display:none'>" . $row['address' ] . ",&nbsp;" . $row['city' ] . ",<br>" . $row['statename' ] .",&nbsp;" . $row['countryname' ] . ",<br>" . $row['postal' ] .   "</td>";
                    echo "<td style='display:none'>" . $row['role' ] . "</td>";
                    

                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center>Records not available.</center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>
          
   </tbody>
   </table>
   </div>
   </div>
</div>
</div>
</div>



<div id="viewusers" style="display:none">
  <div id="row">
    <div class="table-responsive">
      <div class="panel panel-primary filterable">
        <div class="panel-heading"><center><h3 class="panel-title">Users Details</h3></center>
          <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
          </div>
        </div>
       <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Gender" disabled></th>
          <th><input type="text" class="form-control" placeholder="Email" disabled></th>
          <th><input type="text" class="form-control" placeholder="Mobile" disabled></th>
          <!-- <th><input type="text" class="form-control" placeholder="Address" disabled></th>
          <th><input type="text" class="form-control" placeholder="Description" disabled></th> -->
          <th><input type="text" class="form-control" placeholder="View & Delete" disabled></th>


          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT r.id, r.fullname, r.gender, r.emailid, r.mobile, r.image, r.dob, r.address, r.city, r.postal, r.regdate, c.countryname, s.statename FROM country c, state s, register r WHERE r.country=c.id AND r.state=s.id AND r.role='user' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
$dob = $row['dob'];
$dobb = date("d-M-Y", strtotime($dob));

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['emailid'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
?>

<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
   <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
</td>

<td style="display:none"><?php
 echo '<img src="Images/'.$row['image'].'" height="50px"; width="100px">';
 ?></td>
<?php
                    
                    echo "<td style='display:none'>" . $dobb . "</td>";

echo "<td style='display:none'>" . $row['address' ] . ",&nbsp;" . $row['city' ] . ",<br>" . $row['statename' ] .",&nbsp;" . $row['countryname' ] . ",<br>" . $row['postal' ] .   "</td>";
                    echo "<td style='display:none'>" . $row['role' ] . "</td>";
                    

                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center>Records not available.</center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>
          
   </tbody>
   </table>
   </div>
   </div>
</div>
</div>
</div>



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
                        <div class="col-xs-4 text-info"><strong>Full Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="name" name="fullname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Gender:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="gndr" name="gender" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Email Id:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="eid" name="emailid" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Mobile:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mbl" name="mobile" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>DOB:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="db" name="dob" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Address:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="addr" name="address" value=""></span></div>
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
    $('#name').text($(this).closest("tr").find('td:eq(1)').text());
    $('#gndr').text($(this).closest("tr").find('td:eq(2)').text());
    $('#eid').text($(this).closest("tr").find('td:eq(3)').text());
    $('#mbl').text($(this).closest("tr").find('td:eq(4)').text());
    $('#db').text($(this).closest("tr").find('td:eq(7)').text());
    $('#addr').text($(this).closest("tr").find('td:eq(8)').text());
    $('#rl').text($(this).closest("tr").find('td:eq(9)').text());

    $('#myModal').modal('show');

});
</script>