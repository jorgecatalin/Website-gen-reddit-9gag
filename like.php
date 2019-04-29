<?php
@require('database.php');
$name=$_POST['name'];
$id=$_POST['id'];
$sql=mysql_query("select * from likes where name='$name' and id='$id'",$con);
if($row=mysql_fetch_assoc($sql)<1){
	$qr="insert into likes (name,id) values ('$name','$id')";
	$qrr=mysql_query($qr,$con);
	$lk=mysql_query("select * from postConcurs where id='$id'",$con);
	$lkk=mysql_fetch_assoc($lk);
	$likeuri=$lkk['likes']+1;
	$update=mysql_query("UPDATE postConcurs SET likes='$likeuri' where id='$id'",$con);
	echo "liked";
}
else{
	echo "alreadyLiked";
}




