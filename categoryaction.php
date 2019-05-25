
<?php
session_start();
     
include('connection.php');

$categoryname=$_POST['categoryname'];
$categorydesc=$_POST['categorydesc'];


$name=$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"Category/$name");


$check_category = mysqli_query($db, "SELECT * FROM category WHERE categoryname = '$categoryname' ");
if(mysqli_num_rows($check_category) > 0){
      header('Location:category.php?error=1'); 
}
else{

   mysqli_query($db, "INSERT INTO category(categoryname, categoryimage, categorydesc) VALUES('$categoryname', '$name', '$categorydesc' )");


   if($mysqli_query_execute->num_rows ===0){
          header('Location:category.php?error=2');
        }
else{ 
          header('Location:category.php?error=3');

         }
}

?>