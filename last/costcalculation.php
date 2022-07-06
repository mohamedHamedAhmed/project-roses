<?php 
$host="localhost";
$db="poultarydataneme";
$con=mysqli_connect($host,'root', '','poultarydataneme') or die('not connected');

//$con=mysqli_connect($host,$data,$ofvaccines,$db,$typeofvaccines,$methodofvaccines,$company,$notes,$thedoctor,$session);
    //$host=$_POST["host"];
    $chicken=$_POST["chicken"];
    $feed=$_POST["feed"];
    $pharmaceutical=$_POST["pharmaceutical"];
    $emploies=$_POST["emploies"];
    $sawdust=$_POST["sawdust"];
    $sale=$_POST["sale_and_injection"];
    $Electricity=$_POST["Electricity"];
    $rent=$_POST["rent"];
    $waters=$_POST["waters"];
    $maintenance=$_POST["maintenance"];
    $heating=$_POST["heating"];
    $total=$_POST["total"];
    
$c=mysqli_real_escape_string($con,$chicken);
$f=mysqli_real_escape_string($con,$feed);
$p=mysqli_real_escape_string($con,$pharmaceutical);
$e=mysqli_real_escape_string($con,$emploies);
$s=mysqli_real_escape_string($con,$sawdust);
$sa=mysqli_real_escape_string($con,$sale);
$E=mysqli_real_escape_string($con,$Electricity);
$r=mysqli_real_escape_string($con,$rent);
$w=mysqli_real_escape_string($con,$waters);
$m=mysqli_real_escape_string($con,$maintenance);
$h=mysqli_real_escape_string($con,$heating);
$t=mysqli_real_escape_string($con,$total);

    $sql="insert into costcalculation values('','$c','$f','$p','$e','$s','$sa','$E','$r','$w','$m','$h','$t','')";
    
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
        $query ='select * from costcalculation';
        
        $result=mysqli_query($con,$query);
        if($result){
            echo '<table  border="1">
            <th>chicken</th>
          <th> feed</th>
          <th>pharmaceutical </th>
          <th>emploies</th>
          <th>sawdust</th>
          <th>sale_and_injection</th>
          <th>Electricity</th>
          <th>rent</th>
          <th>waters</th>
          <th>maintenance</th>
          <th>heating</th>
          <th>total</th>
          ';
         while( $row = mysqli_fetch_row($result)){
          echo '<tr>
          
          <td>'.$row[1].'</td>
          <td>'.$row[2].'</td>
          <td>'.$row[3].'</td>
          <td>'.$row[4].'</td>
          <td>'.$row[5].'</td>
          <td>'.$row[6].'</td>
          <td>'.$row[7].'</td>
          <td>'.$row[8].'</td>
          <td>'.$row[9].'</td>
          <td>'.$row[10].'</td>
          <td>'.$row[11].'</td>
          <td>'.$row[12].'</td>
         </tr> ';
         }
        }else{
            die('er');
        };
        };
        
        if(isset($_POST['delete'])){
            $name = $_POST['dell'];
        $query="delete from costcalculation where name='$name'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 'Deleted Done';
        }else{
            die('Error');
        }
        }

?>