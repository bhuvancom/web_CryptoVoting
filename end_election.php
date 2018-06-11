<?php
include 'dbsele.php';
$sql="select * from elections";
$res=mysql_query($sql);
if(isset($_POST['submit']))
{
	$name=$_POST['elcnm'];
    // delete election from database
	mysql_query("DELETE FROM elections WHERE name = '$name'")
	or die(mysql_error());
    // delete election named column from voters table
    mysql_query("ALTER TABLE  voters DROP COLUMN $name"); 

    mysql_query("ALTER TABLE  google DROP COLUMN $name"); 
	
	header("Location: admin_dashboard.php");
    exit();
}
?><html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
	<link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
</head>
    <body>
    	<div class="gaps"></div>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3"> Registration</font>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="admin_dashboard.php">Home</a></li>
                                                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div class="text-center">
    <form class="form-inline" method="POST">
    					<div class="form-group">
                               <font size="3px"color="#0BA9F9"> Election Name &nbsp;</font>
                                 <select name="elcnm" class="form-control">
                                    <?php 
                                     while($row=mysql_fetch_array($res,MYSQL_BOTH))
                                     {
                                     ?>
                                    <option value="<?php echo $row['name'] ; ?>" name="elcnm"><?php echo $row['name'] ; ?>
                                     </option>
                                     <?php
                                     }
                                     ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Delete Election" />
                            </div>
                        </form>
                    </div>
    </body>
</html>