<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body style="background:url(se.jpg);">
<h1 style="position:absolute;top:0;left:40%;text-transform:uppercase;color:white;z-index:200;">comments</h1>
    <div style="position:fixed;top:0;left:0;width:100%;height:100px;background:white;opacity:0.7;"></div>
    <i class="fa fa-comments-o" aria-hidden="true" style="color:black;width:40px;z-index:105;position:fixed;top:38px;left:130px;font-size:40px;"></i>
 <a href="notif.php"><i class="fa fa-times" aria-hidden="true" style="color:deepskyblue;width:40px;z-index:105;position:fixed;top:38px;right:130px;font-size:40px;"></i></a>  
</body>
<?php
$cname=$_GET["cname"];
$topic=$_GET["topic"];
$conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
$query="select * from comments where cname='$cname' and topic='$topic'";
$run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($run)){
    $fname=$row["uname"];
    $comment=$row["comment"];
    $query1="select * from tusers where uname='$fname'";
    $run1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($run1);
    $id=$row1["uid"];
    $pic=$row1["pic"];
    echo "<div style='margin:120px 0px -120px 50px;width:400px;height:100px;background:white;border:1px solid;'>";
    echo "<a href='view.php?id=$id' style='text-decoration:none;'><h2 style='color:deepskyblue;margin:5px 0px 0px 80px;'>$fname</h2>";
    echo "<a href='$pic'><img src='$pic' style='margin:-20px 0px 20px 10px;width:50px;height:50px;border-radius:50%;'></a>";
    echo "<h4 style='margin:-40px 0px 0px 80px;'>$comment</h4>";
    echo "</div>";
    
}




?>
</html>