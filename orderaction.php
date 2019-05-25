
<?php
session_start();
     
include('connection.php');

$kid=$_POST['kid'];
$quantity=$_POST['quantity'];
$cardtype=$_POST['cardtype'];
$cardnumber=$_POST['cardnumber'];
$cardpin=$_POST['cardpin'];
$cardedate=$_POST['edate'];
$holdername=$_POST['holdername'];


date_default_timezone_set("Asia/Kolkata");
$orderdate= date("Y-m-d") . ' ' . date("H:i:s");



   mysqli_query($db, "INSERT INTO ordercart(kid, quantity, status, holdername, cardtype, cardnumber, cardpin, cardedate, orderdate) VALUES('$kid', '$quantity', 'Booked', '$holdername', '$cardtype', '$cardnumber', '$cardpin', '$cardedate', '$orderdate' )");

   if($mysqli_query_execute->num_rows ===0){
          header('Location:bookcart.php?error=2 & kid='.$kid);
        }
else{ 
          header('Location:bookcart.php?error=3 & kid='.$kid);

         }


?>