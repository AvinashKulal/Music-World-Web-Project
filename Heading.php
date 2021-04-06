
<html>
<head>
<link rel = "stylesheet" href = "style.css"/>
<script type="text/javascript">

function closeit(id){
	document.getElementById(id).style.display = 'none';
	
	
}

function showAction(){
	document.getElementById('panel').style.display = 'block';
}

</script>
<style type = "text/css">

</style>
</head>
<body id="main">


<div class = "panel" style="background-color:#fff;padding:70px;padding-top;" id = 'panel'>
<center><span class  = "whitetext playtext" style="color:blue;">ABOUT US</span></center>
<span class="close" onclick="javascript:closeit('panel')">&times;</span>
<div class = "boxer">
<img src = "" alt = "Developer 2 " style = "float:left;padding:2px;margin-right:10px" width = "200px" height = "170px"/>
<span class = "whitetext lightext">Name : </span><br/>
<span class = "whitetext lightext">Email : </span><br/>
<span class = "whitetext lightext">College :</span>
	
	<br/><br/><br/><br/><br/><br/>



</div><br/>
<div class = "boxer">
<img src = "" alt = "Developer 1" style = "float:left;padding:2px;margin-right:10px"  width = "200px" height = "170px"/>
<span class = "whitetext lightext">Name : </span><br/>
<span class = "whitetext lightext">Email : </span><br/>
<span class = "whitetext lightext">College :</span>
</div>
</div>

<div >


<img src = "images/spiker.jpg" height="20%" width="100%"/>


<div class = "menu">
<nav>
<?php
if(isset($_SESSION['USER'])){
	?>
<a href = "LangaugePage.php" class = "menu-text">SELECT LANGUAGE</a>

<a href = "AllSongs.php?id=3" class = "menu-text">FAVOURITE SONGS</a>
<a href = "AddFavorite.php" class = "menu-text">ADD/REMOVE FAVOURITE</a>
<a href = "logout.php" style="float:right" class = "menu-text">LOGOUT</a>
<?php }
?>


<span onclick = "showAction()" style="float:right;cursor:pointer;" class = "menu-text">ABOUT US</span>
</nav>
</div>


</div>


<hr/>
</body>
</html>











