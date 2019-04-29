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



  <img src="backgroundInformatii.png"width="100%" height="100%" class="background">
  <div class="blank"style="height:150px; background:rgba(255,100,1,0.7)"></div>
  <div class="orangeSubTop"></div>
  
  <div class="cuprinsUser" id="cuprins" >
     <div class="containerUserCuprins" id="informatiiCuprins">
   <div >Buna <?php echo $_SESSION['name']?> aici vei gasi informatiile despre site pe care le cauti.</div>
   <div>In partea din dreapta sus se afla meniul.</div>
   <div>Apasand pe butonul cu semnul "+" din dreapta jos, veti accesa panoul de unde puteti posta propria postare. In acest panou trebuie sa puneti un url al unei poze. Pentru a gasi url al unei poze trebuie sa accesati poza dorita pe internet apoi click dreapta pe ea, iar apoi "copy url" dupa accea inserati url in panoul respectiv. Nu puteti pune poze din pc/telefonul dumneavoastra, doar de pe internet. </div>
   <img src="informatii.jpg">
   <div>Pentru a accesa profilul oricarui utilizator trebuie sa dati clic pe numele sau poza acestuia(exceptie facand zona de chat).</div>
   <div>Pentru a va schimba poza de profil trebuie sa intrati in setari si sa introduceti url-ul unei poze dorite de pe internet.</div>
   <div>In pagina Postari se afla toate postarile in functie de data postarii lor.</div>
   <div>Pentru a deschide chatul trebuie sa apasati pe butonul de chat din meniu. Chatul este comun, toti utilizatorii pot vorbii pe el.</div>
   <div>Sursa principala de inspiratie pentru website sunt paginile sociale gen:Facebook,Instagram,9gag.</div>
   <div>Este un website responsiv.</div>
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
