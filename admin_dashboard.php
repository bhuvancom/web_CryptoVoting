<?php
session_start();
$_SESSION['user'];
if($_SESSION['user']=="")
{
	session_destroy();
	header("Location:index.php#pricing");
    exit();
}
?>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
	<title>ADMIN DASHBOARD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    

    <link href="css/style.css" rel="stylesheet" />
</head>
<!-- <div class="gaps"></div> -->
    <header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Crypto<b>ADMIN</b></a>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        
                    
                        <li><a href="view_result.php">View Election</a></li>
                        <!-- <li><a href="result.php">Election Result</a></li>  -->
                        <li><a href="end_election.php">End Election</a></li>
                        <li><a href="candidatereg.php">Add candidate</a></li>
                        <li><a href="logout.php">Logout</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div id="feature">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h3>Forms</h3>
                    <p>Choose from given forms to continue </p>
                </div>
                <div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                            <a href="add_ele.php#feature1"><i class="fa fa-laptop"></i></a>              
                            <h2>Add Election</h2>
                            <p>This form available for any type of Election </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                            <a href="addpoll.php"><i class="fa fa-heart-o"></i></a>
                            <h2>Add Poll</h2>
                            <p>This form available for any type of Poll Voting</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                        <a href="addsurvey.php"><i class="fa fa-cloud"></i></a>
                            <h2>Add Survey</h2>
                            <p>This form available for any type of Survey</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                        <a href="addother.php"><i class="fa fa-camera"></i></a>
                            <h2>Others</h2>
                            <p>This form available for other type of Election</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>