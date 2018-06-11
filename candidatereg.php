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
    // getting election list from db
    $sql="select * from elections";
    $res=mysql_query($sql);
    ?>
    <html>
    <head> 
        <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
    <title>CV Candidate registratation</title>
    <style type="text/css">
        .imgscan{
            height: 25px;
            width: 1200px;
            border: 0px solid black;
            padding-right: 250px;
        }
        .scanned{
            font-size: 10px;
            height: 25px;
            width: 300px;
            border: 0px;
            float: right;
            padding-left:60px; 
        }
    </style>
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
             if(document.regform.elcnm.value=='')
                {
                    alert("please Select Election Name !!");
                    document.regform.elcnm.focus();
                    return false;
                } 
             if(document.regform.imgcandi.value=='')
                {
                    alert("Upload Scanned Candidate Image !!");
                    document.regform.imgcandi.focus();
                    return false;
                } 
             if(document.regform.heimg.value=='')
                {
                    alert("Upload Scanned Heigher Education !!");
                    document.regform.heimg.focus();
                    return false;
                } 
             if(document.regform.policevery.value=='')
                {
                    alert("Upload Scanned Police varification !!");
                    document.regform.policevery.focus();
                    return false;
                } 
            if(document.regform.about.value=='')
                {
                    alert("Fill About You !!");
                    document.regform.about.focus();
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
                            <li class="active"><a href="admin_dashboard.php">Home</a></li>
                                                    
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
                            <form class="form-inline" name="regform" action="regcand.php" method="POST" enctype="multipart/form-data" onsubmit="return (formValid())">
                                <div class="form-group">
                                    <input class="form-control" id="exampleInputName" placeholder="Full Name" type="text" name="name">                           
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="exampleInputName" placeholder="Father/Husband Name" type="text" name="fhname">                           
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="exampleInputName" placeholder="Mother Name" type="text" name="mname"> 
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="exampleInputName" placeholder="Date of Birth" type="Date" name="dob"> 
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="exampleInputName" placeholder="Aadhar Number" maxlength="12" pattern="\d{12}" title="Please enter exactly 12 digits" name="aadhar"> 
                                </div><br><br>
                                <div class="form-group">                            
                                    <input class="form-control" id="exampleInputName" placeholder="E-mail" type="E-mail" name="email">
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
                                <div class="form-group">
                                   <font size="3px"color="white"> Election Name &nbsp;</font>
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
                                </div><br><br>
                                <div class="imgscan"> 

                                   <div class="form-control">Scanned Candidate Image&nbsp;&nbsp;<input class="scanned" type="file" name="imgcandi"></div><br>
                                   <div class="form-control">Scanned Heigher Education <input class="scanned" type="file" name="heimg"></div><br>
                                   <div class="form-control">Scanned Police varification &nbsp;<input class="scanned" type="file" name="policevery"></div>
                                </div>

                                <br><br><br><br>                     
                                <textarea class="form-control" cols="50" rows="1" placeholder="about you" name="about"></textarea>
                                <div class="text-center">
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg" required="required" value="Add Candidate" />
                                </div>
                            </form> 

                                
                        </div>
                    </div>
                </div>
                        </div></div></div></div></div>
       
            

    </body>
    </html>