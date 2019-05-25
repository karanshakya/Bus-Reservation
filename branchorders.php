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
input[class=form-control], select[class=form-control], input[type=date] {
background-image: url('Images/b3.jpg');
}
</style>


</head>
<?php include "header.php"; ?>
<?php include "empmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">



<div id="vieworders">
   
  <div id="row">
    <div class="table-responsive">
      <div class="panel panel-primary filterable">
        <div class="panel-heading"><center><h3 class="panel-title">Order Details</h3></center>
          <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
          </div>
        </div>
       <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Customer" disabled></th>
          <th><input type="text" class="form-control" placeholder="Category" disabled></th>
          <th><input type="text" class="form-control" placeholder="Item" disabled></th>
          <th><input type="text" class="form-control" placeholder="Status" disabled></th>
          <th><input type="text" class="form-control" placeholder="Order Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>


          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT o.id, o.quantity, o.status, o.holdername, o.cardtype, o.orderdate, b.branchname, b.brancharea, b.branchimage, b.branchaddress, b.branchcity, b.branchpostal, b.branchdesc, x.countryname, s.statename, c.categoryname, i.itemname, i.itemprice, r.fullname, k.usermailid FROM ordercart o, cart k, assignitems a, category c, items i, branch b, country x, state s, register r WHERE o.kid=k.id AND k.aid=a.id AND a.branchid=b.id AND a.catid=c.id AND a.itemid=i.id AND b.branchcountry=x.id AND b.branchstate=s.id AND k.usermailid=r.emailid AND b.empmailid='$email' ORDER BY o.orderdate DESC ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
$dob = $row['dob'];
$dobb = date("d-M-Y", strtotime($dob));

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fullname'] . " - " . $row['usermailid'] . "</td>";
                    echo "<td>" . $row['categoryname'] . "</td>";
                    echo "<td>" . $row['itemname'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['orderdate'] . "</td>";
?>
<td style="width:6%">
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>
<?php
                    echo "<td style='display:none'>" . $row['itemprice'] . "</td>";
                    echo "<td style='display:none'>" . $row['quantity'] . "</td>";
                    echo "<td style='display:none'>" . $row['itemprice']*$row['quantity'] . "</td>";
                    echo "<td style='display:none'>" . $row['branchname'] . "</td>";
                    

echo "<td style='display:none'>" . $row['branchaddress' ] . ",&nbsp;" . $row['brancharea' ] . ",&nbsp;" . $row['branchcity' ] . ",<br>" . $row['statename' ] .",&nbsp;" . $row['countryname' ] . ",<br>" . $row['branchpostal' ] .   "</td>";

                    echo "<td style='display:none'>" . $row['cardtype' ] . "</td>";
                    

                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center>Records not available.</center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>
          
   </tbody>
   </table>
   </div>
   </div>
</div>
</div>
</div>





<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Customer:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="cust"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Category:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bc"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Item:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bi"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Price:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bp"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Quantity:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="qnt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Total:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tot"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Payment Type:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="pt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Status:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sts"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Order Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="odt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Branch Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bn"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Branch Address:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ba"></span></div>
                    </div>
                  
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">
                    <i class="fa fa-close"></i>  Close
                </button>
            </div>
        </div>
    </div>
</div> 


</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>

<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#cust').text($(this).closest("tr").find('td:eq(1)').text());
    $('#bc').text($(this).closest("tr").find('td:eq(2)').text());
    $('#bi').text($(this).closest("tr").find('td:eq(3)').text());
    $('#bp').text($(this).closest("tr").find('td:eq(7)').text());
    $('#qnt').text($(this).closest("tr").find('td:eq(8)').text());
    $('#tot').text($(this).closest("tr").find('td:eq(9)').text());
    $('#pt').text($(this).closest("tr").find('td:eq(12)').text());
    $('#sts').text($(this).closest("tr").find('td:eq(4)').text());
    $('#odt').text($(this).closest("tr").find('td:eq(5)').text());
    $('#bn').text($(this).closest("tr").find('td:eq(10)').text());
    $('#ba').text($(this).closest("tr").find('td:eq(11)').text());

    $('#myModal').modal('show');

});
</script>