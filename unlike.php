<?php
session_start();
$fname=$_SESSION["name"];
$name=$_GET["id"];
$about=$_GET["about"];
$conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
$query="delete from likes where uname='$fname' and lname='$name' and topic='$about'";
$run=mysqli_query($conn,$query);
header("location: http://localhost/twitter/notif.php");
?>