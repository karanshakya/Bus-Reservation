<?php
session_start();


include "connection.php";

$id=$_POST['id'];

$branchname=$_POST['branchname'];
$brancharea=$_POST['brancharea'];
$empmailid=$_POST['empmailid'];
$branchaddress=$_POST['branchaddress'];
$branchcity=$_POST['branchcity'];
$branchcountry=$_POST['branchcountry'];
$branchstate=$_POST['branchstate'];
$branchpostal=$_POST['branchpostal'];
$branchstatus=$_POST['branchstatus'];
$branchdesc=$_POST['branchdesc'];


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE branch SET brancharea='$brancharea', empmailid='$empmailid',  branchaddress='$branchaddress', branchpostal='$branchpostal', branchstatus='$branchstatus', branchdesc='$branchdesc' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:branchupdate.php?error=1 & id='.$id);
        }
else{ 
            header('Location:branchupdate.php?error=2  & id='.$id);
         }
$db->close();

?> 
