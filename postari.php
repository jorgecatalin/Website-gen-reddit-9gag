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
<link rel="stylesheet" type="text/css" href="concurs.css">
<title>George</title>
</head>
<body>



  <img src="backgroundPostari.jpg"width="100%" height="100%" class="background">
  <div class="blank"></div>
  <img src="sageata.png" class="sageata">
  <div class="orangeSubTop"></div>
  
  <div class="cuprins" id="cuprins">
  <?php
     @require('database.php');
	 $nuumar=0;
	 $qr=mysql_query("select * from postConcurs   ORDER BY id  DESC LIMIT 0 , 7",$con);
	 while($row=mysql_fetch_assoc($qr)){
	?>
   <div class="containerMijloc">
     <div class="containerPost">
	    <a href="user.php<?php echo "?id=".$row['name']  ?>"><div class="baraSusPost">
	       <img class="pozaNumePost" src="<?php 
		 $nuume=$row['name'];
		 $gra=mysql_query("select * from userConcurs where name='$nuume'",$con);
		 $graa=mysql_fetch_assoc($gra);
		 echo $graa['poza']?>">
	       <div class="apasaNamePostare"><?php echo $row['name']?></div>
		</div></a>
	    <a href="postare.php<?php echo "?id=".$row['id'] ?>"><img src="<?php echo $row['url']?>"class="imaginePost"></a>
		<div class="baraJosPost">
		   <img src="<?php
		   $nnname=$_SESSION['name'];
		   $iddd=$row['id'];
		$sqlll=mysql_query("select * from likes where name='$nnname' and id='$iddd'",$con);
		if($rowww=mysql_fetch_assoc($sqlll)<1){
			echo "like.png";
		}
		else{echo "liked.png";}
		   
		   ?>" id="like<?php echo $row['id']?>" onclick="liked(<?php echo $row['id']?>)"; class="likeImg">
		   <div class="likePost" id="likee<?php echo $row['id']?>"><?php echo $row['likes']?></div>
		   <img src="comentarii.png" class="comentariiImg">
		   <div class="comentariiPost"><?php echo $row['mesaje']?></div>
		   <img src="vizionari.png" class="vizionariImg">
		   <div class="vizionariPost"><?php echo $row['vizionari']?></div>
		</div>
	  <div class="baraMeniu"></div>
	 </div>
	</div>
	 <?php  }   ?>
	 <div id="a<?php  echo $nuumar ?>" class="containerMijloc"></div>
	 <div id="<?php  echo $nuumar ?>" onclick="maiMulte(<?php  echo $nuumar ?>)"class="postariAdaugaMaiMulte">Vezi mai multe</div>
	 <?php
	 
	 
	 
	 ?>
  </div>
  <div class="footer">
    Creat de Popa George Catalin pentru concursul Interjudetean de Pagini Web si Scurt Metraje "greceanu.ro" 
Editia a XIV-a 
  </div>
  
  <nav class="top">  
    <nav class="butoaneStanga">
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
 var numar=0;
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
		
		  
		  
			
		
	});
	
	var maiMulte=function(nrrr){
			 $('#'+nrrr).css("display","none");
		          numar+=7;
					 $('#a'+nrrr).load('IncarcaMaiMulte.php?numar='+numar);
				
				}
	
	
	var liked=function(id){
					var name = "<?php echo $_SESSION['name']?>";
				var id = id;
			
			 $.ajax({
				url: "like.php",
				type: "POST",
				cache:false,
				data: {name:name,id:id},
				 complete:function(data){
					 if(data){
						 if(data.responseText=="alreadyLiked"){
							 console.log("aldready liked");
							 
						 }
						 if(data.responseText=="liked"){
							 console.log("Liked");
							 var lk="#like"+id;
							 $(lk).attr("src","liked.png");
							 var lkk="#likee"+id;
							 var ddd=parseInt($(lkk).text(),10)+1;
							 $(lkk).text(ddd);
						 }
					 }
				 },
			error: function (req, status, err) {
				console.log('Nu e bine ceva', status, err);
			}
				});
		}
 </script>
</body>
</html>