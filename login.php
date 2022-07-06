<?php
include ("conn.php");

if(isset($_POST['loginbun'])){

$email=$_POST["email"];
$password=$_POST["password"];

$e=mysqli_real_escape_string($con,$email);
$p=mysqli_real_escape_string($con,$password);

$pp=md5($p);
$sql="select * from login where email='$e'and password='$pp'";

$r=mysqli_query($con,$sql);

$res=mysqli_fetch_array($r,MYSQLI_ASSOC);

if(mysqli_num_rows($r)>0){

   header("location:poultry company.html");
  
}else{

  echo("yes");
};
};
?>