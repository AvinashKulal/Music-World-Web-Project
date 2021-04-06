<?php
include_once("Heading.php");
if(isset($_POST['submit'])){
	if($_POST['name'] == 'admin' && $_POST['pass'] == 'admin'){
		echo "<script>window.location = 'admindashboard.php'</script>";
	}
	
}
?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>


</head>
<body >
<center>
<span class="headingtext bluetext" >ADMIN LOGIN</span>


<body>
<form action ="" method = "POST">
<hr/><br/>
<input type="text" placeholder = "Admin Name...." name = "name" required autofocus><br/>
<input type="password" placeholder = "Admin Password..." name = "pass"  required><br/>
<input type="submit" name= "submit" value="Login"/>
</form>

</center>
</body>

</html>