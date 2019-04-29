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



  <div class="blank"style="height:150px; background:rgba(255,115,1,1)"></div>
  <div class="orangeSubTop"></div>
  
  <div class="cuprins" id="cuprins">
  
  <?php
     @require('database.php');
	 $id=$_GET['id'];
	 $qr=mysql_query("select * from postConcurs where id = '$id' ",$con);
	 while($row=mysql_fetch_assoc($qr)){
	 $viz=$row['vizionari']+1;
		 
	 $qrr=mysql_query("update  postConcurs  set vizionari='$viz' where id='$id'",$con);
	?>
	<div class="containerPostare">
	<div class="postareTop">
	    <a href="user.php<?php echo "?id=".$row['name']  ?>">
	       <img  src="<?php 
		 $nuume=$row['name'];
		 $gra=mysql_query("select * from userConcurs where name='$nuume'",$con);
		 $graa=mysql_fetch_assoc($gra);
		 echo $graa['poza']?>">
	       <div class="apasaNamePostare"><?php echo $row['name']?></div>
		</a>
		
	   <?php  
	   if($_SESSION['name']=== $row['name'] ){
		   echo "<a href='stergePost.php?idd=".$row['idd']."&id=".$id."'><span class='sterge_msg'>sterge</span></a>";
	   }
	   elseif($_SESSION['name']=== 'jorgecatalin'){
		    echo "<a href='stergePost.php?idd=".$row['idd']."&id=".$id."'><span class='sterge_msg'>sterge</span></a>";
	   }
	   
	   ?>
		</div>
	<div class="postarePoza">
	  <img src="<?php echo $row['url'] ?>">
	</div>
	<div class="descrierePoza">
	  <?php echo $row['descriere']?>
	</div>
		<div class="postareJos">
		   <img id="like" src="<?php
		   $nnname=$_SESSION['name'];
		$sqlll=mysql_query("select * from likes where name='$nnname' and id='$id'",$con);
		if($rowww=mysql_fetch_assoc($sqlll)<1){
			echo "like.png";
		}
		else{echo "liked.png";}
		   
		   ?>" class="likeImg">
		   <div id="likes"><?php echo $row['likes']?></div>
		   <img src="comentarii.png" class="comentariiImg">
		   <div ><?php echo $row['mesaje']?></div>
		   <img src="vizionari.png" class="vizionariImg">
		   <div ><?php echo $row['vizionari']?></div>
		</div>
	
	 <?php  } ?>
	 <div class="postareComentarii">
	    <?php 
		$ctx=mysql_query("SELECT * FROM comentarii where id='$id' ORDER BY idd ",$con);
		while($roww=mysql_fetch_assoc($ctx)){
		?>
	   <div class="containerComent">
	   <a href="user.php<?php echo "?id=".$roww['name']  ?>">
	   
	      
	     <img src="<?php 
		 $nuume=$roww['name'];
		 $gra=mysql_query("select * from userConcurs where name='$nuume'",$con);
		 $graa=mysql_fetch_assoc($gra);
		 echo $graa['poza']?>">
		 <div><?php echo $roww['name']?></div>
		 </a>
		 
		 <div class="containerCom">
		  <div><?php echo $roww['text']?></div>
		  </div>
		  
	   <?php  
	   if($_SESSION['name']=== $roww['name'] ){
		   echo "<a href='sterge.php?idd=".$roww['idd']."&id=".$id."'><span class='sterge_mesaj'>sterge</span></a>";
	   }
	   elseif($_SESSION['name']=== 'jorgecatalin'){
		    echo "<a href='sterge.php?idd=".$roww['idd']."&id=".$id."'><span class='sterge_mesaj'>sterge</span></a>";
	   }
	   
	   ?>
       <div style="width:100%;height:2px;background:orange;margin:0;margin-bottom:5px;"></div>
	   </div>
		<?php  } ?>
	 
	 </div>
	 <br>
	 <div class="lasaComentariu">
	 <form  method="post">
	   <input type="text" name="text" placeholder="Lasa un comentariu" >
	   <input type="submit" value="Lasa un comentariu" name="submit">
	   </form>
	 </div>
	 </div>
  </div>
  <div class="footer">
    Creat de Popa George Catalin pentru concursul Interjudetean de Pagini Web si Scurt Metraje "greceanu.ro" 
Editia a XIV-a 
  </div>
  
  <nav class="top" >  
    <nav class="butoaneStanga" >
	<a href="setariUser.php">
	  <img class="pozaNume" id="NUMETOP"src="<?php echo $_SESSION['poza']?>">
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
 
<?php
 if(isset($_POST['submit']) and isset($_POST['text'])){
	   $text=$_POST['text'];
	   $name=$_SESSION['name'];
	   $poza=$_SESSION['poza'];
	   $baga="insert into comentarii (id,text,name,poza) values ('$id','$text','$name','$poza')";
	   $bagabine=mysql_query($baga,$con);
	   $take_link=mysql_query("select * from postConcurs where id='$id'",$con);
	   while($roww=mysql_fetch_array($take_link)){
		   $msg=$roww['mesaje'];
		   $msg=$msg+1;
	   }
	   $upp_msg=mysql_query("update postConcurs set mesaje='$msg' where id='$id'",$con);
     header("Location: http://potcoava.cu.cc/Concurs/postare.php?id=$id");
    exit;
 }
?>
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
		
		
 $("#like").click(function(){
		var name = "<?php echo $_SESSION['name']?>";
		var id = <?php echo $id?>;
		// Returns successful data submission message when the entered information is stored in database.
		
	// AJAX Code To Submit Form.
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
					 $('#like').attr("src","liked.png");
					 var ddd=parseInt($('#likes').text(),10)+1;
					 $('#likes').text(ddd);
				 }
			 }
		 },
    error: function (req, status, err) {
        console.log('Nu e bine ceva', status, err);
    }
		});
	return false;
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
	});
 </script>
   
</body>
</html>
