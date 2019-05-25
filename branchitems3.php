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

</head>
<?php include "header.php"; ?>
<?php include "empmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">

<br><br>

<?php
$bid=$_GET['bid'];
$cid=$_GET['cid'];

?>
<?php   

$sql3=mysqli_query($db,"SELECT DISTINCT b.branchname, c.categoryname FROM assignitems a, branch b, category c WHERE a.branchid=b.id AND a.catid=c.id AND a.branchid='$bid' AND a.catid='$cid' ");
while ($row3=mysqli_fetch_array($sql3)) {
$bname = $row3['branchname'];
$cname = $row3['categoryname'];
}  
?>
<center>
<h4>View <strong style="color:red"><?php echo $cname ?></strong> in <strong style="color:red"><?php echo $bname ?></strong> Details</h4>
</center>
  

<div id="viewitems">

<?php
include "connection.php";
    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT i.id, i.itemname, i.itemimage, i.itemprice, i.itemdesc, c.categoryname FROM assignitems a, branch b, category c, items i WHERE a.branchid=b.id AND a.catid=c.id AND a.itemid=i.id AND a.branchid='$bid' AND a.catid='$cid' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

?>

<div class="">

<div class="col-xs-12 col-sm-3 form-group"> 
<center>
<table>
<th></th> 
<?php
echo "<tr>";
                    echo "<td style='display:none'>" . $row['id'] . "</td>";
?><td>

<?php echo '<img src="Items/'.$row['itemimage'].'" height="120px"; width="200px">'; ?>
</td>
<br>
<?php
echo "<tr>";
                    echo "<td style='display:none'>" . $row['id'] . "</td>";
                    echo "<td style='display:none'>" . $row['categoryname'] . "</td>";
                    echo "<td style='display:none'>" . $row['itemname'] . "</td>";
                    echo "<td style='display:none'>" . $row['itemprice'] . "</td>";
                    echo "<td style='display:none'>" . $row['itemdesc'] . "</td>";

?>
<td>
<br>
<span>Name: </span><strong class="viewmodal" data-toggle="modal"><?php echo $row['itemname']; ?></strong><br>

</td>
</tr>
<tr>

</tr>

</table>

</center>


</div>
</div>


<?php           

            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);

        } else{
            echo "<center><strong style='color:red'>Sorry, Records not available.</strong></center>";
        }

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);

    }
    
    // Close connection
    mysqli_close($db);

    ?>
</div>



<!-- Model Start -->

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
                        <div class="col-xs-4 text-info"><strong>Item Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="in"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Category:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ic"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Price:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ip"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="idesc"></span></div>
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

<!-- Model Close -->

</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>


<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#in').text($(this).closest("tr").find('td:eq(2)').text());
    $('#ic').text($(this).closest("tr").find('td:eq(1)').text());
    $('#ip').text($(this).closest("tr").find('td:eq(3)').text());
    $('#idesc').text($(this).closest("tr").find('td:eq(4)').text());


    $('#myModal').modal('show');

});
</script>