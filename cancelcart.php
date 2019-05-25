<?php

session_start();
     
include('connection.php');

$id=$_GET['id'];


date_default_timezone_set("Asia/Kolkata");
$edcanceldate= date("Y-m-d") . ' ' . date("H:i:s");

$sql=mysqli_query($db, "select * from ordercart where id='$id' ");
while ($row = mysqli_fetch_array($sql)){
$orderdate = $row['orderdate'];
}

echo round(abs($edcanceldate - $orderdate) / 60,2). " minute";

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$check_order = mysqli_query($db, "SELECT * FROM ordercart WHERE status ='Cancel' AND id='$id'  ");
if(mysqli_num_rows($check_order) > 0){
      header("Location:cartorders.php?error=1"); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
$sql = "UPDATE ordercart SET status='Cancel' WHERE id=$id ";

/*}*/

if ($db->query($sql) === TRUE) {
          header("Location:cartorders.php?error=2");
        }
else{ 
          header("Location:cartorders.php?error=3");

         }
}
$db->close();
?>
