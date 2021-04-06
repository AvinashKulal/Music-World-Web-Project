<?php
include("connection.php");
include_once("Heading.php");

if(!isset($_SESSION['USER'])){
	echo "<script>window.location = 'HomePage.php'</script>";
}

$q = "select * from song where song_id = '$_GET[song]'";
$sql = mysqli_query($conn,$q);
$res = mysqli_fetch_array($sql);






$qq = "select favorite.song from song,favorite where song_id = '$_GET[song]' and song.song = favorite.song";
$sqll = mysqli_query($conn,$qq);
$ress = mysqli_fetch_array($sqll);
$isFav  = false;
if(mysqli_affected_rows($conn))
	$isFav = true;
?>

<html>
<head>
<link rel = "stylesheet" href = "style.css"/>
<script type="text/javascript">
	
}
</script>

</head>



<body class = "animate">


<div style="padding:10px;width:50%;float:left;">
<center>
<img src = "<?php echo "images/".$res['image']; ?>"  width="100%" height="60%" style="border-radius:10px;border:5px solid white" />
<br/><br/>

<?php 
if($isFav == true)
 echo '<img src = "images/starfilled.png"  title="Favorite song" width="50px" height="50px" style=""/>';
else
	echo '<img src = "images/star.png"  title="Not Favorite song" width="50px" height="50px" style=""/>';

?>&nbsp;
<audio controls  >
<source   src="songs/<?php echo $res['source'] ?>" type="audio/mp3">

</audio>
<br/><br/>
<span class = "whitetext" style="font-size:25px;color:black;font-weight:bold;"> <?php echo $res['song'];?> | <?php echo $res['movie_name'];?> | <?php echo $res['type'];?></span>
</center>
</div>

<div class = "area">
<h2 class = "whitetext" align = "center">Lyrics</h2>
<hr/>
<pre class  = "whitetext"><?php  echo $res['lyrics'];?></pre>
</div>


</body>
</html>
<?php
include("footer.html");
?>