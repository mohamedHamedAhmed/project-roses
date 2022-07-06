<?php 
$host="localhost";

$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');
//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);
    //$host=$_POST["host"];
    $day=$_POST["to_day"];
    $date=$_POST["date"];
    $number=$_POST["number_of_dead"];
    $virus=$_POST["virus_related"];

$d=mysqli_real_escape_string($con,$day);
$da=mysqli_real_escape_string($con,$date);
$n=mysqli_real_escape_string($con,$number);
$v=mysqli_real_escape_string($con,$virus);
    $sql="insert into thedead values('','$d','$da',' $n',' $v','')";

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
        $query ='select * from thedead';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>to_day</th>
          <th> date</th>
          <th>number_of_dead </th>
          <th>virus_related</th>
        
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
        $query="delete from thedead where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }

?>