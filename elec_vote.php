<?php
session_start();
$aadhar=$_SESSION['aadhar'];
if($_SESSION['aadhar']=="")
{
	session_destroy();
	header("Location:index.php");
    exit();
}
include 'dbsele.php';
$id =$_REQUEST['SN'];
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>voter
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="voter_dashboard.php?SN=<?php echo $id ?>">Home</a></li> 
                        <li><a href="viewcand.php">View Candidates</a></li> 
                        <li><a href="logout.php">Logout</a></li>                       
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <!--/header-->
    <div class="gaps"></div>
    <div class="innerinfo">
        <?php
include 'dbsele.php';
$sql="select name from elections";
$res=mysql_query($sql);
?>  <div class="gaps"></div>
    <div class="text-center">
    <form class="form-inline" method="POST" action="voteelec.php?SN=<?php echo $id ?>">
                        <div class="form-group">
                               <font size="3px"color="#0BA9F9"> Election Name &nbsp;</font>
                                 <select name="elecnm" class="form-control">
                                    <?php 
                                     while($row=mysql_fetch_array($res,MYSQL_BOTH))
                                     {
                                     ?>
                                    <option value="<?php echo $row['name'] ; ?>" name="elecnm"><?php echo $row['name'] ; ?>
                                     </option>
                                     <?php
                                     }
                                     ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Select Election And Continue" />
                            </div>
                        </form>
                    </div>
    </body>
</html>
