
<?php
@require('database.php');
	 $name=$_POST["nameRegister"];
	 $password=$_POST["passwordRegister"];
	 $email=$_POST["emailRegister"];
	 $ck="select * from userConcurs where name='$name'";
	 $ckk=mysql_query($ck,$con);
	if($row=mysql_fetch_assoc($ckk)>0){
		echo "numele exista deja";
		exit();
	}
	else{
		$qr="insert into userConcurs (name,password,email) values ('$name','$password','$email')";
		$qrr=mysql_query($qr,$con);
        echo"inregistrarea a reusit, acum va puteti loga cu numele si parola dumneavoastra";
	}



?>