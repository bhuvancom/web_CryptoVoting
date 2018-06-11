<?php
session_start();
$_SESSION['user'];
if($_SESSION['user']=="")
{
    session_destroy();
    header("Location:index.php#pricing");
    exit();
}
include 'dbsele.php';
$qry="select * from survey";
$res=mysql_query($qry);
?>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
 </head>
    <body>
        <div class="gaps"></div>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3"> Result</font>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="admin_dashboard.php">Home</a></li>
                                                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div class="innerinfo1">
            <?php
         while($row=mysql_fetch_array($res,MYSQL_BOTH))
         { 
            //looping to create an area with question name and option along with number of people opted 
        ?>
            <div class="mainarea">
            <div class="name1">
                <h2><?php echo $row['question'] ;?></h2>
            </div>
            <div class="optn">
                <font><?php echo $row['option1']; ?></font>
                <div class="vote">Selected By <?php echo $row['vote1']."  People" ;?></div>
                
            </div>
            <div class="optn">
                <font><?php echo $row['option2']; ?></font>
                <div class="vote">Selected By <?php echo $row['vote2']."  People" ;?></div>
            </div>
            <div class="optn">
                <font><?php echo $row['option3']; ?></font>
                <div class="vote">Selected By <?php echo $row['vote3']."  People" ;?></div>
                
            </div>
            <div class="optn">
                <font><?php echo $row['option4']; ?></font>
                <div class="vote">Selected By <?php echo $row['vote4']."  People" ;?></div>
                
            </div>
        </div><br>
            <?php
             }
              ?>                    
                        
                        
         </div>

        </div>
    </div>
    </body>
</html>