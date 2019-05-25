<?php
echo $id=$_GET['id'];
 
 include "connection.php";
 
 $del=mysqli_query($db,"delete from cart where id=$id")or die(mysqli_error());
if($del)
{
echo "<script>alert('selected row deleted')</script>";
}
 echo "<script>location='cart.php'</script>";

?>
