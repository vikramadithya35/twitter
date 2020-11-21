<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:url('logo.jpg');background-position:-100px -50px;background-repeat:no-repeat;">
    <h1 style="position:absolute;top:0;left:40%;font-size:40px;font-weight:1000;text-transform:uppercase;">twitter</h1>
    <form action=" <?php $_SERVER['PHP_SELF'] ?> " method="post" style="position:absolute;top:30%;left:30%;">
     <input type="text" name="username" placeholder="username" style="width:250px;padding:10px;border:2px solid black;border-radius:10px;">
     <input type="password" name="password" placeholder="password" style="position:absolute;top:70px;left:0px;width:250px;padding:10px;border:2px solid black;border-radius:10px;">
     <input type="submit" name="submit" value="login" style="font-size:30px;position:absolute;top:140px;left:80px;width:100px;padding:0px;background:blue;border:2px solid red;border-radius:10px;color:white;">
     <a href="register.php" style="position:absolute;left:80px;top:190px;color:red;font-size:30px;">register?</a>
    </form>
<?php
session_start();
if(isset($_POST['submit'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];
    if($uname!=''||$password!=''){
        $_SESSION['name']=$uname;
        $conn=mysqli_connect("localhost","root","","tweet") or die("connection failed");
        $query="select * from tusers where uname='$uname' and password='$password'";
        $run=mysqli_query($conn,$query);
        $nrows=mysqli_num_rows($run);
        if($nrows==1){
            header("location: http://localhost/twitter/home.php");
        }
        else{
            echo "<script>alert('invalid username and password');</script>";
        }
    }
}
?>
</body>
</html>