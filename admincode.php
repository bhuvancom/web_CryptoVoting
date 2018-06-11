<?php
 session_start();
$username=md5($_POST['user']);
$password=md5($_POST['pass']);
mysql_connect('localhost','root','');
mysql_select_db("election");
$query="select * from admin where user='$username' and password='$password'";
$res=mysql_query($query);
if($row= mysql_fetch_array($res,MYSQL_BOTH))
    {
        $_SESSION['user']=$username;
        header("Location:admin_dashboard.php");
        exit();
    }
else
    {
        
        header("Location:index.php#pricing");
        exit();
    }
?>