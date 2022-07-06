<?php 

$host="localhost";
$user="root";
$pass="";
$db="data";
$con=mysqli_connect($host,$user,$pass,$db);
if($con)
{
    echo "success connection";
}
else
{
    echo "fail connection";
}
?>