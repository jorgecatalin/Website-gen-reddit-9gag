<?php
@require('setari.php');
$con = mysql_connect($HostName,$UserName,$Password);
if($con){
	//echo '<br>ceva merge';
	if(mysql_select_db($DataBase)){
		//echo '<br>conectat la database';
	}
	else {
		//echo '<br>neconectat la database';
	}
}
else{
	$error = mysql_error();
	//echo '<br>erroare';
	exit();
}




?>