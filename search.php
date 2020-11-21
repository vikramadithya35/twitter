<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body style="background:url('s.jpg');">
<h1 style="z-index:105;position:fixed;top:0%;left:45%;text-transform:uppercase;color:deepskyblue;"><i class="fa fa-twitter" aria-hidden="true" style="width:55px;z-index:105;position:fixed;top:30px;left:45%;font-size:50px;"></i></h1>
    <div style="position:fixed;top:0;left:0;width:100%;height:100px;background:white;z-index:101;"></div>
<a href="home.php" style="color:black;z-index:105;position:fixed;top:30px;right:400px;font-size:40px;color:black;text-transform:uppercase;text-decoration:none;padding:5px;"><i class="fa fa-home" aria-hidden="true"></i></a>
<a href="search.php" style="border-bottom:2px solid black;z-index:105;color:deepskyblue;"><i class="fa fa-search" aria-hidden="true" style="width:40px;z-index:105;position:fixed;top:38px;right:315px;font-size:40px;"></i></a>
<a href="notif.php" style="z-index:105;position:fixed;top:30px;right:220px;font-size:40px;color:black;text-transform:uppercase;text-decoration:none;padding:5px;"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
<a href="tweets.php" style="z-index:105;color:black;"><i class="fa fa-envelope-o" aria-hidden="true" style="width:40px;z-index:105;position:fixed;top:38px;right:130px;font-size:40px;"></i></a>
    
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<input type="text" name="search" placeholder="search twitter" style="margin:100px 0px 0px 0px;position:absolute;top:20px;left:30%;width:250px;height:20px;padding:10px;border-radius:30px;border:2px solid black;outline:none;">
<input type="submit" name="submit" value="search" style="margin:100px 0px 0px 0px;position:absolute;top:20px;left:50%;width:100px;height:40px;border:2px solid black;border-radius:10px;color:black;font-size:20px;">
</form>
<?php
session_start();
if(isset($_POST['submit'])){
    $u=$_SESSION["name"];
    $sname=$_POST['search'];
    if($sname!=''){
        $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
        $query="select * from tusers where uname like '$sname%'";
        $run=mysqli_query($conn,$query);
        $nr=mysqli_num_rows($run);
        $query1="select * from tusers where uname='$u'";
        $run1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_assoc($run1);
        $uid=$row1["uid"];
        while($row=mysqli_fetch_assoc($run)){
        $id=$row['uid'];    
        $n=$row['uname'];
        $p=$row['pic'];
        echo "<div style='margin:200px 0px -190px 430px;width:250px;border-radius:20px;height:90px;background:white;'>";
        echo "<a href='$p'><img src='$p' style='margin:10px;width:50px;height:50px;border-radius:50%;'></a>";
        if($uid==$id){
            echo "<a href='home.php' style='margin:-40px 0px 20px 0px;text-align:center;text-decoration:none;font-size:20px;color:red;'>$n</a>";
        }
        else if($uid!=$id){
        echo "<a href='view.php?id=$id' style='margin:-40px 0px 20px 0px;text-align:center;text-decoration:none;font-size:20px;color:red;'>$n</a>";
        }
        else if($nr==0){
            echo "<h3 style='position:absolute;top:40%;left:30%;color:black;'>no records found</h3>";
        }
        echo "</div>";
    }
    }
}
?>
</body>
</html>