<?php
include("connection.php");
session_destroy();
echo "<script>window.location ='HomePage.php'</script>";
?>