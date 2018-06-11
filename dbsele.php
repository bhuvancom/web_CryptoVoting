<?php

$conn = mysql_connect("localhost", "root", "");
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
else
    mysql_select_db("election");
?>