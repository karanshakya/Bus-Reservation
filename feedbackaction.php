
<?php
session_start();
     
include('connection.php');

$useremailid=$_POST['useremailid'];
$feedbacksubject=$_POST['feedbacksubject'];
$feedbackdesc=$_POST['feedbackdesc'];

date_default_timezone_set("Asia/Kolkata");
$senddate= date("Y-m-d") . ' ' . date("H:i:s");



   mysqli_query($db, "INSERT INTO feedback(useremailid, feedbacksubject, feedbackdesc, senddate) VALUES('$useremailid', '$feedbacksubject', '$feedbackdesc', '$senddate' )");

   if($mysqli_query_execute->num_rows ===0){
          header('Location:feedback.php?error=2');
        }
else{ 
          header('Location:feedback.php?error=3');

         }


?>