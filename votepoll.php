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
?>
<?php
// storing poll id posted from pollvote.php
//$pollid=$_POST['pollid'];
// getting voter id
$id=$_REQUEST['SN'];
// fetching answer andoptions from poll by using id
$qry="SELECT question,option1,option2,option3,option4 FROM poll WHERE id=1";
$res=mysql_query($qry);
$row=mysql_fetch_array($res,MYSQL_BOTH);
if(!$row)
{
            $msg3="NO POLL TO VOTE,TRY AFTER SOME TIME";
            echo "<script type='text/javascript'>alert('$msg3');";
            echo "window.location='voter_dashboard.php'";
            echo "</script>";  
}
$quest=$row['question'];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
	<title>POLLING</title>
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
                    <a class="navbar-brand" href="index.php">Crypto<b>VOTING</b></a>voter
                </div>              
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="voter_dashboard.php?SN=<?php echo $id ?>">Home</a></li> 
                        <li><a href="logout.php">Logout</a></li>                       
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->       
    </header><!--/header-->
    <div class="innerin">
    	<div class="gaps"></div>
    	<div class="leftrow2">
    		<div class="row">
                <div class="text-center">
                    <h3 padding-top="330px"><?php echo $quest."<br><br>" ;?></h3>
    		</div ></div>
    		<script type="text/javascript">
    			function formvalid() {

    						if(document.forms.pollto.value=='')
    						{
    							alert("PLEASE! MAKE A CHOICE");
    							return false;
    						}
                            else
                                window.location=voter_dashboard.php;
    			}
    		</script>
            <?php
                //fetching vote counts to show on 
                   $votecount="SELECT vote1,vote2,vote3,vote4,sum from poll WHERE id=1";
                    $voteres=mysql_query($votecount);
                   $data=mysql_fetch_array($voteres,MYSQL_BOTH);
                   if($data['sum']==0)
                        $data['sum']=1;
                   $percnt=100/$data['sum'];
                   ?>
            
        <div class="pollform">
            <div class="pollarea">
    		<form  method="POST" name="forms" onsubmit="return(formvalid())">
    				<div class="wrap"><input type="radio" name="pollto" value="<?php echo $row['option1'] ?>" checked/>
    				<label class="lable"><?php echo $row['option1'] ?></label>
                  <div class="gotoleft"> <div class="polgrph"><font color="#CC0000"><?php echo $data['vote1']*$percnt.'% votes'?></font>
                      <font size="2px"><?php echo "[ Total Votes".$data['vote1']." ]" ?></font>
                        </div></div></div>

 		  			<br><br>
 		  			<div class="wrap"><input type="radio" name="pollto" value="<?php echo $row['option2'] ?>">
    				<label class="lable"><?php echo $row['option2'] ?></label>
               <div class="gotoleft"><div class="polgrph"><font color="#FF8800"><?php echo $data['vote2']*$percnt.'% votes'?></font>
                      <font size="2px"><?php echo "[ Total Votes".$data['vote2']." ]" ?></font>
                  </div></div></div>

 		  			<br><br>
 		  			<div class="wrap"><input type="radio" name="pollto" value="<?php echo $row['option3'] ?>">
    				<label class="lable"><?php echo $row['option3'] ?></label>
               <div class="gotoleft"><div class="polgrph"><font color="#007E33"><?php echo $data['vote3']*$percnt.'% votes'?></font>
                      <font size="2px"><?php echo "[ Total Votes".$data['vote3']." ]" ?></font>
                  </div></div></div>

 		  			<br><br>
 		  			<div class="wrap"><input type="radio" name="pollto" value="<?php echo $row['option4'] ?>">
    				<label class="lable"><?php echo $row['option4'] ?></label>
               <div class="gotoleft"><div class="polgrph"><font color="#9933CC"><?php echo $data['vote4']*$percnt.'% votes'?></font>
                      <font size="2px"color><?php echo "[ Total Votes".$data['vote4']." ]" ?></font>
                  </div></div></div>


 		  			<br><br><br>
    				<div class="sbmtbtn">
                    	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="POLL" />
                     </div>

                     <input class="hiddeninput" type="text" name="elecnm" value='<?php echo $row["id"] ?>' readonly>
                     
    			</form>

            </div>

    		</div>
            <div id="jspoll">
            <div class="polldata">
                
                  
                  
                  
                 
                </div></div>

    	</div>

        <script type="text/javascript">
                function formvalid() {

                            if(document.forms.pollto.value=='')
                            {
                                alert("PLEASE! MAKE A CHOICE");
                                return false;
                            }
                }
            </script>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
    // poll id
    $quesid=1;
    // poll value getting from user
    $pollto=$_POST['pollto'];
    // selecting row who is voting by their SN
    $pollqry="SELECT poll1 FROM voters WHERE  SN=$id";
    $pollres=mysql_query($pollqry) or die("error in voter".mysql_error());
    $pollrow=mysql_fetch_array($pollres,MYSQL_BOTH);
    // checking if the voter has already voted or not
    echo   $pollchk=$pollrow['poll1'];
   if($pollchk=='')
         {

            // $qry09="SELECT vote1,vote2,vote3,vote4,sum FROM poll where id=1";
            // $rslt=mysql_query($qry09);
            // $row1=mysql_fetch_array($rslt,MYSQL_BOTH);
            $qrypoll="UPDATE voters SET poll1='$pollto' WHERE SN=$id";
            mysql_query($qrypoll) or die(mysql_error());
            if($pollto==$row['option1'])
                {
                     $qry7=("UPDATE poll SET vote1=vote1+1 , sum=sum+1 WHERE id=1");
                     mysql_query($qry7) or die("error".mysql_error());
                }
            elseif($pollto==$row['option2'])
                {
                    $qry7="UPDATE poll SET vote2=vote2+1 , sum=sum+1  WHERE id=1";
                    mysql_query($qry7) or die(mysql_error());
                }
            elseif($pollto==$row['option3'])
                {
                    $qry7="UPDATE poll SET vote3=vote3+1 , sum=sum+1  WHERE id=1";
                    mysql_query($qry7) or die(mysql_error());
                }
            else
                {
                    $qry7="UPDATE poll SET vote4=vote4+1 , sum=sum+1  WHERE  id=1";
                    mysql_query($qry7) or die(mysql_error());
                }
                $msg21="Thank you for Voting";
            echo "<script type='text/javascript'>alert('$msg21');";
            echo "</script>";
                echo '<script>window.location="votepoll.php"</script>';
        }
    else
        {
            $msg2="You Have Alredy Voted";
            echo "<script type='text/javascript'>alert('$msg2');";
            echo "window.location='voter_dashboard.php'";
            echo "</script>";
         }
}
?>