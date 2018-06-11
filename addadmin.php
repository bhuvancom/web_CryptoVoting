<?php 
include 'dbsele.php';
 ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
  	<link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

      <title>CryptoVOTING</title>

    <!-- Bootstrap -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/overwrite.css">
	<link href="css/animate.min.css" rel="stylesheet">
	

	<link href="css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>	
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
                </div>				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php#header">Home</a></li>
                        <li><a href="index.php#feature">Forms</a></li>
                        <li><a href="index.php#gallery">Recent Result</a></li>
                        <li><a href="index.php#pricing">Admin Dashboard</a></li>
                        <li><a href="index.php#our-team">Team</a></li> 
                        <li><a href="index.php#contact">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
    <div id="pricing">
		<div class="container">
			<div class="text-center">
				<h3>Add Admin</h3>
				<p><b>Control Panel only for admin add carefully<br>
				</b></p>
			</div>
			
			 <div class="text-center">

              <div>
                <div class="text-center" data-wow-offset="0" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">					
						<form class="form-inline" method="POST">
							<div class="form-group">
								<input class="form-control" id="exampleInputName" placeholder="Username" type="text" name="user">							
							</div>
							<div class="form-group">							
								<input class="form-control" id="exampleInputEmail1" placeholder="Password" type="password" name="pass">
							</div>
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Add Admin</button>
							</div>
						</form>					
							
					</div>
                </div>
            </div><!--/pricing-area-->		
		</div>
	</div>
</body></html>
<?php 
if(isset($_POST['submit']))
{
	$uname=md5($_POST['user']);
	$pass=md5($_POST['pass']);
	$qry="INSERT INTO admin (user,password) values ('$uname','$pass')";
	mysql_query($qry) or die("error adding".mysql_error());
	header("Location:index.php#pricing");
}

 ?>