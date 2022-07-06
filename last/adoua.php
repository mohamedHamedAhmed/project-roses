<?php 

$host="localhost";
$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);
    //$host=$_POST["host"];
    $to_day=$_POST["to_day"];
    $item=$_POST["item"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $notes=$_POST["notes"];

$to=mysqli_real_escape_string($con,$to_day);
$i=mysqli_real_escape_string($con,$item);
$p=mysqli_real_escape_string($con,$price);
$q=mysqli_real_escape_string($con,$quantity);
$n=mysqli_real_escape_string($con,$notes);

    $sql="insert into pharmaceutical values('','$to','$i','$p','$q','$n','','')";
    
    if(mysqli_query($con,$sql))
    {
    
/*     $res=mysqli_fetch_array($r,MYSQLI_ASSOC);
    
    //if(mysqli_num_rows($r)>0)
     */

    $alert = "<script>alert('تم التسجيل بنجاح')</script>";
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
        $query ='select * from pharmaceutical';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>to_day</th>
          <th> item</th>
          <th>price </th>
          <th>quantity </th>
        
          <th> notes</th>';
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
        $query="delete from pharmaceutical where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }

?>