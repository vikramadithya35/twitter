<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:url('t.jpg');background-repeat:no-repeat;background-position:top;z-index:-10;background-size:100% 1000%;">
<div style="display:block;top:30px;">
<a href="home.php" style="top:20px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">home</a>
<a href="search.php" style="position:absolute;top:70px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:blue;color:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">search</a>
<a href="notif.php" style="position:absolute;top:130px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">notifications</a>
<a href="tweets.php" style="position:absolute;top:190px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">tweets</a>
</div>
<a href="follow.php?id=" style="position:absolute;top:440px;left:850px;height:30px;width:100px;border:1px solid black;border-radius:30px;background:white;text-decoration:none;text-align:center;color:black;font-size:20px;">follow</a>
<?php
session_start();
$fname=$_SESSION["name"];
    $uid=$_GET['id'];
    $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
    $query="select * from tusers where uid='$uid'";
    $run=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($run);
    $name=$row["uname"];
    $pic=$row["pic"];
    $bio=$row["bio"];
    $query1="select followers from follow where uname='$name'";
    $run1=mysqli_query($conn,$query1);
    $nf=mysqli_num_rows($run1);
    $query2="select * from following where uname='$name'";
    $run2=mysqli_query($conn,$query2);
    $np=mysqli_num_rows($run2);
    $query3="select * from following where uname='$fname' and following='$name'";
    $run3=mysqli_query($conn,$query3);
    $n=mysqli_num_rows($run3);
    echo "<div style='position:absolute;top:10px;left:23%;width:728px;height:90%;background:white;z-index:-3;'>";
    echo "<a href='$pic'><img src='$pic' style='position:absolute;top:10px;left:1.5%;width:700px;height:400px;border:2px solid blue;'></a>";
    echo "<a href='$pic'><img src='$pic' style='position:absolute;top:370px;left:3%;width:100px;height:100px;border:5px solid black;border-radius:50%;'></a>";
    echo "<h2 style='position:absolute;top:470px;left:2%;color:black;font-weight:bold;'>$name</h2>";
    echo "<h3 style='position:absolute;top:510px;left:2%;color:grey;'>$bio</h3>";
    echo "</div>";
    if($nf!=0){
        echo "<a href='followers.php?name=$name'><h2 style='position:absolute;top:480px;left:50%;'>followers $nf</h2></a>";
    }
    else if($nf==0){
        echo "<h2 style='position:absolute;top:480px;left:50%;'>followers 0</h2>";
    }
    if($np!=0){
        echo "<a href='following.php?name=$name'><h2 style='position:absolute;top:480px;left:63%;'>following $np</h2></a>";
    }
    else if($np==0){
        echo "<h2 style='position:absolute;top:480px;left:63%;'>following 0</h2>";
    }
    if($n==1){
        echo "<a href='unfollow.php?id=$uid' style='position:absolute;top:440px;left:850px;height:30px;width:100px;border:1px solid black;border-radius:30px;background:white;text-decoration:none;text-align:center;color:white;font-size:20px;color:black;'>following</a>";
    }
    else if($n==0){
    echo "<a href='follow.php?id=$uid' style='position:absolute;top:440px;left:850px;height:30px;width:100px;border:1px solid black;border-radius:30px;background:deepskyblue;text-decoration:none;text-align:center;color:white;font-size:20px;'>follow</a>";
    }
    echo "<a href='viewtweets.php?name=$name' style='position:absolute;top:82%;left:60%;color:white;text-decoration:none;text-transform:uppercase;font-size:20px;width:100px;height:30px;background:#3b5998;text-align:center;padding:5px;border:1px solid black;border-radius:5px;'>tweets</a>";
    ?>
</body>
</html>