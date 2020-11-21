<?php
session_start();
$fname=$_SESSION["name"];
$name=$_GET["id"];
$about=$_GET["about"];
$conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
$query="insert into likes (uname,lname,topic) values ('$fname','$name','$about')";
$run=mysqli_query($conn,$query);
header("location: http://localhost/twitter/notif.php");
?>