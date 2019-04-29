<?php
session_start();
if(isset($_SESSION['name'])){
//k
}
else{
	header("Location:login.php");
	session_destroy();
	exit();
}
 @require('database.php');
$id=$_GET['id'];
$link=mysql_query("delete from postConcurs where id='$id'",$con);
$linkl=mysql_query("delete from likes where id='$id'",$con);
header("location:http://potcoava.cu.cc/Concurs/postari.php");
exit();








