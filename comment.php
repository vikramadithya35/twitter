<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body style="background:url(se.jpg);">
<h1 style="position:absolute;top:0;left:40%;text-transform:uppercase;color:white;">your comment!</h1>
    <div style="position:fixed;top:0;left:0;width:100%;height:100px;background:white;opacity:0.7;"></div>
    <a href="notif.php"><i class="fa fa-times" aria-hidden="true" style="color:black;width:40px;z-index:105;position:fixed;top:38px;left:130px;font-size:40px;"></i></a>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
<textarea name="tweet" cols="35" rows="7" placeholder="tweet your reply" style="position:absolute;top:200px;left:30px;border:1px solid black;border-radius:10px;"></textarea>
<input type="submit" value="reply" name="reply" style='position:absolute;font-size:18px;top:40px;right:200px;width:100px;border:1px solid white;border-radius:5px;height:30px;background:deepskyblue;color:white;'>
<?php
session_start();
$name=$_GET["id"];
echo "<h2 style='color:white;position:absolute;top:18%;left:3%;'>replying to $name</h2>";
if(isset($_POST["reply"])){
    $fname=$_SESSION["name"];
    $name=$_GET["id"];
    $about=$_GET["about"];
    $tweet=$_POST["tweet"];
    $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed!");
    $query="insert into comments (uname,cname,topic,comment) values ('$fname','$name','$about','$tweet')";
    $run=mysqli_query($conn,$query);
    echo "<h2 style='color:red;position:absolute;top:40%;left:30%;'>replying to $name</h2>";
    if($run){
        header("location: http://localhost/twitter/notif.php");
    }
}
?>





</body>
</html>