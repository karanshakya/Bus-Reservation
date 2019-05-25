<?php
session_start();


include "connection.php";

$id=$_POST['id'];

$itemname=$_POST['itemname'];
$itemprice=$_POST['itemprice'];
$itemstatus=$_POST['itemstatus'];


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE assignitems SET itemstatus='$itemstatus' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:assignitemsedit.php?error=1 & id='.$id);
        }
else{ 
            header('Location:assignitemsedit.php?error=2  & id='.$id);
         }
$db->close();

?> 
