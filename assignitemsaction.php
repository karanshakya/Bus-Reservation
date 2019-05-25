<?php
session_start();
     
include('connection.php');

$branchid=$_POST['branchid'];
$catid=$_POST['catid'];
$checkbox =$_POST['check'];


for($i=0;$i<count($checkbox);$i++){
$check_id = $checkbox[$i];


$check_train = mysqli_query($db, "SELECT * FROM assignitems WHERE branchid = '$branchid' AND catid = '$catid' AND itemid = '$check_id' ");
if(mysqli_num_rows($check_train) > 0){
      header('Location:assignitems.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO assignitems(branchid, catid, itemid, itemstatus) VALUES('$branchid', '$catid', '$check_id', 'Available')");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:assignitems.php?error=2');
        }
else{ 
          header('Location:assignitems.php?error=3');

         }
     }
}

?>