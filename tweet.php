<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:url('t.jpg');background-repeat:no-repeat;background-size:100% 1000%;background-position:top;z-index:-10;">
<div style="display:block;top:30px;">
<a href="home.php" style="top:20px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">home</a>
<a href="search.php" style="position:absolute;top:70px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">search</a>
<a href="notif.php" style="position:absolute;top:130px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">notifications</a>
<a href="tweets.php" style="position:absolute;top:190px;display:block;width:150px;height:30px;border-radius:30px;text-align:center;background:white;padding:10px;font-size:20px;text-decoration:none;text-transform:uppercase;">tweets</a>
</div>
<h1 style="position:absolute;top:0px;left:37%;text-transform:uppercase;color:white;">tweet</h1>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
  <textarea name="about" cols="50" rows="5" placeholder="what's happening?" style="position:absolute;top:70px;left:29%;border:2px solid black;border-radius:10px;"></textarea>
  <input type="file" name="image" style="position:absolute;top:200px;left:30%;">
  <input value="send" type="submit" name="post" style="position:absolute;top:250px;left:40%;width:100px;height:50px;color:white;border-radius:10px;background:deepskyblue;outline:none;font-size:20px;">


</form>
    <?php
    session_start();
    $fname=$_SESSION["name"];
    if(isset($_POST["post"])){
    $about=$_POST["about"];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder =  "tweet/".$filename;
    move_uploaded_file($tempname,$folder);
    if($about!=''){
    $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
    $query="select followers from follow where uname='$fname'";
    $run=mysqli_query($conn,$query);
    $query3="insert into userpost (pname,post,img) values ('$fname','$about','$folder')";
    mysqli_query($conn,$query3);
    $query1="select * from tusers where uname='$fname'";
    $run1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($run1);
    $pf=$row1["pic"];
    $nr=mysqli_num_rows($run);
    if($nr==0){
        $query3="insert into notifications (uname,name,pic,about,photo) values ('$fname','$fname','$pf','$about','$folder')";
        $run3=mysqli_query($conn,$query3);
        if($run3){
            echo "<h1 style='position:absolute;top:52%;left:40%;transform:translate(-50%,-50%);color:black;width:200px;height:100px;background:yellow;color:blue;border:1px solid black;border-radius:10px;'>successfully posted!</h1>";
        }
        else{
            echo "<script>alert('something went wrong!');</script>";
        }
    }
    while($row=mysqli_fetch_assoc($run)){
        $name=$row["followers"];
        $query2="insert into notifications (uname,name,pic,about,photo) values ('$name','$fname','$pf','$about','$folder')";
        $run2=mysqli_query($conn,$query2);
        if($run2){
            echo "<h1 style='position:absolute;top:52%;left:40%;transform:translate(-50%,-50%);color:black;width:200px;height:100px;background:yellow;color:blue;border:1px solid black;border-radius:10px;'>successfully posted!</h1>";
        }
        else{
            echo "<script>alert('something went wrong!');</script>";
        }
    }
}
else{
    echo "<script>alert('tweet is empty!');</script>";
}
    
    
    
    }
    ?>
</body>
</html>