<?php
session_start();


include "connection.php";

$id=$_POST['id'];

$itemname=$_POST['itemname'];
$itemprice=$_POST['itemprice'];
$itemdesc=$_POST['itemdesc'];


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE items SET itemprice='$itemprice', itemdesc='$itemdesc' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:itemupdate.php?error=1 & id='.$id);
        }
else{ 
            header('Location:itemupdate.php?error=2  & id='.$id);
         }
$db->close();

?> 
