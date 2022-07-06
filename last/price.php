<?php 

$host="localhost";

$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);

if (count($_POST) > 0) {
    //$host=$_POST["host"];
    $date=$_POST["date"];
    $number=$_POST["number_of_poultry"];
    $avg=$_POST["average_weight"];
    $price=$_POST["stock_price"];

    $sql="insert into sale values('','$date','$number','$avg','$price','')";
    
    $r=mysqli_query($con,$sql);
    
/*     $res=mysqli_fetch_array($r,MYSQLI_ASSOC);
    
    //if(mysqli_num_rows($r)>0)
     */

    $alert ="<script> alert('تم التسجيل بنجاح')</script>";
    echo $alert;
    
    }
    else{
        echo 'No Post';
    }

    if(isset($_POST['show'])){

        if($con){
            echo 'connected';
        }else{
            die('error');
        }
        $query ='select * from sale';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>date</th>
          <th> number_of_poultry</th>
          <th>average_weight </th>
          <th>stock_price</th>
        
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
        $query="delete from sale where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }
?>