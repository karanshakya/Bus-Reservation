<?php
session_start();


include "connection.php";

$id=$_POST['feedbackid'];

$replydesc=$_POST['replydesc'];

date_default_timezone_set("Asia/Kolkata");
$replydate= date("Y-m-d") . ' ' . date("H:i:s");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE feedback SET replydesc='$replydesc', replydate='$replydate' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:replyfeedback.php?error=1 & id='.$id);
        }
else{ 
            header('Location:replyfeedback.php?error=2 & id='.$id);
         }
$db->close();

?> 
