<?php
session_start();
$aadhar=$_SESSION['aadhar'];
if($_SESSION['aadhar']=="")
{
	session_destroy();
	header("Location:index.php");
    exit();
}
?>
<?php
include 'dbsele.php';
// selecting name for user welcome and id for futher work
$qry="select name,SN  from voters where aadhar = '$aadhar'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res,MYSQL_BOTH);
// storing in variables
$name= $row['name'];
$id=$row['SN'];
?>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
	<title>VOTER DASHBOARD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
</head>
<body><header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="voter_dashboard.php">Crypto<b>VOTING</b></a>voter
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><?php echo "<a href='voterprofile.php?SN=$id'>"?>My Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>                       
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header><!--/header-->
    <div class="container">
        <div class="gaps"></div>
            <div class="row">
                <div class="text-center">
                    <h3 padding-top="330px"><?php echo "Welcome $name" ;?></h3>
                    <p>Choose from below forms to Continue  </p>
                </div>
                <div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                            <?php echo "<a href='elec_vote.php?SN=$id'>"?><i class="fa fa-laptop"></i></a>              
                            <h2>Election</h2>
                            <p>Click here to Vote for Election </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                         <?php echo "<a href='votepoll.php?SN=$id'>" ?><i class="fa fa-heart-o"></i></a>
                            <h2>Poll</h2>
                            <p>Click here for Poll Voting</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                       <?php echo "<a href='surveyvote.php?SN=$id'>" ?> <i class="fa fa-cloud"></i></a>
                            <h2>Survey</h2>
                            <p>Click here for Surveys</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
                    <div class="text-center">
                        <div class="hi-icon-wrap hi-icon-effect">
                        <a href="addother.php"><i class="fa fa-camera"></i></a>
                            <h2>Others</h2>
                            <p>Click for other type of Election</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
<style type="text/css">
    .gaps{
        height: 50px;
        width: 100%;
        border:0px ;
        padding-top: 90px;
    }
</style>
</html>
