

<?php
include_once("Heading.php");
include_once("connection.php");
if($_GET['id'] == 1){
	if(isset($_POST['lan'])){
		
		$tmp_name = $_FILES['img']['tmp_name'];
		$name = $_FILES['img']['name'];
		$q  = "insert into language(language,images) values('$_POST[lang]','$name')";
		mysqli_query($conn,$q) or die("Error");
		$tmp_name = $_FILES['img']['tmp_name'];
		
		if(move_uploaded_file($tmp_name,"images/".$name)){
			echo "<script>alert('Added Successfully');</script>";
		}
		else{
			echo "something error occured";
		}
	}
}
 if($_GET['id'] == 2){
	
	$q = "select language from language";
	$sql = mysqli_query($conn,$q);
	if(isset($_POST['movie'])){
		
		$tmp_name = $_FILES['img']['tmp_name'];
		$name = $_FILES['img']['name'];
		$q  = "insert into movie(moviename,image,language) values('$_POST[lang]','$name','$_POST[langsel]')";
		mysqli_query($conn,$q) or die("Error");
		$tmp_name = $_FILES['img']['tmp_name'];
		
		if(move_uploaded_file($tmp_name,"images/".$name)){
			echo "<script>alert('Added Successfully');</script>";
			$Q = "CALL `inc_lang`('$_POST[langsel]');";
			mysqli_query($conn,$Q) or die("What error");
		}
		else{
			echo "something error occured";
		}
	}
	
	
} 
if($_GET['id'] == 3){
	
	$q = "select language from language";
	$sql = mysqli_query($conn,$q);
	$qq = "select moviename from movie";
	$sqll = mysqli_query($conn,$qq);
	if(isset($_POST['song'])){
		
		$tmp_name = $_FILES['songimg']['tmp_name'];
		$name = $_FILES['songimg']['name'];
		
		$tmp_name2 = $_FILES['audio']['tmp_name'];
		$name2 = $_FILES['audio']['name'];
		$query = "INSERT INTO `song`(`song`, `movie_name`, `language`, `image`, `type`, `lyrics`, `source`) VALUES 
		('$_POST[songname]','$_POST[moviesel]','$_POST[langsel]','$name','$_POST[type]','$_POST[lyrics]','$name2')";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		  
		  
		$tmp_name3 = $_FILES['singerimg']['tmp_name'];
		$name3 = $_FILES['singerimg']['name'];
		$query = "INSERT INTO `singer`(`singer`, `song`, `images`) VALUES ('$_POST[singer]','$_POST[songname]','$name3')";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		
		move_uploaded_file($tmp_name,"images/".$name);
		move_uploaded_file($tmp_name2,"songs/".$name2);
		move_uploaded_file($tmp_name3,"images/".$name3);
		echo "<script>alert('Added Successfully');</script>";
		
		
	}
	
	
}
?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>


</head>
<body >
<center>
<?php 
if($_GET['id'] == 1){
?>
<span class="headingtext bluetext" >ADD LANGUAGE</span>
<hr/>
<form action = "" method = "POST" enctype = "multipart/form-data">

<input type="text" name = "lang" placeholder = "Language Name..." required /><br/>

<input type="file" name="img" accept = "image/jpg,image/jpeg,image/png" title ='upload image' required /><br/>
<input type="submit" name = "lan" value="ADD" />
</form>
<?php

} else if($_GET['id'] == 2){
?>
<span class="headingtext bluetext" >ADD MOVIE</span>
<hr/>
<form action = "" method = "POST" enctype = "multipart/form-data">

<input type="text" name = "lang" placeholder = "Movie Name..." required /><br/>

<input type="file" name="img" accept = "image/jpg,image/jpeg,image/png" title ='upload image' required /><br/>
<select name= "langsel" required>
<option value="">Select Language</option>
<?php
while($res = mysqli_fetch_array($sql)){
	echo "<option value='$res[language]'>$res[language]</option>";
}
?>
</select><br/>
<input type="submit" name = "movie" value="ADD" />
</form>



<?php 
} 

else if($_GET['id'] == 3){
?>
<span class="headingtext bluetext" >ADD SONG</span>
<hr/>
<form action = "" method = "POST" enctype = "multipart/form-data">

<input type="text" name = "songname" placeholder = "song Name..." required /><br/>

<select name= "moviesel" required>
<option value="">Select Movie</option>
<?php
while($res = mysqli_fetch_array($sqll)){
	echo "<option value='$res[moviename]'>$res[moviename]</option>";
}
?>
</select><br/>

<select name= "langsel" required>
<option value="">Select Language</option>
<?php
while($res = mysqli_fetch_array($sql)){
	echo "<option value='$res[language]'>$res[language]</option>";
}
?>
</select><br/>


<input type="file" name="songimg" accept = "image/jpg,image/jpeg,image/png" title ='upload image' required /><br/>
<select name= "type" required>
<option value="">Select Type</option>
<option value="Love">Love Song</option>
<option value="Devotional">Devotional Song</option>
<option value="Dance">Dance Song</option>

</select><br/>
<textarea cols ='90' rows ="20" name = "lyrics">
Lyrics
</textarea><br/>

<input type="file" name="audio" accept = "audio/mp3" title ='upload audio' required /><br/>
<hr/>
<input type="text" name = "singer" placeholder = "Singer Name..." required /><br/>
<input type="file" name="singerimg" accept = "image/jpg,image/jpeg,image/png" title ='Singer image' required /><br/>

<input type="submit" name = "song" value="ADD" />
</form>
<?php
}
?>
</center>
</body>
</html>