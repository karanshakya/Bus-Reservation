
<?php
session_start();
     
include('connection.php');

$countryid=$_POST['countryid'];
$statename=$_POST['statename'];


$check_state = mysqli_query($db, "SELECT * FROM state WHERE countryid = '$countryid' AND statename = '$statename' ");
if(mysqli_num_rows($check_state) > 0){
      header('Location:country.php?error=4'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO state(countryid, statename) VALUES('$countryid', '$statename' )");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:country.php?error=5');
        }
else{ 
          header('Location:country.php?error=6');

         }
}

?>