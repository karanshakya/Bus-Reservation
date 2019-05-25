<?php

session_start();
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username=$_POST['username']; 
$password=$_POST['password']; 

$time_now=mktime(date('h')+3,date('i')+30,date('s'));
$logintime = date('h:i:s', $time_now);
$date = date('Y-m-d ');

$sql="SELECT * FROM register WHERE emailid='$username' AND password='$password' ";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['emailid']=$row['emailid'];
$_SESSION['logindate']=$date;
$_SESSION['logintime']=$logintime;

$_SESSION['role']=$row['role'];
$count=mysqli_num_rows($result);
if($count==1)
{
      if ($row['role']=="admin")
      { 
                              $_SESSION['role']=$row['role'];
                              
                              header ("location: adminhome.php");                     
      }
      else if ($row['role']=="employee")
      { 
                               $_SESSION['role']=$row['role'];
 
                               header ("location: emphome.php");                                            
      }
      else if ($row['role']=="user")
      { 
                               $_SESSION['role']=$row['role'];
 
                               header ("location: userhome.php");                                            
      } 
}
else 
{
                         header('Location:login.php?error=1');
}
}
?>