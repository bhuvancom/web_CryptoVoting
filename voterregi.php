<html>
<head> 
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
<title>CV Voter registratation</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />

    <script>
        function formValid()
        {
             if(document.regform.name.value == '') {
                    alert("please enter name !!");
                    document.regform.name.focus();
                    return false;
                } 
            if(document.regform.fhname.value=='')
                {
                    alert("please enter Father/Husband Name !!");
                    document.regform.fhname.focus();
                    return false;
                } 
             if(document.regform.mname.value=='')
                {
                    alert("please enter Mother Name !!");
                    document.regform.mname.focus();
                    return false;
                } 
             if(document.regform.dob.value=='')
                {
                    alert("please enter Date of Birth !!");
                    document.regform.dob.focus();
                    return false;
                } 
             if(document.regform.aadhar.value=='')
                {
                    alert("please enter Aadhar Number !!");
                    document.regform.aadhar.focus();
                    return false;
                } 
             if(document.regform.email.value=='')
                {
                    alert("please enter E-mail !!");
                    document.regform.email.focus();
                    return false;
                } 
             if(document.regform.pass.value=='')
                {
                    alert("please enter Password !!");
                    document.regform.pass.focus();
                    return false;
                } 
             if(document.regform.mob.value=='')
                {
                    alert("please enter Mobile Number !!");
                    document.regform.mob.focus();
                    return false;
                } 
             if(document.regform.gender.value=='')
                {
                    alert("please Select Gender !!");
                    document.regform.gender.focus();
                    return false;
                } 
            }
        
    </script>
<style>
    </style>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3"> Registration</font>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php#header">Home</a></li>
                                                
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header><!--/header--> 
    <div class="slider">        
        <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="item active">                       
                        <img src="img/4.jpg" class="img-responsive" alt="no img">
                        <div class="carousel-caption">
                            

                        
             <div>
                <div class="text-center" data-wow-offset="0" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">                   
                        <form class="form-inline" method="POST" onsubmit="return (formValid())">
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Full Name" type="text" name="name">                           
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Father/Husband Name" type="text" name="fhname">                           
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Mother Name" type="text" name="mname"> 
                            </div><br><br>
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Date of Birth" type="Date" name="dob"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Aadhar Number" maxlength="12" pattern="\d{12}" title="Please enter exactly 12 digits" name="aadhar" > 
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Email id*" type="Email" name="email"> 
                            </div><br><br>
                            <div class="form-group">                            
                                <input class="form-control" id="exampleInputEmail1" placeholder="Password" type="password" name="pass">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="Mobile Number" type="text" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" name="mob"> 
                            </div>
                            <div class="form-group">
                            <select class="form-control" name="gender">
                                    <option name="gender" value="male">Male</option>
                                    <option name="gender" value="fmale">Female</option>
                                    <option name="gender" value="other">Other</option>
                            </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary btn-lg" required="required" value="Register"></input>
                            </div>
                        </form> 

                            
                    </div>
                </div>
            </div>
                                    
                                    </div></span></div></div></div></div></div></div></div>
   
        

</body>
</html>
<?php
if (isset($_POST['submit'])) 
{
    include 'dbsele.php';
    $name=$_POST['name'];
    $pass=md5($_POST['pass']);
    $aadhar=$_POST['aadhar'];
    $email=$_POST['email'];
    $mob=$_POST['mob'];
    $fname=$_POST['fhname'];
    $mname=$_POST['mname'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $dob=$_POST['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
    $currentage=$diff->format('%y');
    $currtage=(int)$currentage;
    if($currtage<18)
    {
                $ms1g="VOTER AGE CAN'T BE LESS THAN 18, age is $currtage";
              ?>
        <script type="text/javascript">
        alert("<?php echo $ms1g; ?>");
        window.location='index.php';
        </script>
    <?php 
    exit();
    }
    /* to view in dd/mm/yy
    list($day,$mon,$year) = explode('-', $dob);
    echo "<br>".$launch_date = "$year-$mon-$day"; */
    else
    {
        $chkdata="SELECT SN FROM voters WHERE aadhar='$aadhar'";
        $result=mysql_query($chkdata);
        $rslt=mysql_num_rows($result);
        if($rslt>0)
        {
            echo "data already saved";
                            $msg="EXISTING DATA FOUND PLEASE LOGIN!";
                            echo "<script type='text/javascript'>alert('$msg');";
                            echo "window.location='voterlgn.php'";
                            echo "</script>";

            ?>

            <a href='voterlgn.php'>Click here to login into your account</a></body></html>
        <?php
        }
        else 
        {
          ?>  <html>
        <head></head>
        <body>
        <?php
        $query1="INSERT into voters (name,dob,password,gender,aadhar,fatherhusbname,mothername,mobile,email) values ('$name','$dob','$pass','$gender','$aadhar','$fname','$mname','$mob','$email')";
        $result1=mysql_query($query1) or die("ERROR ADDING");
        $msg2="DATA SAVED PLEASE LOGIN!";
                            echo "<script type='text/javascript'>alert('$msg2');";
                            echo "window.location='voterlgn.php'";
                            echo "</script>";
            
            ?>

        <html>
        <head></head>
            <body>
            <div id="btn">
                <button id="btn1" onclick="parent.location='voterlgn.php'">Records saved Click to login</button>
                </div>
            </body>
        </html>
        <?php 
        } 

    }
}
?>