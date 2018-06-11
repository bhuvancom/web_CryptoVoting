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
$qry="select * from election";
$res=mysql_query($qry);
?>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
    <style type="text/css">
    #main
        {
            height: 250px;
            width:1295px;
            border: 1px solid black;
            margin-left: 25px;
            
        }
    #img
        {
            height: 250px;
            width: 250px;
            border: 1px solid blue;
            float: left;
            
        }
    #info
        {
           height: 250px;
            width: 360px;
            float: left;
        }
    #table
        {
            
        }
    #otherdata
        {
            height: 20px;
            font-size: 20px;
            text-align: left;
        }
    #space
        {
            width: 30px;
            float: left;
            height: 250px;
            margin-left: 40px;
        }
    #canname
        {
            font-size: 35px;
            color: brown;
            height: 35px;
            text-align: center;
        }
    #about
        {
            height:250px;
            width: 300px;
            float: right;
            border: 1px solid yellow;
        }
    #otherimg
        {
            height: 250px;
            width: 300px;
            float: left;
            border: 1px solid red;
        }
    </style> </head>
    <body>
    <?php
         while($row=mysql_fetch_array($res,MYSQL_BOTH))
         { 
        $aadhar=$row['aadhar'];
    ?>
    <div id="main">
        <div id="img">
        <?php $image = $row['canimg'];
$image_src = "img/canimg/$aadhar/".$image;
?>
<img id="img" src='<?php echo $image_src;  ?>' alt="image not found" >
        </div>
        <div id="space"></div>
        <div id="info">
            <table id="table">
            <tr id="canname">
            <td><?php echo $row['name'] ?></td>    
            </tr>
            <tr id="otherdata">
                <td>Father / Husband Name :<?php echo " ".$row['fhname']; ?> </td>
            <tr id="otherdata">
                <td>Mother Name :<?php echo " ".$row['mname']; ?> </td>
            </tr>
            <tr id="otherdata">
                <td>Mobile :<?php echo " +91 ".$row['mob']; ?> </td>
            </tr>
            <tr id="otherdata">
                <td>Email :<?php echo "  ".$row['email']; ?> </td>
            </tr>
            <tr id="otherdata">
                <td>Candidate For Election :<?php echo "  ".$row['elecname']; ?> </td>
            </tr>
            </table>
        </div>
        <div id="otherimg">
        
        </div>
        <div id="about">
        <table>
            <tr id="canname">
            <td> About me</td>
            </tr>
            <tr id="details">
                <td><center><b><?php echo " ".$row['about'] ?></b></center></td>
            </tr>
            </table>
            
        </div>
        </div>
        <br>
        <?php
         }
        ?>
      <center><button class="btn" onclick="window.history.back();">BACK</button></center>
    <style type="text/css">
        .btn{
            height: 70px;
            background-color:#0BA9F9;
            width: 140px;
            font-size: 30px;
            color: white;
        }
    </style>
    </body>
</html>