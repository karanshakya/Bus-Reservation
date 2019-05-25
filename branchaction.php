
<?php
session_start();
     
include('connection.php');

$branchname=$_POST['branchname'];
$brancharea=$_POST['brancharea'];
$empmailid=$_POST['empmailid'];
$branchaddress=$_POST['branchaddress'];
$branchcity=$_POST['branchcity'];
$branchcountry=$_POST['branchcountry'];
$branchstate=$_POST['branchstate'];
$branchpostal=$_POST['branchpostal'];
$branchdesc=$_POST['branchdesc'];



$name=$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"Branch/$name");

date_default_timezone_set("Asia/Kolkata");
$branchdate= date("Y-m-d") . ' ' . date("H:i:s");


$check_branch = mysqli_query($db, "SELECT * FROM branch WHERE branchname = '$branchname' AND brancharea = '$brancharea' AND empmailid = '$empmailid' ");
if(mysqli_num_rows($check_branch) > 0){
      header('Location:branch.php?error=1'); 
}
else{

   mysqli_query($db, "INSERT INTO branch(branchname, brancharea, branchimage, empmailid, branchaddress, branchcity, branchcountry, branchstate, branchpostal, branchdesc, branchstatus, branchdate) VALUES('$branchname', '$brancharea', '$name', '$empmailid', '$branchaddress', '$branchcity', '$branchcountry', '$branchstate', '$branchpostal', '$branchdesc', 'Open', '$branchdate' )");


   if($mysqli_query_execute->num_rows ===0){
          header('Location:branch.php?error=2');
        }
else{ 
          header('Location:branch.php?error=3');

         }
}

?>