<?php
include("connection.php");
include_once("Heading.php");
if(!isset($_SESSION['USER'])){
	echo "<script>window.location = 'HomePage.php'</script>";
}
?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>


</head>
<body >
<center>
<span class="headingtext bluetext" >All Songs:</span>
</center>

<body>


<div>
<table cellspacing="20px">
<?php 
$q = "select * from song  ";
	$sql = mysqli_query($conn,$q);
$qq  = "select song from favorite where user = '$_SESSION[USER]'";
$sqll = mysqli_query($conn,$qq);
$fav =[];
while($res = mysqli_fetch_array($sqll))
	$fav[]=$res['song'];

while($res = mysqli_fetch_array($sql)){
		
	$isfav = false;
	if(in_array($res['song'],$fav)){
		$isfav = true;
	$imgtag = '<img src = "images/starfilled.png"   height = "30px" width ="30px" style = "float:right;" ';
	}else{
		
		$imgtag = '<img src = "images/star.png"  height = "30px" width ="30px" style = "float:right" ';
	
	}
	$r = "UpdataeFavorite.php?song=".$res['song']."&fav=".$isfav;
	echo '<tr  class ="playtext"> <td><a href = "'.$r.'"><img src = "images/songicon.jpg" title ="Click To Add/Remove From Fovorite List" height = "80px" width = "100px"/></a>&nbsp;<span style = "color:blue">'.$res['song'].' </span>| '.$res['movie_name'].' |'.$res['language'].'</h3> | <span style="color:red" >'.$res['type'].'</span> '.$imgtag.'	</td></tr>';

}
?>

