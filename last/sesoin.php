<?php 

$host="localhost";

$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);


    //$host=$_POST["host"];
    
    $course=$_POST["course_start"];
    $number=$_POST["number_of_chicks"];
    $age=$_POST["age"];
    $water=$_POST["water_consumption"];
    $temperature=$_POST["temperature"];
    $average=$_POST["average_weight"];
    $conversion=$_POST["conversion_factor"];
  
$c=mysqli_real_escape_string($con,$course);
$n=mysqli_real_escape_string($con,$number);
$a=mysqli_real_escape_string($con,$age);
$w=mysqli_real_escape_string($con,$water);
$t=mysqli_real_escape_string($con,$temperature);
$av=mysqli_real_escape_string($con,$average);
$co=mysqli_real_escape_string($con,$conversion);

 
    
    $sql="insert into session values('','$c','$n',' $a',' $w','$t','$av','$co','','','','','','','')";
    
    
    if(mysqli_query($con,$sql))
    {
    
/*     $res=mysqli_fetch_array($r,MYSQLI_ASSOC);
    
    //if(mysqli_num_rows($r)>0)
     */

  $alert ="<script> alert('تم التسجيل بنجاح')</script>";
  echo $alert;
    }
    else{
        echo mysqli_error($con);
    };
    


if(isset($_POST['show'])){

if($con){
    echo 'connected';
}else{
    die('error');
}
$query ='select * from session';

$result=mysqli_query($con,$query);
if($result){
    echo '<table  border="1">
    <th>course_start</th>
  <th> number_of_chicks</th>
  <th>age </th>
  <th>water_consumption </th>
  <th> temperature</th>
  <th> average_weight</th>
  <th>conversion_factor </th>';
 while( $row = mysqli_fetch_row($result)){
  echo '<tr>
  
  <td>'.$row[1].'</td>
  <td>'.$row[2].'</td>
  <td>'.$row[3].'</td>
  <td>'.$row[4].'</td>
  <td>'.$row[5].'</td>
  <td>'.$row[6].'</td>
  <td>'.$row[7].'</td>
 </tr> ';
 }
}else{
    die('er');
};
};

if(isset($_POST['delete'])){
    $name = $_POST['dell'];
$query="delete from session where name='$name'";
$result = mysqli_query($con,$query);
if($result){
    echo 'Deleted Done';
}else{
    die('Error');
}
}
?>