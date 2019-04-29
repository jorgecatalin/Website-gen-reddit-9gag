<?php
session_start();
if(isset($_SESSION['name'])){
//	echo "dada";
}
else{ 
	header("Location:login.php");
	session_destroy();
	exit();
}
 @require('database.php');
$idd=$_GET['idd'];
$id=$_GET['id'];
$link=mysql_query("delete from comentarii where idd='$idd'",$con);

$take_link=mysql_query("select * from postConcurs where id='$id'",$con);
	   while($roww=mysql_fetch_array($take_link)){
		   $msg=$roww['mesaje'];
		   $msg=$msg-1;
	   }
	   $upp_msg=mysql_query("update postConcurs set mesaje='$msg' where id='$id'",$con);
header("location:http://potcoava.cu.cc/Concurs/postare.php?id=$id");
exit();

