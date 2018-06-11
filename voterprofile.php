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
$result =mysql_query("select * from voters where SN =$id");
$test = mysql_fetch_array($result,MYSQL_BOTH);
// fetching data from database
$name=$test['name'];
$pass=$test['password'];
// $addhar=$test['aadhar'];
$email=$test['email'];
$mob=$test['mobile'];
$fname=$test['fatherhusbname'];
$mname=$test['mothername'];
$gender=$test['gender'];
$dob=$test['dob'];
if(isset($_POST['save']))
{
	// updated data after update button clicked
$name1=$_POST['name'];
$pascry=$_POST['pass'];
$pass1=md5('$pascry');
// $addhar1=$_POST['aadhar'];
$emaila=$_POST['email'];
$mobile=$_POST['mob'];
$fname1=$_POST['fhname'];
$mname1=$_POST['mname'];
$gender1=$_POST['gender'];
$dob1=$_POST['dob'];
mysql_query("UPDATE voters SET name='$name1',dob='$dob1',password='$pass1',gender='$gender1',fatherhusbname='$fname1',mothername='$mname1',mobile='$mobile',email='$emaila' WHERE SN = $id ") or die(mysql_error());
	header("Location:voter_dashboard.php");
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
	<title>Voter profile</title>
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
                        <li class="active"><a href="voter_dashboard.php">Home</a></li>
                        <li><?php echo "<a href='voterprofile.php?SN=$id'>"?>My Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>                       
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div class="gaps"></div>
    <div class="innerinfo">
    	<div class="leftrow">
    		<div class="text-center">
			<table class="table1">
			<form class="form-inline" method="POST">
				<tr>
					<td class="rows">Name</td>
					<td class="rows">
						<div class="form-group">
                                <input class="form-control" id="exampleInputName" type="text" value="<?php echo $name  ?>" name="name">                           
                            </div>
					</td>
				</tr>
				<tr class="rows">
					<td>Father / Husband Name</td>
					<td><div class="form-group">
                                <input class="form-control" id="exampleInputName" value="<?php echo $fname ; ?>" type="text" name="fhname"></div></td>
				</tr>
				<tr>
					<td>Mother Name</td>
					<td><div class="form-group">
                                <input class="form-control" id="exampleInputName" value="<?php echo $mname ?>" type="text" name="mname"> 
                            </div></td>
				</tr>
				<tr>
					<td>Date of birth</td>
					<td><div class="form-group">
                                <input class="form-control" id="exampleInputName" value="<?php echo $dob  ?>" type="Date" name="dob"> 
                            </div></td>
				</tr>
				<!-- <tr>
					<td>Aadhar Number</td>
					<td><div class="form-group">
                                <input class="form-control" id="exampleInputName" value="<?php  $aadhar  ?>" maxlength="12" pattern="\d{12}" title="Please enter exactly 12 digits" name="aadhar" ></td>
				</tr> -->
				<tr>
					<td>Email id</td>
					<td><div class="form-group">
                                <input class="form-control" id="exampleInputName" value="<?php echo $email  ?>" type="Email" name="email"> 
                            </div></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><div class="form-group">                            
                                <input class="form-control" id="exampleInputEmail1" type="password" name="pass">
                            </div></td>
				</tr>
				<tr>
					<td>Mobile Number</td>
					<td><div class="form-group">
                                <input class="form-control" id="exampleInputName" value="<?php echo $mob  ?>" type="text" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" name="mob"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><div class="form-group">
                            <select class="form-control" name="gender">
                                    <option name="gender" value="male">Male</option>
                                    <option name="gender" value="fmale">Female</option>
                                    <option name="gender" value="other">Other</option>
                            </select>
                            </div></td>
				</tr>
				<tr>
					
					<td colspan="2"><div class="text-center">
                                <input type="submit" name="save" class="btn btn-primary btn-lg" value="Update data"></input>
                            </div></td>
				</tr>
			</form>
					<td colspan="2"><div class="text-center">
					<button name="submit" class="btn btn-primary btn-lg" onclick="goback()">GO BACK</button></div>
					<script type="text/javascript">
						function goback() {
							window.history.back();
						}
					</script>
									
				</div>
				</td>		
			</table>
				</div>
    	</div>
    	
    	<div class="">
    </div>

</body>
<style type="text/css">
	
</style>
</html>