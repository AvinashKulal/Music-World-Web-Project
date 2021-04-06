<?php
include("connection.php");
include_once("Heading.php");
if(!isset($_SESSION['USER'])){
	echo "<script>window.location = 'HomePage.php'</script>";
}

$sql = ""; 
if($_GET['id'] == 0){
	
	$q = "select * from song where movie_name = '$_GET[movie]' ";
	$sql = mysqli_query($conn,$q);
	
	$qqq  = "select image from movie where moviename = '$_GET[movie]'";
	$sqlll =mysqli_query($conn,$qqq);
	$ress = mysqli_fetch_array($sqlll); 
	
}
if($_GET['id'] == 1){
	
	$q = "select singer.song as song,song.language as language,song.type as type,song.song_id as song_id,song.movie_name as movie_name from song,singer where singer = '$_GET[singer]' and song.song = singer.song and song.language = '$_GET[lang]' ";
	$sql = mysqli_query($conn,$q);
	
	$qqq  = "select images as image from singer where singer = '$_GET[singer]'";
	$sqlll =mysqli_query($conn,$qqq);
	$ress = mysqli_fetch_array($sqlll); 
	
}

if($_GET['id'] == 2){
	$ress = [];
	$ress['image'] = $_GET['cat'].'.jpg';
	$q = "select * from song where language = '$_GET[lang]' and type = '$_GET[cat]' ";
	$sql = mysqli_query($conn,$q);
}
if($_GET['id'] == 3){
	$ress = [];
	$ress['image'] = 'favoritesong.jpg';
	$q = "select * from song,favorite where favorite.song = song.song and user = '$_SESSION[USER]'  ";
	$sql = mysqli_query($conn,$q);
}







$qq  = "select song from favorite where user = '$_SESSION[USER]'";
$sqll = mysqli_query($conn,$qq);
$fav =[];
while($res = mysqli_fetch_array($sqll))
	$fav[]=$res['song'];


?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>
<script type="text/javascript">
function playSong(a){
	window.location = "Playsong.php?song="+a;
}
</script>
</head>
<body>
<center>
<span class="headingtext bluetext" >Songs:</span>
<br/><br/>
<?php
if(count($fav)!=0 || $_GET['id']!=3)
{
	?>
	
<img src = "<?php echo 'images/'.$ress['image'];?>"class = "item" width= "30%" />
<?php
}else{
?>
<img src = "<?php echo 'images/nothing.png';?>"class = "item" width= "30%" />

<?php
}
?>
</center>
<div>
<table cellspacing="20px">
<?php 
while($res = mysqli_fetch_array($sql)){
	if(in_array($res['song'],$fav)){
	$imgtag = '<img src = "images/starfilled.png"   height = "30px" width ="30px" style = "float:right;" ';
	}else{
		$imgtag = '<img src = "images/star.png"  height = "30px" width ="30px" style = "float:right" ';
	
	}
	
	$p = $res['song_id'];
	$r = "playSong($p)";
	echo '<tr onclick = "'.$r.'" class ="playtext"> <td><img src = "images/songicon.jpg" height = "80px" width = "100px"/>&nbsp;<span style = "color:blue">'.$res['song'].' </span>| '.$res['movie_name'].' |'.$res['language'].'</h3> | <span style="color:red" >'.$res['type'].'</span> '.$imgtag.'	</td></tr>';
}
?>




</table>

</div>


</body>
</html>
