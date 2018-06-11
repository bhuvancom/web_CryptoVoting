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
$qry="SELECT * from election  ORDER BY votecount DESC";
$res=mysql_query($qry) or die(mysql_error());
?>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
    <style type="text/css">
    #main
        {
            height: 250px;
            width:1310px;
            border: 1px solid black;
            margin-left: 0px;
            
        }
    .innerinfo{
        height:auto; ;
        width: 100%;
        border: 20px solid #0BA9F9;
    }
    .gaps{
        height: 50px;
        width: 100%;
        border:0px ;
        padding-top: 90px;
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
    </style> </head>
    <body>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>&nbsp;&nbsp;<font size="3"> Result</font>
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><button onclick="return (back())">Home</button></li>

                                                
                    </ul>
                    <script type="text/javascript">
                        function back() {
                            // body...
                            window.history.back();
                        }
                    </script>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
        <div class="innerinfo">
    <?php
    $numrow=mysql_num_rows($res);
    if($numrow==0)
            {
                //this means no election
                $msg="THERE IS NO ELECTION WITH CANDIDATE CURRENTLY,PLEASE ADD !";
                echo "<script type='text/javascript'> alert('$msg');";
                echo "window.location='candidatereg.php'";
                echo "</script>";
                exit();


            }
    // getting candidates records
         while($row=mysql_fetch_array($res,MYSQL_BOTH))
         { 
            // adhar of candidate
        $aadhar=$row['aadhar'];
    ?>
    <div id="main">
        <div id="img">
        <?php 
        // getting image file name from database
        $image = $row['canimg'];
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
                <td>votes : <?php echo $row['votecount'] ;?> </td>
            </tr>
            <tr id="otherdata">
                <td>Candidate For Election :<?php echo "  ".$row['elecname']; ?> </td>
            </tr>
            </table>
        </div>
        </div>
        <br>
        <?php
         }
        ?>
    </div>
    </body>
</html>