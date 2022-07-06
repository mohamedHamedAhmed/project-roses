<?php 
$host="localhost";
$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);
    //$host=$_POST["host"];
    $date=$_POST["date"];
    $age=$_POST["age_of_vaccines"];
    $type=$_POST["type_of_vaccines"];
    $method =$_POST["method_of_vaccines"];
    $company=$_POST["company"];
    $notes=$_POST["notes"];
    
$d=mysqli_real_escape_string($con,$date);
$a=mysqli_real_escape_string($con,$age);
$t=mysqli_real_escape_string($con,$type);
$m=mysqli_real_escape_string($con,$method);
$c=mysqli_real_escape_string($con,$company);
$n=mysqli_real_escape_string($con,$notes);
    $sql="insert into vaccines values('','$d','$a',' $t',' $m','$c','$n','','')";
    
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
        $query ='select * from vaccines';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>date</th>
          <th> age_of_vaccines</th>
          <th>type_of_vaccines </th>
          <th>method_of_vaccines </th>
          <th> company</th>
          <th> notes</th>';
         while( $row = mysqli_fetch_row($result)){
          echo '<tr>
          
          <td>'.$row[1].'</td>
          <td>'.$row[2].'</td>
          <td>'.$row[3].'</td>
          <td>'.$row[4].'</td>
          <td>'.$row[5].'</td>
          <td>'.$row[6].'</td>
          
         </tr> ';
         }
        }else{
            die('er');
        };
        };
        
        if(isset($_POST['delete'])){
            $name = $_POST['dell'];
        $query="delete from vaccines where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }

?>