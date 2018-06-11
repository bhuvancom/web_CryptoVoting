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
// checking if any poll is there in database
$qrychk1="SELECT id FROM poll";
$chk1=mysql_query($qrychk1);
$row1=mysql_fetch_array($chk1,MYSQL_BOTH);
// if no any poll found run the page otherwise give alert
if(!$row1)
    {
        if(isset($_POST['submit']))
            {
            	$ques=$_POST['question'];
            	$op1=$_POST['op1'];
            	$op2=$_POST['op2'];
            	$op3=$_POST['op3'];
            	$op4=$_POST['op4'];
                $qrychk="SELECT id FROM poll";
                $chk=mysql_query($qrychk);
                $row=mysql_fetch_array($chk,MYSQL_BOTH);
                if(!$row)
                    {
                        $qry="INSERT INTO poll (question,option1,option2,option3,option4) values ('$ques','$op1','$op2','$op3','$op4')";
                    mysql_query($qry) or die(mysql_error());
                    //fetching id of inserted poll
                    $qry2="SELECT id FROM poll WHERE question='$ques'";
                    $resul=mysql_query($qry2);
                    $row2=mysql_fetch_array($resul,MYSQL_BOTH);
                    // storing poll id 
                    $pollid="poll".$row2['id'];
                    //adding pollid column in voters table
                    $qry4="ALTER TABLE voters ADD $pollid VARCHAR(200)";
                    mysql_query($qry4);
                    $qry14="ALTER TABLE google ADD $pollid VARCHAR(200)";
                    mysql_query($qry14);
                    header("Location:addpoll.php");
                    exit();
                    }
        //alert if poll exist
        else
            {
                
                //error a poll already exist
                    $msg="EXISTING POLL FOUND DELETE IT FIRST!";
                    echo "<script type='text/javascript'>alert('$msg');";
                    echo "window.location='admin_dashboard.php'";
                    echo "</script>";

            }
        }
    }
    // alerting that there is a poll in db
else
    {
        $msg="POLL Created , DELETE IT FIRST TO ADD NEW";
        echo "<script type='text/javascript'>alert('$msg');";
        echo "</script>";


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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3">Add Poll</font>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="admin_dashboard.php">Home</a></li>
                        <li class="active"><button class="btn3" onclick="return(delet())">Delete Poll</button></li>                        
                    </ul>
                    <script type="text/javascript">
                        function delet() {
                            // body...
                            
                            alert("Delete POLL!");
                         window.location='delpoll.php';
                        }
                    </script>
                    <style type="text/css">
                        .btn3{
                            background-color: #111;
                            color: #fff;
                            height: 35px;
                            width: 100px;
                            border: 0px solid;
                        }
                    </style>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div class="gaps"></div>
    <div class="innerinfo">
    	<div class="leftrow">
    		<div class="gaps"></div>
    		<div class="text-center" data-wow-offset="0" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
    			<form class="form-inline" method="POST" onsubmit="return(formvalid())" name="regform">	
													
							<textarea class="form-control" rows="1" cols="60" placeholder="Write Question here" name="question"></textarea><br><br><br>
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
								<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit Poll">
							</div>
						</form>
    	 </div>

    	</div>
    </div>

</body>
<script type="text/javascript">
    function formvalid()
            {
                        
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
            }
</script>
</html>
