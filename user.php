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
?>

<html>
<head>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="concurs.css" >
<title>George</title>
</head>
<body>



  <img src="backgroundUser.jpg"width="100%" height="100%" class="background">
  <div class="blank"style="height:150px; background:rgba(255,100,1,0.7)"></div>
  <div class="orangeSubTop"></div>
  
  <div class="cuprinsUser" id="cuprins" >
     <div class="containerUserCuprins">
   <?php 
   @require('database.php');
   $name=$_GET['id'];
   $sqll=mysql_query("select * from userConcurs where name='$name'",$con);
   while($row=mysql_fetch_assoc($sqll)){
   ?>
   <div class="userSetariTop">
      <img src="<?php echo $row['poza']?>">
	  <div><?php echo $row['name']?></div>
	</div>
	<div class="postarilelui">Postarile lui <?php echo $row['name']?></div>
	<div class="postariUser">
	
   <?php 
   
      $q=mysql_query("select * from postConcurs where name='$name'",$con);
	  while($roww=mysql_fetch_assoc($q)){
	?>
	
	    <a href="postare.php<?php echo "?id=".$roww['id'] ?>"><img src="<?php echo $roww['url']?>"></a>
	<?php
		  
		  
	  }
   ?>
   </div>
   <?php
   }
  ?>
  </div>
 </div>
  <div class="footer">
    Creat de Popa George Catalin pentru concursul Interjudetean de Pagini Web si Scurt Metraje "greceanu.ro" 
Editia a XIV-a 
  </div>
  
  <nav class="top" >  
    <nav class="butoaneStanga" >
	<a href="setariUser.php">
	  <img class="pozaNume" src="<?php echo $_SESSION['poza']?>">
	  <div><?php echo $_SESSION['name']?></div>
	  </a>
	</nav>
    
    <nav class="butoaneDreapta">
	  <a class="tab1" href="http://potcoava.cu.cc"><div>Acasa</div></a>
	  <a class="tab1" href="http://potcoava.cu.cc/Concurs/postari.php"><div class="tab2" >Postari</div></a>
	  <div class="tab3" id="chat">Chat</div>
	  <div class="menuTop">≡
   <div class="meniuTop" id="meniu">
	  <a  href="http://potcoava.cu.cc"><div class="tabb1">Acasa</div></a>
	  <a  href="http://potcoava.cu.cc/Concurs/postari.php"><div class="tabb2">Postari</div></a>
	  <a  id="chaat" ><div  class="tabb3">Chat</div></a>
	  <a  href="http://potcoava.cu.cc/Concurs/informatii.php"><div class="tabb4">Informatii</div></a>
	  <a  href="http://potcoava.cu.cc/Concurs/setariUser.php"><div class="tabb4">Setari</div></a>
	  <a  href="http://potcoava.cu.cc/Concurs/logout.php"><div class="tabb5">Logout</div></a>
	  <div class="baraMeniu"></div>
   </div></div>
	</nav>
  </nav>
  
  <iframe class="iframe" id="iframe" src="http://potcoava.cu.cc/PHP/index.php"></iframe>
 <!-- cel mai jos sta cel mai in fata!! -->
  <div class="buton" id="buton"><span>+</span></div>
  <div class="adaugaPanel">
     <div class="titluAdauga">Adauga postare</div>
	 <form method="post" action="adaugaPost.php">
	   <input type="text" name="url" id="" placeholder="introdu url imagine">
	   <input type="text" id="" name="descriere" placeholder="descriere">
	   <input type="submit" name="submit" id="" placeholder="Adauga" class="submitAdauga">
	   </form>
     <div class="inchidePanel">x</div>
  </div>

  
  

  
  
  
  
  
  
  
  
  
  
  
  
 <link rel="stylesheet" type="text/css" href="concurs.css" >
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script>
    $(document).ready(function(){
		$("#buton").click(function(){
			$("#buton").addClass("butonClick");
			setTimeout(function(){
			$(".adaugaPanel").css("display","block");
			},500);
		});
		$(".buton").click(function(){
			$(".buton").addClass("butonClick");
		});
		
		$(".inchidePanel").click(function(){
			$("#buton").removeClass("butonClick");
			$(".adaugaPanel").css("display","none");
		});
		
		 $(window).scroll(function(){
          var scroll = $(window).scrollTop();
		  if(scroll>100){
			 $(".top").addClass("topNou");
			 $(".meniuTop").addClass("meniuTopAfter");
			$(".meniuTop").css("margin-top","16");
		  }
		  else{
			 $(".top").removeClass("topNou");
			 $(".meniuTop").removeClass("meniuTopAfter");
			$(".meniuTop").css("margin-top","0");
		  }
		 });
        $(".sageata").click(function(){
			$("html, body").animate({ scrollTop: $("#cuprins").offset().top }, 1500)
		})
		var clic=true;
		$(".menuTop").click(function(){
			if(clic){
			$(".meniuTop").css("display","block");
			clic=false;
			}
			else{
			$(".meniuTop").css("display","none");
			clic=true;
			}
		})
				var clicc=true;
		$("#chat").click(function(){
			if(clicc){
			$(".iframe").css("display","block");
			clicc=false;
			}
			else{
			$(".iframe").css("display","none");
			clicc=true;
			}
		})
		$("#chaat").click(function(){
			if(clicc){
			$(".iframe").css("display","block");
			clicc=false;
			}
			else{
			$(".iframe").css("display","none");
			clicc=true;
			}
		})
	});
 </script>
   
</body>
</html>
