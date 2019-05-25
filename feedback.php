<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Travel</title>
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

<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#sendfeedback").show();
               $("#viewfeedbacks").hide();
      });
    $("#view").click(function(){
               $("#sendfeedback").hide();
               $("#viewfeedbacks").show();
      });
});
</script>
</head>
<?php include "header.php"; ?>
<?php include "usermenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">

<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-info">Give Feedback</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Feedbacks</strong></label>

   </center> 
      </div>
    </div>
<div id="sendfeedback">    
<center><h3><strong>Feedback</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){
                    
                echo "<b style='color:red'>*&nbsp; Feedback alreary exist. </b>";       

                }
                elseif($_GET['error']==2){
                    
                echo "<b style='color:red'>*&nbsp; Feedback details successfully not ended . </b>";       

                }
                elseif($_GET['error']==3){
                    
                echo "<b style='color:#ff9900'>*&nbsp; Feedback is successfully send. </b>";       

                }
            }
            ?> </center>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>          
            <div class="col-xs-12 col-sm-8 form-group">
           
<div class="log">
<form method="POST" action="feedbackaction.php" enctype="multipart/form-data" >

<div class="row">
       <div class="col-xs-12 col-sm-12 form-group">
        <label>Email id:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
      <input type="text" class="form-control" id="useremailid" placeholder="User Mail Id" name="useremailid" value="<?php echo $email ?>" readonly>
        </div>
      </div>
      </div>
  <div class="row">    
 <div class="col-xs-12 col-sm-12 form-group">
  <label>Subject:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-edit"></i></span>
      <input type="text" class="form-control" id="feedbacksubject" placeholder="Subject" name="feedbacksubject" required>
      </div>
    </div> 
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 form-group">
    <label>Description:</label>
    <textarea class="form-control" rows="2" id="feedbackdesc" name="feedbackdesc" placeholder="Describe about the feedback in 4000 words." required></textarea> 
  </div> 
</div>      
<div class="row btngrp">
  <div class="col-xs-12 col-sm-12">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                


</form>  
</div>
            
</div>
</div>
</div>


 <div id="viewfeedbacks" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Feedback Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Subject" disabled></th>
          <th><input type="text" class="form-control" placeholder="Send Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM feedback WHERE useremailid='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['feedbacksubject'] . "</td>";
                    echo "<td>" . $row['senddate'] . "</td>";
?>

<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>
<?php
                
                    echo "<td style='display:none'>" . $row['feedbackdesc' ] . "</td>";
                    echo "<td style='display:none'>" . $row['replydesc' ] . "</td>";
                    echo "<td style='display:none'>" . $row['replydate' ] . "</td>";
                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center><strong style='color:red'>Records not available.</strong></center>";
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
                        <div class="col-xs-4 text-info"><strong>Subject:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sub"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Send Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sd"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Feedback:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="fb"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Reply Feedback:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="rf"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Reply Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="rd"></span></div>
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
    $('#sub').text($(this).closest("tr").find('td:eq(1)').text());
    $('#sd').text($(this).closest("tr").find('td:eq(2)').text());
    $('#fb').text($(this).closest("tr").find('td:eq(4)').text());
    $('#rf').text($(this).closest("tr").find('td:eq(5)').text());
    $('#rd').text($(this).closest("tr").find('td:eq(6)').text());

    $('#myModal').modal('show');

});
</script>
