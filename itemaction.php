
<?php
session_start();
     
include('connection.php');

$categoryid=$_POST['categoryid'];
$itemname=$_POST['itemname'];
$itemprice=$_POST['itemprice'];
$itemdesc=$_POST['itemdesc'];


$name=$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"Items/$name");


$check_category = mysqli_query($db, "SELECT * FROM items WHERE categoryid = '$categoryid' AND itemname = '$itemname' ");
if(mysqli_num_rows($check_category) > 0){
      header('Location:items.php?error=1'); 
}
else{

   mysqli_query($db, "INSERT INTO items(categoryid, itemname, itemimage, itemprice, itemdesc) VALUES('$categoryid', '$itemname', '$name', '$itemprice', '$itemdesc' )");


   if($mysqli_query_execute->num_rows ===0){
          header('Location:items.php?error=2');
        }
else{ 
          header('Location:items.php?error=3');

         }
}

?>