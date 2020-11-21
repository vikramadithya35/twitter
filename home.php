<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
</head>
<body style="background:url('back.jpg');background-repeat:no-repeat;background-position:top;z-index:-10;">
<h1 style="z-index:105;position:fixed;top:0%;left:45%;text-transform:uppercase;color:deepskyblue;"><i class="fa fa-twitter" aria-hidden="true" style="width:55px;z-index:105;position:fixed;top:30px;left:45%;font-size:50px;"></i></h1>
    <div style="position:fixed;top:0;left:0;width:100%;height:100px;background:white;z-index:101;"></div>
<a href="home.php" style="z-index:105;position:fixed;top:30px;right:400px;font-size:40px;color:deepskyblue;text-transform:uppercase;text-decoration:none;padding:5px;"><i class="fa fa-home" aria-hidden="true"></i></a>
<a href="search.php" style="z-index:105;color:black;"><i class="fa fa-search" aria-hidden="true" style="width:40px;z-index:105;position:fixed;top:38px;right:315px;font-size:40px;"></i></a>
<a href="notif.php" style="z-index:105;position:fixed;top:30px;right:220px;font-size:40px;color:black;text-transform:uppercase;text-decoration:none;padding:5px;"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
<a href="tweets.php" style="z-index:105;color:black;"><i class="fa fa-envelope-o" aria-hidden="true" style="width:40px;z-index:105;position:fixed;top:38px;right:130px;font-size:40px;"></i></a>
    
    <a href="tweet.php" style="position:absolute;top:60%;left:80%;z-index:100;width:50px;height:50px;border-radius:50%;background:#00acee;text-decoration:none;text-align:center;justify-content:center;font-size:50px;padding:10px;color:white;"><i class="fa fa-pagelines" aria-hidden="true"></i></a>
    <a href="settings.php" style="position:absolute;top:440px;left:800px;height:30px;width:120px;border:1px solid black;border-radius:30px;background:white;text-decoration:none;text-align:center;color:black;font-size:20px;">set up profile</a>
    <?php
    session_start();
    $name=$_SESSION['name'];
    $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
    $query="select * from tusers where uname='$name'";
    $run=mysqli_query($conn,$query);
    $query1="select followers from follow where uname='$name'";
    $run1=mysqli_query($conn,$query1);
    $nf=mysqli_num_rows($run1);
    $query2="select following from following where uname='$name'";
    $run2=mysqli_query($conn,$query2);
    $np=mysqli_num_rows($run2);
    $row=mysqli_fetch_assoc($run);
    $uname=$row['uname'];
    $pic=$row["pic"];
    $bio=$row["bio"];
    echo "<div style='border:2px solid black;position:absolute;top:8%;left:23%;width:573px;margin:50px;height:80%;background:white;z-index:-3;'>";
    echo "<a href='$pic'><img src='$pic' style='position:absolute;top:10px;left:1.5%;width:550px;height:300px;border:2px solid blue;'></a>";
    echo "<a href='$pic'><img src='$pic' style='position:absolute;top:280px;left:3%;width:100px;height:100px;border:5px solid black;border-radius:50%;'></a>";
    echo "<h2 style='position:absolute;top:380px;left:2%;color:black;font-weight:bold;'>$uname</h2>";
    echo "<h3 style='position:absolute;top:420px;left:2%;color:grey;'>$bio</h3>";
    echo "</div>";
    if($nf!=0){
        echo "<a href='followers.php?name=$name'><h2 style='position:absolute;top:500px;left:47%;'>followers $nf</h2></a>";
    }
    else if($nf==0){
        echo "<h2 style='position:absolute;top:500px;left:47%;'>followers 0</h2>";
    }
    if($np!=0){
        echo "<a href='following.php?name=$name'><h2 style='position:absolute;top:500px;left:58%;'>following $np</h2>";
    }
    else if($np==0){
        echo "<h2 style='position:absolute;top:500px;left:58%;'>following 0</h2>";
    }

    ?>
</body>
</html>