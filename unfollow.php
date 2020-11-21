<?php
session_start();
$fname=$_SESSION["name"];
$id=$_GET["id"];
$conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
$query="select * from tusers where uid='$id'";
$run=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($run);
$name=$row["uname"];
$query1="delete from follow where uname='$name' and followers='$fname'";
$run1=mysqli_query($conn,$query1);
$query2="delete from following where uname='$fname' and following='$name'";
$run2=mysqli_query($conn,$query2);
if($run1 && $run2){
    header("location: http://localhost/twitter/view.php?id=$id");
}

?>