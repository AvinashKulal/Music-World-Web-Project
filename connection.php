<?php
$dbname = 'music_world';
$user = 'root';
$host = 'localhost';

$conn = mysqli_connect($host,$user,"",$dbname);
if(mysqli_connect_error($conn)){
	die("Error");
}
session_start();

?>