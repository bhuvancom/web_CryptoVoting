<?php 
// requiring config file to check access token
    require_once 'google/config.php';
    // checking if any access token is availble in session array
    if(isset($_SESSION['access_token']))
{
    header("Location:voter_dashboard.php");
    exit();
}
// creating authUrl to access google server
    $loginURL= $gClient->createAuthUrl();


 ?>
<?php
if(isset($_POST['submit']))
{
    include 'dbsele.php';
?>
<?php
session_start();
$username=($_POST['aadhar']);
$password=md5($_POST['pass']);
$query="SELECT * FROM voters where aadhar='$username' AND password='$password'";
$res=mysql_query($query);
if($row= mysql_fetch_array($res,MYSQL_BOTH))
    {
         $_SESSION['aadhar']=$username;
        header("Location:voter_dashboard.php");
        exit();
    }
else
    {

        header("Location:voterlgn.php");
        exit();
    }
}
?>
<html>
    <head>
        <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
        <title>login as Voter</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
    
    
    </head>
    <body bgcolor="#135355">
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>
                </div> Voter             
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>                      
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
        <div id="pricing">
        <div class="container">
            <div class="text-center">
                <h3>Voter Login</h3>
            </div><br>
            
             <div class="text-center">

              <div>
                <div class="text-center" data-wow-offset="0" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">                   
                        <form class="form-inline" method="POST">
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Enter aadhar number" type="text" name="aadhar" maxlength="12" pattern="\d{12}" title="Please enter exactly 12 digits">                           
                            </div>
                            <div class="form-group">                            
                                <input class="form-control" id="exampleInputEmail1" placeholder="Password" type="password" name="pass">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Voter Login</button><br/>
                            <button type="button" class="btn btn-primary btn-lg" onclick="parent.location='voterregi.php'">Register</button>
                            </div>
                        </form>
                        <h4>Or Login Using </h4>
                        <a href="<?php echo $loginURL ?>"><img src="img/gplus.png"></a>                 
                            
                    </div>
                </div>
            </div><!--/pricing-area-->      
        </div>
    </div>
    </body>
</html>
