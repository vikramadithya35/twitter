<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:url('49.jpg');background-position:center;background-repeat:no-repeat;">>
    <form action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
    <input type="text" name="uname" placeholder="username" style="position:absolute;top:10%;left:30%;width:250px;padding:10px;border:3px solid black;border-radius:10px;">
    <input type="password" name="password" placeholder="password" style="position:absolute;top:20%;left:30%;width:250px;padding:10px;border:3px solid black;border-radius:10px;">
        <input type="text" name="email" placeholder="email" style="position:absolute;top:45%;left:30%;width:250px;padding:10px;border:3px solid black;border-radius:10px;">
        <textarea name="bio" id="" cols="30" rows="3" placeholder="bio" style="position:absolute;top:30%;left:30%;width:250px;padding:10px;border:3px solid black;border-radius:10px;"></textarea>
        <input type="file" name="image" style="position:absolute;top:55%;left:30%;background:blue;z-index:100;">
        <input type="submit" value="submit" name="submit" style="position:absolute;top:65%;left:35%;color:white;font-size:20px;width:100px;border-radius:10px;height:50px;border:2px solid white;background:green;">
        </form>
</body>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['uname'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $bio=$_POST['bio'];
    $filename = $_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];

    $folder =  "pic/".$filename;

    move_uploaded_file($tempname,$folder);
    if($name!=''||$password!=''){
        $conn = mysqli_connect("localhost","root","","tweet") or die("connection failed");
        $query= "insert into tusers (uname,password,bio,email,pic)values('$name','$password','$bio','$email','$folder')";
        $run=mysqli_query($conn,$query);
        if($run){
            header("location: http://localhost/twitter/login.php");
        }
        else{
            echo "<script>alert('registration failed');</script>";
        }

    }

    
}
?>
</html>