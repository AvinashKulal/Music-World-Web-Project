<?php

include("connection.php");
if($_GET['fav'] == ""){
	$q = "insert into favorite values('$_SESSION[USER]','$_GET[song]') ";
	mysqli_query($conn,$q) or die("Error");
}else{
	$q = "delete from favorite where user = 'avinashkulal1977@gmail.com' and song = '$_GET[song]' ";
		mysqli_query($conn,$q) or die("Error");
}

echo "<script>window.location ='AddFavorite.php' </script>";
?>
