<?php 
$host="localhost";
$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);

    //$host=$_POST["host"];
    $date=$_POST["date"];
    $follo=$_POST["follo_wthe_farm"];
    $visit=$_POST["visit"];
    $give=$_POST["give_medicine"];
  
$d=mysqli_real_escape_string($con,$date);
$f=mysqli_real_escape_string($con,$follo);
$v=mysqli_real_escape_string($con,$visit);
$g=mysqli_real_escape_string($con,$give);

    $sql="insert into the_doctor values('','$d','$f','$v','$g')";
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
        $query ='select * from the_doctor';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>date</th>
          <th> follo_wthe_farm</th>
          <th>visit </th>
          <th>give_medicine</th>
        
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
        $query="delete from the_doctor where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }

?>