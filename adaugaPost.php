<?php
session_start();
if(isset($_SESSION['name'])){
	//echo "dada";
}
else{
	header("Location:login.php");
	session_destroy();
	exit();
}
@require('database.php');
if(isset($_POST['submit'])){
	$url=$_POST['url'];
	$descriere=$_POST['descriere'];
	$name=$_SESSION['name'];
	$poza=$_SESSION['poza'];
	$qr=mysql_query("insert into postConcurs (name,url,poza,descriere) values ('$name','$url','$poza','$descriere')",$con);
	header("Location:postari.php");
}
else{
	echo 'nu merge';
}

?>