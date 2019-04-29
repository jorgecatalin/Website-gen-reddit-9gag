<?php
	session_start();
@require('database.php');
$name=$_POST['name'];
$password=$_POST['password'];
$check="select * from userConcurs where name='$name' and password='$password'";
$check_user=mysql_query($check,$con);
if($row=mysql_fetch_assoc($check_user)>0){
	$_SESSION['name']=$name;
	$_SESSION['poza']=$row['poza'];
	echo "nume si parola buna";
}
else{
	echo "nume sau parola greita";
}



?>