









<?php
include_once("connection.php");
include_once("Heading.php");
if(isset($_SESSION['USER'])){
	echo "<script>window.location = 'LangaugePage.php'</script>";
}
if(isset($_POST['register'])){
	

	$q = "select * from user where email = '$_POST[email]'";
	$sql = mysqli_query($conn,$q);
	$res = mysqli_fetch_array($sql);
	if(!mysqli_affected_rows($conn)){
		$q = "insert into user values('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[phone]')";
		mysqli_query($conn,$q) or die("Error");
		echo '<script>alert("User Registered Successfully")</script>';
	}else
		echo '<script>alert("User Already Registered")</script>';
}
if(isset($_POST['login'])){
	
	

	$q = "select * from user where email = '$_POST[email]' and password = '$_POST[password]' ";
	$sql = mysqli_query($conn,$q);
	$res = mysqli_fetch_array($sql);
	if(!mysqli_affected_rows($conn)){
		echo '<script>alert("User Not Registered")</script>';
	}else{
		$_SESSION['USER'] = $_POST['email'];
		echo '<script>window.location = "LangaugePage.php"</script>';
		
	}
}

?>
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>
</head>
<body>
<div style="padding:15px;" id = "outer">
<div class = "container">
<center>
<p class = "headingtext">Login | Register</p>
</center>
<br/><br/>
<button type = "button"  onclick  = "javascript:login('panel1')" >Login...</button><br/>
<br/><br/>
<p class = "whitetext" style="margin-left:10px">If you have not yet Registered. Please Register first</p>

<button type = "button" onclick  = "javascript:login('panel2')" >Register...</button>

</div>


<div>
<img src = "images/qoutesheadphone.jpg" style="float:right;height:80%;width:45%;border-radius:10px;"/>
</div>



</div>
<br/>



<div class = "panel" id = "panel1">
<span class="close" onclick="javascript:closeit('panel1')">&times;</span>

<center>

<p class = "headingtext" style="color:black">Login</p>

<hr/>
<form action  ="" method = "post">
	<input type="email" name = "email" placeholder = "Email......."/><br/>
	<input type="password" name= "password" placeholder = "Password...."/><br/>
	<input  type="submit" value = "Login" name =  "login"/>
	</form>
</center>
</div>





<div class = "panel" id = "panel2">

<span class="close" onclick="javascript:closeit('panel2')">&times;</span>

<center>
<p class = "headingtext" style="color:black">Register</p>
</center>

<form action  ="" method = "post" >
	<input type="text" name= "name" placeholder = "Name...."required />
	
	<input type="email" name = "email"  placeholder = "Email......." required />
	<input type="password" name= "password" placeholder = "Password...."required />
	
	<input type="number" name = "phone"  placeholder = "Phone Number......."required />
	<center>
	<input  type="submit" value = "Register" name = "register"/>
	
	</center>
	</form>

</div>

<script type="text/javascript">
function login(id){
	
	document.getElementById(id).style.display = 'block';
	document.getElementById('outer').style.filter = 'blur(5px)';
	
}
function closeit(id){
	
	document.getElementById(id).style.display = 'none';
	
	document.getElementById('outer').style.filter = 'blur(0px)';
}

</script>


</body>
</html>
<?php
include("footer.html");
?>