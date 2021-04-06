<?php
include("connection.php");
include_once("Heading.php");
if(!isset($_SESSION['USER'])){
	echo "<script>window.location = 'HomePage.php'</script>";
}

$lang = base64_decode($_GET['lang']);
?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>
</head>
<body>
<center>
<span class="headingtext bluetext" ><?php echo $lang;?> Songs:</span>


</center>
<p class="headingtext medium-text" >Movie:</p>
<hr/>

<div class = "gridbox">

<?php
$q = "select * from movie where language = '$lang' ";
$sql = mysqli_query($conn,$q);
while($res = mysqli_fetch_array($sql)){

	?>

<div class = "item">
	<a href = "AllSongs.php?lang= <?php echo $lang;?>&movie=<?php echo $res['moviename'];?>&id=0"><img src = " <?php echo "images/".$res['image'];?>" width = "100%" height = "200px"/></a>

	<span class = "whitetext">  <?php echo $res['moviename'];?> |</span>
	<span class = "whitetext"><?php echo $res['language'];?></span>
</div>

<?php 
}
?>

</div>



<p class="headingtext medium-text" >Singer:</p>
<hr/>

<div class = "gridbox">

<?php
$q = "select singer ,count(*)as cnt,singer.images as images from singer,song where singer.song = song.song and language = '$lang'  group by singer";
$sql = mysqli_query($conn,$q);
while($res = mysqli_fetch_array($sql)){

	?>

<div class = "item">
	<a href = "AllSongs.php?lang=<?php echo $lang;?>&singer=<?php echo $res['singer'];?>&id=1">  <img src = "<?php echo "images/".$res['images'];?>" width = "100%" height = "200px"/></a>
	<span class = "whitetext">  <?php echo $res['singer'];?> |</span>
	<span class = "whitetext">  Songs: <?php echo $res['cnt'];?></span>
</div>

<?php 
}
?>

</div>



<p class="headingtext medium-text" >Type:</p>
<hr/>

<div class = "gridbox">

<?php
$ext = '.jpg';
$q = "select type,count(*) as cnt from song where language = '$lang' group by type";
$sql = mysqli_query($conn,$q);
while($res = mysqli_fetch_array($sql)){

	?>

<div class = "item">
	<a href = "AllSongs.php?lang=<?php echo $lang;?>&cat=<?php echo $res['type'];?>&id=2"> <img src = "<?php echo "images/".$res['type'].$ext;?>" width = "100%" height = "200px"/></a>
	<span class = "whitetext"> <?php echo $res['type'];?> |</span>
	<span class = "whitetext"> Songs: <?php echo $res['cnt'];?></span>
</div>

<?php 
}
?>

</div>




</body>



</body>

</html>
<?php
include("footer.html");
?>