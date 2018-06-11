<?php

include 'admin_dashboard.php';
if(isset($_POST['submit']))
{
$elname=addslashes($_POST['elename']);
include 'dbsele.php';
$chkdata="select name from elections where name='$elname'";
$result=mysql_query($chkdata);
if($res=mysql_num_rows($result)>=1)
    echo "data already saved";
else
    {
        // adding election name to elections table
    $sql="insert into elections (name) values ('$elname')";
    mysql_query($sql);
    // adding election name to voters field for voting purpose
    $sql2="ALTER TABLE voters ADD $elname VARCHAR(200) NOT NULL";
    mysql_query($sql2);
    $sql12="ALTER TABLE google ADD $elname VARCHAR(200) NOT NULL";
    mysql_query($sql12);
    header("Location:candidatereg.php");
    exit();
}

}
?>
<html>
<head>
    <link rel="icon" href="favicon.png" type="image/png" sizes="32x32" >
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/overwrite.css">
    <link href="css/animate.min.css" rel="stylesheet">
    

    <link href="css/style.css" rel="stylesheet" />
<script type="text/javascript">
    function formval()
{
    for(i=0;i<=10;i++)
        {
    if(document.regform[i].value=='')
        {
            alert("please enter Name !!"); 
            document.regform[i].focus();
            return false;
        }
        }
     }
    </script>   
    </head>
    <body>
    <div id="feature1">

              <div>
                <div class="text-center" data-wow-offset="0" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">                   
                        <form class="form-inline" method="POST">
                            <div class="form-group">
                                <input class="form-control" id="exampleInputName" placeholder="ELECTION NAME" type="text" name="elename">                           
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">ADD ELECTION</button>
                            </div>
                        </form>                 
                            
                    </div>
                </div>
            </div>    
</body>
</html>