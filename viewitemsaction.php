
<?php
session_start();
     
include('connection.php');

$aid=$_GET['aid'];
$usermailid=$_GET['usermailid'];

$bid=$_GET['bid'];
$cid=$_GET['cid'];



date_default_timezone_set("Asia/Kolkata");
$cartdate= date("Y-m-d") . ' ' . date("H:i:s");


$check_cart = mysqli_query($db, "SELECT * FROM cart WHERE usermailid = '$usermailid' AND aid = '$aid' ");
if(mysqli_num_rows($check_cart) > 0){
      header("Location:viewitems3.php?error=1 &  bid=".$bid." & cid=".$cid );
}
else{

   mysqli_query($db, "INSERT INTO cart(usermailid, aid, cartdate) VALUES('$usermailid', '$aid', '$cartdate' )");


   if($mysqli_query_execute->num_rows ===0){
          header("Location:viewitems3.php?error=2 &  bid=".$bid." & cid=".$cid );
        }
else{ 
          header("Location:viewitems3.php?error=3 &  bid=".$bid." & cid=".$cid );

         }
}

?>