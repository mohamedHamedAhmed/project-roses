<?php 

$host="localhost";

$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);


    //$host=$_POST["host"];
    $daily=$_POST["daily"];
    $sale=$_POST["sale_and_injection"];
    $supervisor=$_POST["supervisor"];
    $maintenance=$_POST["maintenance"];
$d=mysqli_real_escape_string($con,$daily);
$s=mysqli_real_escape_string($con,$sale);
$u=mysqli_real_escape_string($con,$supervisor);
$m=mysqli_real_escape_string($con,$maintenance);

    $sql="insert into employment values('','$d','$s','$u','$m','')";
    
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
    }
    if(isset($_POST['show'])){

        if($con){
            echo 'connected';
        }else{
            die('error');
        }
        $query ='select * from employment';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>daily</th>
          <th>sale_and_injection</th>
          <th>supervisor </th>
          <th>maintenance</th>
         
          ';
         while( $row = mysqli_fetch_row($result)){
          echo '<tr>
          
          <td>'.$row[1].'</td>
          <td>'.$row[2].'</td>
          <td>'.$row[3].'</td>
          <td>'.$row[4].'</td>
        
         </tr> ';
         }
        }else{
            die('er');
        };
        };
        
        if(isset($_POST['delete'])){
            $name = $_POST['dell'];
        $query="delete from employment where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }

?>