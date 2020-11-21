<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body style="background:url(se.jpg);">
    <div style="position:fixed;top:0;left:0;width:100%;height:100px;background:white;opacity:0.7;"></div>
    <i class="fa fa-cogs" aria-hidden="true" style="color:black;width:40px;z-index:105;position:fixed;top:38px;left:130px;font-size:40px;"></i>
 <a href="home.php"><i class="fa fa-times" aria-hidden="true" style="color:deepskyblue;width:40px;z-index:105;position:fixed;top:38px;right:130px;font-size:40px;"></i></a>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
<label style="position:absolute;top:130px;left:30px;color:white;font-size:22px;">bio</label>
<textarea name="bio" cols="35" rows="7" placeholder="about" style="position:absolute;top:170px;left:30px;border:1px solid black;border-radius:10px;"></textarea>
<label style="position:absolute;top:300px;left:30px;color:white;font-size:22px;">profile image</label>
<input type="file" name="image" style="position:absolute;top:350px;left:30px;width:90px;height:50px;">
<input type="submit" name="update" value="update" style="position:absolute;top:400px;left:30px;width:100px;height:50px;background:lime;outline:none;color:white;font-size:20px;border:1px solid white;border-radius:10px;">
</form>
<?php
session_start();
$fname=$_SESSION["name"];
if(isset($_POST['update'])){
    $bio=$_POST["bio"];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    if($filename!=''){
    $folder =  "set/".$filename;
    move_uploaded_file($tempname,$folder);
    }
    $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
    if($bio=='' && $folder==''){
        $query="update tusers set uname='$pname' where uname='$fname'";
        mysqli_query($conn,$query);
    }
    else if($bio!='' && $folder==''){
        $query1="update tusers set bio='$bio' where uname='$fname'";
        mysqli_query($conn,$query1);
    }
    else if($bio=='' && $folder!=''){
        $query2="update tusers set pic='$folder' where uname='$fname'";
        mysqli_query($conn,$query2);
    }
    else if($bio!='' && $folder==''){
        $query3="update tusers set uname='$pname',bio='$bio' where uname='$fname'";
        mysqli_query($conn,$query3);
    }
    else if($bio!='' && $folder!=''){
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder =  "set/".$filename;
    move_uploaded_file($tempname,$folder);
        $query4="update tusers set bio='$bio',pic='$folder' where uname='$fname'";
        mysqli_query($conn,$query4);
    }
    else if($bio=='' && $folder!=''){
        $query5="update tusers set uname='$pname',pic='$folder' where uname='$fname'";
        mysqli_query($conn,$query5);
    }
    else if($bio!='' && $folder!=''){
        $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder =  "set/".$filename;
    move_uploaded_file($tempname,$folder);
        $query6="update tusers set uname='$pname',bio='$bio',pic='$folder' where uname='$fname'";
        mysqli_query($conn,$query6);
    }
    header("location: http://localhost/twitter/home.php");
}








?>


</body>
</html>