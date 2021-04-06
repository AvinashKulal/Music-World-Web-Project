<?php

include("connection.php");
include_once("Heading.php");
if(!isset($_SESSION['USER'])){
	echo "<script>window.location = 'HomePage.php'</script>";
}

$q = "select * from language order by no_of_songs desc";
$sql = mysqli_query($conn,$q) or die("Error");

?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>
</head>
<body >
<center>
<span class="headingtext bluetext" >LANGUAGES:</span>
</center>

<body>

<div class = "gridbox">

<?php
while($res = mysqli_fetch_array($sql)){	?>

<div class = "item">
	<a href = "AllCategory.php?lang= <?php echo base64_encode($res['language']);?>"><img src = "<?php echo "images/".$res['images']; ?>" width = "100%" height = "200px"/></a>
	<span class = "whitetext" style="font-size:20px"> <?php echo $res['language']; ?> |</span>
	<span class = "whitetext">Movies : <?php echo $res['no_of_songs']; ?></span>
</div>

<?php 
}
?>

</div>







</html>
<?php
include("footer.html");
?>