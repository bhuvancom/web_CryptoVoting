    `<?php
session_start();
$_SESSION['user'];
if($_SESSION['user']=="")
{
    session_destroy();
    header("Location:index.php#pricing");
    exit();
}
?>
<?php
include 'dbsele.php';
$sql="select question,id from survey";
$res=mysql_query($sql);
if(isset($_POST['submit']))
{
	$qstnid=$_POST['qstnid'];
    // deleting survey from survey table using value posted by question and their id
	mysql_query("DELETE FROM survey WHERE id =$qstnid")
	or die(mysql_error()); 
    $colm="srvyid".$qstnid;
    // deleting selected column from voters tabel
    $delclm="ALTER TABLE voters DROP COLUMN $colm";
    mysql_query($delclm) or die(mysql_error());

    $delclm2="ALTER TABLE google DROP COLUMN $colm";
    mysql_query($delclm2) or die(mysql_error());	
	header("Location: delsurvey.php");
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3"> Survey</font>
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
                               <font size="3px"color="#0BA9F9">Survey Question &nbsp;</font>
                                 <select name="qstnid" class="form-control">
                                    <?php 
                                     while($row=mysql_fetch_array($res,MYSQL_BOTH))
                                     {
                                     ?>
                                    <option value="<?php echo $row['id'] ; ?>" name="qstnid"><?php echo $row['question'] ; ?>
                                     </option>
                                     <?php
                                     }
                                     ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Delete Survey" />
                            </div>
                        </form>
                    </div>
    </body>
</html>