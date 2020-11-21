<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body style="background:url(se.jpg);">
<h1 style="position:absolute;top:0;left:45%;text-transform:uppercase;color:black;z-index:200;">tweets</h1>
    <div style="position:fixed;top:0;left:0;width:100%;height:100px;background:white;opacity:1;"></div>
    <i class="fa fa-asterisk" aria-hidden="true" style="color:green;width:40px;z-index:105;position:fixed;top:38px;left:130px;font-size:40px;"></i>
 <a href="home.php"><i class="fa fa-times" aria-hidden="true" style="color:deepskyblue;width:40px;z-index:105;position:fixed;top:38px;right:130px;font-size:40px;"></i></a>  
</body>
<?php
session_start();
$fname=$_SESSION["name"];
$name=$_GET["name"];
$conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
$query="select * from userpost where pname='$name'";
$run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($run)){
    $about=$row["post"];
    $img=$row["img"];
    $time=$row["time"];
    $query1="select * from tusers where uname='$fname'";
    $run1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($run1);
    $pic=$row1["pic"];
    $query1="select * from comments where uname='$fname' and cname='$name' and topic='$about'";
      $run1=mysqli_query($conn,$query1);
      $nc=mysqli_num_rows($run1);
      $query3="select * from likes where uname='$fname' and lname='$name' and topic='$about'";
      $run3=mysqli_query($conn,$query3);
      $nl=mysqli_num_rows($run3);
      $query4="select * from comments where cname='$name' and topic='$about'";
      $run4=mysqli_query($conn,$query4);
      $nic=mysqli_num_rows($run4);
      $query5="select * from likes where lname='$name' and topic='$about'";
      $run5=mysqli_query($conn,$query5);
      $nil=mysqli_num_rows($run5);
      $query6="select * from tusers where uname='$name'";
      $run6=mysqli_query($conn,$query6);
      $row6=mysqli_fetch_assoc($run6);
      $id=$row6["uid"];
          echo "<div style='margin:110px 0px -109px 50px;width:400px;height:290px;background:white;opacity:0.8;border:1px solid black;border-radius:1px;'>";
          echo "<a href='$pic'><img src='$pic' style='width:50px;height:50px;border-radius:50%;padding:5px;'></a>";
          echo "<a href='view.php?id=$id' style='text-decoration:none;'><h2 style='margin:-60px 0px 0px 70px;'>$name</h2></a>";
          echo "<h3 style='margin:10px 0px 0px 70px;'>$about</h3>";
          echo "<img src='$img' style='margin:8px 0px 0px 70px;width:280px;height:130px;border:2px solid black;border-radius:20px;'></>";
          echo "<h4 style='margin:-200px 0px 0px 250px;color:red;'>$time</h4>";
         
          if($nc==0 && $nl==0){
          echo "<a href='comment.php?id=$name&about=$about'><i class='fa fa-comment-o' aria-hidden='true' style='margin:200px 0px 0px 80px;color:black;font-size:20px;'></i></a>";
          echo "<a href='like.php?id=$name&about=$about'><i class='fa fa-heart' aria-hidden='true' style='margin:200px 0px 0px 185px;color:grey;font-size:20px;'></i></a>";
          echo "<h4 style='margin:-18px 0px 50px 115px;color:black;'>$nic</h4>";
          echo "<h4 style='margin:-70px 0px 50px 320px;color:black;'>$nil</h4>";
          echo "<a href='viewcomments.php?cname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-40px 0px 50px 80px;color:black;'>view all $nic comments</h4></a>";
          echo "<a href='viewlikes.php?lname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-70px 0px 50px 270px;color:black;'>view all $nil likes</h4></a>";
          
          }
          else if($nc!=0 && $nl!=0){
            echo "<i class='fa fa-comment-o' aria-hidden='true' style='margin:200px 0px 0px 80px;color:lime;font-size:20px;'></i></>";
            echo "<a href='unlike.php?id=$name&about=$about'><i class='fa fa-heart' aria-hidden='true' style='margin:180px 0px 0px 185px;color:red;black;font-size:20px;'></i></a>";
            echo "<h4 style='margin:-18px 0px 50px 115px;color:black;'>$nic</h4>";
            echo "<h4 style='margin:-70px 0px 50px 320px;color:black;'>$nil</h4>";
            echo "<a href='viewcomments.php?cname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-40px 0px 50px 80px;color:black;'>view all $nic comments</h4></a>";
            echo "<a href='viewlikes.php?lname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-70px 0px 50px 270px;color:black;'>view all $nil likes</h4></a>";
          
        }
          else if($nc!=0 && $nl==0){
            echo "<i class='fa fa-comment-o' aria-hidden='true' style='margin:200px 0px 0px 80px;color:lime;font-size:20px;'></i></a>";
            echo "<a href='like.php?id=$name&about=$about'><i class='fa fa-heart' aria-hidden='true' style='margin:180px 0px 0px 185px;color:grey;font-size:20px;'></i></a>";
            echo "<h4 style='margin:-18px 0px 50px 115px;color:black;'>$nic</h4>";
            echo "<h4 style='margin:-70px 0px 50px 320px;color:black;'>$nil</h4>";
            echo "<a href='viewcomments.php?cname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-40px 0px 50px 80px;color:black;'>view all $nic comments</h4></a>";
            echo "<a href='viewlikes.php?lname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-70px 0px 50px 270px;color:black;'>view all $nil likes</h4></a>";
            
        } 
          else if($nc==0 && $nl!=0){
            echo "<a href='comment.php?id=$name&about=$about'><i class='fa fa-comment-o' aria-hidden='true' style='margin:200px 0px 0px 80px;color:black;font-size:20px;'></i></a>";
            echo "<a href='unlike.php?id=$name&about=$about'><i class='fa fa-heart' aria-hidden='true' style='margin:180px 0px 0px 185px;color:red;black;font-size:20px;'></i></a>";
            echo "<h4 style='margin:-18px 0px 50px 115px;color:black;'>$nic</h4>";
            echo "<h4 style='margin:-70px 0px 50px 320px;color:black;'>$nil</h4>";
            echo "<a href='viewcomments.php?cname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-40px 0px 50px 80px;color:black;'>view all $nic comments</h4></a>";
          echo "<a href='viewlikes.php?lname=$name&topic=$about' style='text-decoration:none;'><h4 style='margin:-70px 0px 50px 270px;color:black;'>view all $nil likes</h4></a>";
          
        }
 
          echo "</div>";
      }





?>
</html>