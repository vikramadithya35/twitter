<?php
session_start();
$fname=$_SESSION["name"];
$id=$_GET["id"];
$conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
$query="select * from tusers where uid='$id'";
$run=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($run);
$name=$row["uname"];
$query1="select * from following where uname='$fname' and following='$name'";
$run1=mysqli_query($conn,$query1);
$nr=mysqli_num_rows($run1);
if($nr==0){
$query2="insert into following (uname,following) values ('$fname','$name')";
$query3="insert into follow (uname,followers) values('$name','$fname')";
$run2=mysqli_query($conn,$query2);
$run3=mysqli_query($conn,$query3);
if($run2){
      header("location: http://localhost/twitter/view.php?id=$id");
}
else{
    echo "<script>alert('something went wrong!');</script>";
}
}
?>