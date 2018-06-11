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
<?php
include 'dbsele.php';
if(isset($_POST['submit']))
{ 
	$ques=$_POST['question'];
	$op1=$_POST['op1'];
	$op2=$_POST['op2'];
	$op3=$_POST['op3'];
	$op4=$_POST['op4'];
	$qry="INSERT INTO survey (question,option1,option2,option3,option4) values ('$ques','$op1','$op2','$op3','$op4')";
	mysql_query($qry) or die(mysql_error());
    // getting survey id of recent added survey
    $resqry="SELECT id FROM survey WHERE question='$ques'";
    $resu=mysql_query($resqry);
    $surid=mysql_fetch_array($resu,MYSQL_BOTH);
    // storing survey id
    $survid=$surid['id'];
    $colm="srvyid".$survid;
    // inserting into survey result table for makin survey system
    $qry8="ALTER TABLE voters ADD $colm VARCHAR(10)";
    mysql_query($qry8) or die(mysql_error());
    
    $qry18="ALTER TABLE google ADD $colm VARCHAR(10)";
    mysql_query($qry18) or die(mysql_error());
	header("Location:addsurvey.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
	<title>ADD POLLS</title>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3">Add Survey</font>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="admin_dashboard.php">Home</a></li>
                        <li class="active"><a href="surveyresult.php">View survey Result</a></li>
                        <li class="active"><a href="delsurvey.php">Delete surveys</a></li>
                                                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div class="gaps"></div>
    <div class="innerinfo">
    	<div class="leftrow">
    		<div class="gaps"></div>
    		<div class="text-center" data-wow-offset="0" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
    			<form class="form-inline" name="regform" method="POST" onsubmit="return (sbmt())">	
													
							<textarea class="form-control" rows="1" cols="60" placeholder="Write Opinion Here" name="question"></textarea><br><br><br>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Option one" name="op1">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Option two" name="op2">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Option three" name="op3">
							</div>	
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Option four" name="op4">
							</div>	<br><br>					
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Survey</button>
							</div>
						</form>
    	 </div>

    	</div>
    </div>

</body>
<script type="text/javascript">
    function sbmt() {
                        
                    if(document.regform.question.value=='')
                        {
                            alert("Fill Question !!");
                            document.regform.question.focus();
                            return false;
                        } 
                     if(document.regform.op1.value=='')
                        {
                            alert("Fill option No.1!!");
                            document.regform.op1.focus();
                            return false;
                        } 
                    if(document.regform.op2.value=='')
                        {
                            alert("Fill option No.2!!");
                            document.regform.op2.focus();
                            return false;
                        } 
                     if(document.regform.op3.value=='')
                        {
                            alert("Fill option No.3!!");
                            document.regform.op3.focus();
                            return false;
                        } 
                     if(document.regform.op4.value=='')
                        {
                            alert("Fill option No.4!!");
                            document.regform.op4.focus();
                            return false;
                        }
        alert("CLICK OK TO SUBMIT");
        // body...
    }
</script>

</html>