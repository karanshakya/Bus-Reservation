<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Food</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>

<link rel="stylesheet" type="text/css" href="css/style/style1.css"/>
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/admin/main.js"></script>    

<style type="text/css">
body{
background-image: url('Images/bg.jpg');
}
</style>
<script type="text/javascript">
$(document).ready(function(){
/*$('#edate').datepicker({
          dateFormat: 'dd-M-yy',
        }); */
});
</script> 
<script type="text/javascript">
function fun1(val)
{
  /*alert('price');*/
  /*alert(quantity);*/

/*  var prc=document.getElementById("price").value;
  var qunt=document.getElementById("quantity").value;*/
  document.getElementById("total").value = document.getElementById("itemprice").value * document.getElementById("quantity").value;;
}

/*}*/
</script>
</head>
<?php include "header.php"; ?>
<?php include "usermenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<?php
$kid=$_GET['kid'];

?>

<div id="additems">
<center><h3><strong>Book Order</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Order alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Your order successfully not done. </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#3333ff'>*&nbsp; Your order successfully done. </b>";       
                }
            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br>        
<form method="POST" action="orderaction.php" enctype="multipart/form-data" >
  
<div class="row">
  <input type="hidden" class="form-control" name="kid" id="kid" value="<?php echo $kid ?>" readonly>
  <?php     
$sql=mysqli_query($db,"SELECT k.id, b.branchname, b.brancharea, b.branchaddress, b.branchcity, b.branchpostal, b.branchdesc, x.countryname, s.statename, c.categoryname, i.itemname, i.itemprice, k.cartdate FROM assignitems a, branch b, category c, items i, register r, country x, state s, cart k WHERE k.aid=a.id AND k.usermailid=r.emailid AND a.branchid=b.id AND a.catid=c.id AND a.itemid=i.id AND b.branchcountry=x.id AND b.branchstate=s.id AND k.id='$kid' ");
while ($row=mysqli_fetch_array($sql)) { ?>
 <div class="col-xs-12 col-sm-5 form-group">
  <label>Branch :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-home"></i></span>
      <input type="text" class="form-control" id="branchname" placeholder="Branch Name" name="branchname" value="<?php echo $row['branchname'] . " - " . $row['brancharea'] ?>" readonly>
      </div>
    </div>
      <div class="col-xs-12 col-sm-5 form-group">
        <label>Category :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-lemon-o"></i></span>
      <input type="text" class="form-control" id="categoryname" placeholder="Category Name" name="categoryname" value="<?php echo $row['categoryname'] ?>" readonly>
      </div>
    </div>
  </div>
  <div class="row">  
    <div class="col-xs-12 col-sm-5 form-group">
      <label>Item :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-lemon-o"></i></span>
      <input type="text" class="form-control" id="itemname" placeholder="Item Name" name="itemname" value="<?php echo $row['itemname'] ?>" readonly>
      </div>
    </div> 
    <div class="col-xs-12 col-sm-5 form-group">
      <label>Price :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-rupee"></i></span>
      <input type="text" class="form-control" id="itemprice" placeholder="Price" name="itemprice" value="<?php echo $row['itemprice'] ?>" maxlength="5" title="Price enter digits only"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
      </div>
    </div>
</div> 
<?php } ?>
<div class="row">  
    <div class="col-xs-12 col-sm-5 form-group">
      <label>Quantity :</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-lemon-o"></i></span>
      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" maxlength="5" title="Please enter digits only"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onChange="fun1(this.value)">
      </div>
    </div> 
    <div class="col-xs-12 col-sm-5 form-group">
          <label>Total:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-rupee"></i></span>
<input type="text" class="form-control" id="total" placeholder="Total" name="total" readonly>    
      </div>
   </div> 
</div> 
<div class="row">    
<div class="col-xs-12 col-sm-5 form-group">
          <label>Card Holder Name:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-user"></i></span>
<input type="text" class="form-control" id="holdername" placeholder="Card Holder Name" name="holdername" required>    
      </div>
   </div> 
  <div class="col-xs-12 col-sm-5 form-group">
    <label>Card Type:</label>
            <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-credit-card-alt"></i></span>
              <select class="form-control" id="cardtype" name="cardtype" required>
                <option value="">Please Select Card Type</option>
                <option value="debitcard">Debit card</option>
                <option value="credit">Credit Card</option>
                <option value="online">Online</option>
              </select>
        </div>
      </div>
</div> 
<div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
  <label>Card Number:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-credit-card-alt"></i></span>
      <input type="text" class="form-control" id="cardnumber" placeholder="Card Number" name="cardnumber" 
      maxlength="12" title="The card number must enter 12 digits number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
          </div>
      </div>    
 <div class="col-xs-12 col-sm-5 form-group">
  <label>Card Expiry Date:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
    <input type="text" class="form-control"  id="edate" placeholder="Card Expiry Date (MM/YY)" name="edate" required  maxlength="5" title="The CVV must enter digits number" oninput="this.value = this.value.replace(/[^0-9/]/g, '').replace(/(\..*)\./g, '$1');">
          </div>
    </div>  
 </div> 
 <div class="row">
 <div class="col-xs-12 col-sm-2 form-group">
  <label>Card Pin:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-credit-card"></i></span>
    <input type="password" class="form-control" id="cardpin" placeholder="Card Pin" name="cardpin"
    maxlength="3" title="The card pin number must enter 3 digits number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
   </div>
 </div> 
  </div>       
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>    
</div>
  


</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "footer.php"; ?>
</body>
</html>


