<?php
session_start();
$numar=$_GET['numar'];
@require('database.php');
$result = mysql_query("SELECT * FROM postConcurs", $con);
$num_rows = mysql_num_rows($result);
	 $qr=mysql_query("select * from postConcurs   ORDER BY id   DESC LIMIT $numar ,7",$con);
	 while($row=mysql_fetch_assoc($qr)){
	echo "
   <div class='containerMijloc'>
     <div class='containerPost'>
	    <a href='user.php?id=".$row['name']  ."'><div class='baraSusPost'>
	       <img class='pozaNumePost' src='";
	
		 $nuume=$row['name'];
		 $gra=mysql_query("select * from userConcurs where name='$nuume'",$con);
		 $graa=mysql_fetch_assoc($gra);
		echo  $graa['poza'];
		echo "'>
	       <div class='apasaNamePostare'>". $row['name']."</div>
		</div></a>
	    <a href='postare.php?id=".$row['id']."'><img src='".$row['url']."'class='imaginePost'></a>
		<div class='baraJosPost'>
		   <img src='";
		 
		   $nnname=$_SESSION['name'];
		   $iddd=$row['id'];
		$sqlll=mysql_query("select * from likes where name='$nnname' and id='$iddd'",$con);
		if($rowww=mysql_fetch_assoc($sqlll)<1){
			echo "like.png";
		}
		else{echo "liked.png";}
		   
		   
		   echo "' id='like". $row['id']."' onclick='liked(".$row['id'].")' class='likeImg'>
		   <div class='likePost' id='likee".$row['id']."'>".$row['likes']."</div>
		   <img src='comentarii.png' class='comentariiImg'>
		   <div class='comentariiPost'>".$row['mesaje']."</div>
		   <img src='vizionari.png' class='vizionariImg'>
		   <div class='vizionariPost'>".$row['vizionari']."</div>
		</div>
	  <div class='baraMeniu'></div>
	 </div>
	</div>";
	
	   }  
	   echo "
	   <div id='a".$numar."' class='containerMijloc'></div>
	      <div id='".$numar."'onclick='maiMulte(".$numar .")' class='";
		  
		  
		  if($num_rows<=$numar+7){echo "nuArata";}
		  else{echo "postariAdaugaMaiMulte";}
		  echo
		  "'>Vezi mai multe</div>";
	 