<?php
include ("conn.php");

if(isset($_POST['signupbtn'])){
$user=$_POST["user"];
$email=$_POST["email"];
$password=$_POST["password"];


$u=mysqli_real_escape_string($con,$user);
$e=mysqli_real_escape_string($con,$email);
$p=mysqli_real_escape_string($con,$password);

$pp=md5($p);
$sql="insert into login values('$u','$e','$pp')";

if(mysqli_query($con,$sql))
{
    echo "success saving";
}
else
{
    echo "fail saving";
}
}


?>