<?php 

$host="localhost";
$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);
    //$host=$_POST["host"];
    $date=$_POST["date"];
    $todate=$_POST["todate"];
    $feedcompany=$_POST["feedcompany"];
    $total=$_POST["total"];
    $notes=$_POST["notes"];
$d=mysqli_real_escape_string($con,$date);
$date=mysqli_real_escape_string($con,$todate);
$f=mysqli_real_escape_string($con,$feedcompany);
$to=mysqli_real_escape_string($con,$total);
$n=mysqli_real_escape_string($con,$notes);

    $sql="insert into feedconsumption values('','$d','$date','$f','$to','$n','')";
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
        $query ='select * from feedconsumption';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>date</th>
          <th> todate</th>
          <th>feedcompany </th>
          <th>total</th>
          <th>notes</th>
        
          ';
         while( $row = mysqli_fetch_row($result)){
          echo '<tr>
          
          <td>'.$row[1].'</td>
          <td>'.$row[2].'</td>
          <td>'.$row[3].'</td>
          <td>'.$row[4].'</td>
          <td>'.$row[5].'</td>
     
         </tr> ';
         }
        }else{
            die('er');
        };
        };
        
        if(isset($_POST['delete'])){
            $name = $_POST['dell'];
        $query="delete from feedconsumption where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }
?>