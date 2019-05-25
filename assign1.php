<?php
$id=$_REQUEST['id'];
/*$chiefmailid=$_REQUEST['chiefmailid'];*/
//echo"$country";
include "connection.php";

$data=mysqli_query($db,"SELECT id, itemname FROM items WHERE categoryid='$id' ");
/*echo "<option> Please Select Items </option> ";*/
while($rec=mysqli_fetch_row($data))
{
/*echo "<option value=$rec[0]>$rec[1]</option>";	*/
?>
<input type="checkbox" id ="items" placeholder="Train Name" name="check[]" value="<?php echo $rec[0];?>" > <?php echo $rec[1];?><br>

<?php
}

?>
