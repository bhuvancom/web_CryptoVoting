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
// emptying poll table
$qry="TRUNCATE TABLE poll ";
mysql_query($qry) or die(mysql_error());
// deleting poll1 column from voters table
$qry2="ALTER TABLE voters DROP poll1";
mysql_query($qry2) or die (mysql_error());

$qry22="ALTER TABLE google DROP poll1";
mysql_query($qry22) or die (mysql_error());
header("Location:addpoll.php");
exit();
?>