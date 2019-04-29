<?php
session_start();
if(isset($_SESSION['name'])){
	
	header("Location:http://potcoava.cu.cc");
	exit();
}
?>
<html>
<head>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="concurs.css" media="bogus">
<title>George</title>
</head>
<body> 

  <img src="backgroundLogin.jpg"width="100%" height="100%" class="background">
  
  <div class="containerLogin">
     <div class="choseRegister">Register</div>
     <div class="choseLogin">Login</div>
	 
	 <div class="minicontainerLogin">
	   <input type="text" name="name" id="name" placeholder="Nume" title="minim 5 caractere" pattern="[a-zA-Z0-9]{5,}" required="required" required>
	   <input type="password" name="password" id="password" placeholder="Parola" pattern="[a-zA-Z0-9]{5,}" required="required" required>
	   <input type="submit" name="submit" id="submit" placeholder="Submit" class="submitAdauga">
	   <div id="succesLogin" class="succesRegister"></div>
	 </div>
	 
	 <div class="minicontainerRegister">
	   <input type="text" name="nameRegister" id="nameRegister" placeholder="Nume" title="minim 5 caractere" pattern="[a-zA-Z0-9]{5,}" required="required" required >
	   <input type="password" name="passwordRegister" id="passwordRegister" placeholder="Parola" pattern="[a-zA-Z0-9]{5,}" required="required" required>
	   <input type="text" name="emailRegister" id="emailRegister" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required" required>
	   <input type="submit" name="submitRegister" id="submitRegister" placeholder="Submit" class="submitAdauga">
	   <div id="succesRegister" class="succesRegister"></div>
	 </div>
	 
  </div>


<link rel="stylesheet" type="text/css" href="concurs.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   $(document).ready(function(){
	   $(".choseLogin").click(function(){
		   $(".choseLogin").css("background","rgba(58,	95	,205,0.7)");
		   $(".choseRegister").css("background","white");
		   $(".choseRegister").css("color","rgba(58,	95	,205,0.7)");
		   $(".choseLogin").css("color","white");
		   $(".minicontainerLogin").css("display","block");
		   $(".minicontainerRegister").css("display","none");
	   });
	   $(".choseRegister").click(function(){
		   $(".choseRegister").css("background","rgba(58,	95	,205,0.7)");
		   $(".choseLogin").css("background","white");
		   $(".choseRegister").css("color","white");
		   $(".choseLogin").css("color","rgba(58,	95	,205,0.7)");
		   $(".minicontainerRegister").css("display","block");
		   $(".minicontainerLogin").css("display","none");
	   });
	$("#submitRegister").click(function(){
		var nameRegister = $("#nameRegister").val();
		var passwordRegister = $("#passwordRegister").val();
		var emailRegister = $("#emailRegister").val();   
		
		var dataString ='nameRegister='+ nameRegister+'&passwordRegister='+passwordRegister+'&emailRegister='+emailRegister;
	if(nameRegister==''&&passwordRegister==''&&emailRegister=='')
	{
		alert("Please Fill All Fields");
	}
		else
	{
		
	 $.ajax({
		type: "POST",
		url: "register.php?",
		data: dataString,
		cache: false,
		beforeSend:function(){
			$('#submitRegister').val("se trimite");
		},
		 complete:function(data){
			$('#submitRegister').val("Submit");
			 if(data){
				 $("#succesRegister").text(data.responseText);
				 }
		 },
    error: function (req, status, err) {
        console.log('Ceva nu e bine', status, err);
    }
	 })
	}
	return false;
	});

	
    $("#submit").click(function(){
		var name = $("#name").val();
		var password = $("#password").val();
		
		
		var dataC ='name='+ name+'&password='+password;
	if(name==''&&password=='')
	{
		alert("Trebuie sa completezi toate campurile");
	}
		else
	{
		
	 $.ajax({
		url: "proceseazaLogin.php",
		type: "POST",
		cache:false,
		data: {name:name,password:password},
		beforeSend:function(){
			$('#submit').val("se trimite");
		},
		 complete:function(data){
			$('#submit').val("Submit");
			 if(data){
				 $("#succesLogin").text(data.responseText);
				 if(data.responseText=="nume si parola buna"){
				 window.location.href = "http://potcoava.cu.cc";
				 }
			 }
		 },
    error: function (req, status, err) {
        console.log('Nu e bine ceva', status, err);
    }
		});
	}
	return false;
	});
   });
</script>
</body>
</html>