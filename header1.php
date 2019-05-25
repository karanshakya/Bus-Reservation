<nav class="navbar " role="navigation" style="background-color: red; 
    background-image: linear-gradient(to right, #999966, #f5f5f0, #666633); ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <center><h2><strong>ONLINE FOOD ORDER SYSTEM</strong></h2></center>

            
            <br> <p style="margin-left:10px"><strong><?php date_default_timezone_set("Asia/Kolkata");
echo date("d F, Y") ;  ?></strong></p>
<!-- ("d F, Y - ") . ' ' . date("h:i A") . ' IST' -->
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <b></b> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li><br/>
                        <li><a href="#"><i class="fa fa-cog"></i> Change Password</a></li>

                    </ul>
                </li> -->
                <!-- <li>
        <a href="login.php"><img src="Images/image4.png" width="60" height="60"> </a>
                </li> -->
                <li>
                    <a href="login.php" style="color:#ffb31a">
                        <i class="fa fa-sign-in"></i><strong> Sign In </strong>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




