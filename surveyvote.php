<?php
session_start();
$_SESSION['aadhar'];
$id=$_REQUEST['SN'];
include 'dbsele.php';
if($_SESSION['aadhar']=="")
{
	session_destroy();
	header("Location:index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
	<title>SURVEY</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/new1.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" />
    <style type="text/css">
    	.innerin{
        height:1000px ;
        width: 100%;
        border: 20px solid #0BA9F9;
    }
    	}
    </style>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>Survey
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="voter_dashboard.php?SN=<?php echo $id ?>">Home</a></li> 
                        <li><a href="logout.php">Logout</a></li>                       
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header>
    <div class="innerinfo1">
    	<div class="gaps"></div>
    	<div class="srvyarea">
            <?php
                $qry1="SELECT * FROM survey";
                $qry1rslt=mysql_query($qry1);
                // count returned rows
                $qry1rows=mysql_num_rows($qry1rslt);
                if($qry1rows<=0){
                     $msg2="Survey not found";
                echo "<script type='text/javascript'>alert('$msg2');";
                echo "window.location='voter_dashboard.php'";
                echo "</script>";
                }
                //Creating array to hold all the returned ques id,questions,option1,option2,option3,option4 
                $quesidar=array();
                $questArray=array();
                $option1ar=array();
                $option2ar=array();
                $option3ar=array();
                $option4ar=array();
                //Adding values  from the result to  arrays
                while($row=mysql_fetch_assoc($qry1rslt)){
                    $quesidar[]=$row['id'];
                    $questArray[]=$row['question'];
                    $option1ar[]=$row['option1'];
                    $option2ar[]=$row['option2'];
                    $option3ar[]=$row['option3'];
                    $option4ar[]=$row['option4'];
                }
                // checking values
               //initializing i to 0 for creating array index
                $i=0;
                // while($i<$qry1rows){
                //     echo $questArray[$i]."<br><br>";
                //     echo $option1ar[$i]."<br><br>";
                //     echo $option2ar[$i]."<br><br>";
                //     echo $option3ar[$i]."<br><br>";
                //     echo $option4ar[$i]."<br><br>";
                //     $i++;
                // }
             ?>
             <script type="text/javascript">
                 function survy() {
                     // body...
                    alert("CLICK OK to Submit");
                 }
             </script>
             <form action="" method="POST" onsubmit="return(survy())">
             <?php 
             while($i<$qry1rows)
             {
               // echo  $quesidar[$i];
              ?>
    		<div class="srvydata">
    			<div class="name1">
                    <?php /* here name of input for quest is question id and all option are its  various values any option can be selected but for one ques id only one id will be selected*/ ?>
    				<h2><br><?php echo $questArray[$i]; ?></h2>
    			</div><br><br>
    			<div class="optns"><input type="radio" name="<?php echo $quesidar[$i]?>" value="<?php echo $option1ar[$i]; ?>" checked/><label class="lable"><?php echo "".$option1ar[$i]; ?></label></div>

                <div class="optns"><input type="radio" name="<?php echo $quesidar[$i]?>" value="<?php echo $option2ar[$i]; ?>"><label class="lable"><?php echo "".$option2ar[$i]; ?></label></div>

                <div class="optns"><input type="radio" name="<?php echo $quesidar[$i]?>" value="<?php echo $option3ar[$i]; ?>"><label class="lable"><?php echo "".$option3ar[$i]; ?></label></div>

                <div class="optns"><input type="radio" name="<?php echo $quesidar[$i]?>" value="<?php echo $option4ar[$i]; ?>"><label class="lable"><?php echo "".$option4ar[$i]; ?></label></div>
            </div>
    		<hr><br>
            <?php $i++ ; } ?>
    		<div class="srvysbmt">
    			<div>
                   <input type="submit" name="submit" class="btn btn-primary btn-lg" value="SUBMIT" />
                     </div></div>
                 <br>
             </div>
         </form>
          </div>
    </body></html>
    <?php 
    
     ?>

    <?php 
    if(isset($_POST['submit']))
    {
        $j=0;
        
        while ($j<$qry1rows) {
           $option=$_POST[$quesidar[$j]];
           $quesid=$quesidar[$j];
           // selecting row who is voting by their SN
           $srvyqry="SELECT srvyid$quesidar[$j] FROM voters WHERE  SN=$id";
           $srvyres=mysql_query($srvyqry) or die(mysql_error());
           $srvyrow=mysql_fetch_array($srvyres,MYSQL_BOTH);
           $srvyz=$srvyrow["srvyid$quesidar[$j]"];
           // checking if the voter has already voted or not
           if($srvyz=='')
           {
            // if not voted then update data to database
            // update voter table and entrying option 
                $qrysr1="UPDATE voters SET srvyid$quesidar[$j]='$option' WHERE SN=$id";
                mysql_query($qrysr1) or die (mysql_error());
                // nested if-else for checking option given by voter to update its vote count
                if($option==$option1ar[$j])
                {
                    $qryop1="UPDATE survey SET vote1=vote1+1 WHERE id=$quesid";
                    mysql_query($qryop1) or die(mysql_error());
                }

                elseif($option==$option2ar[$j])
                {
                    $qryop1="UPDATE survey SET vote2=vote2+1 WHERE id=$quesid";
                    mysql_query($qryop1) or die(mysql_error());
                }

                elseif($option==$option3ar[$j])
                {
                    $qryop1="UPDATE survey SET vote3=vote3+1 WHERE id=$quesid";
                    mysql_query($qryop1) or die(mysql_error());
                }

                else
                {
                    $qryop1="UPDATE survey SET vote4=vote4+1 WHERE id=$quesid";
                    mysql_query($qryop1) or die(mysql_error());
                }

            }
            // if voter already voted then warning and returning to dashboard
        else
            {
                $msg2="You Have Alredy Voted";
                echo "<script type='text/javascript'>alert('$msg2');";
                echo "window.location='voter_dashboard.php'";
                echo "</script>";
             }




           $j++;
        
        }

    }


     ?>